<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Produit;
use App\Vente;
use App\Client;
use App\Sortie;

class VenteController extends Controller
{
    public function index(){

    	$ventes = Vente::all();
    	return view('admin.ventes.index', compact('ventes'));

    }

    public function create(){

    	return view('admin.ventes.create');
    }

    public function store(){

    	$validator = Validator::make(Input::all(), [
    		'nom'=>'required',
            'phone'=>'required',

    	]);

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{

            $client = new Client;
            $client->nom = Input::get('nom');
            $client->telephone = Input::get('phone');
            $client->save();

    		$vente = new Vente;
    		$vente->date = Carbon::now();
            $vente->client_id = $client->id;
    		$vente->save();

    		return redirect()->route('ventes.edit', $vente->id);
    	}
    }

    public function search(){

    	$ventes = Vente::where('client', 'LIKE', '%'.$search.'%')
    	                                        ->orderBy('id', 'DESC')->paginate(10);
    	return view('admin.ventes.index', compact('ventes'));
    }

    public function edit($id){

    	$vente = Vente::FindOrFail($id);
        $produits = Produit::all();
    	return view('admin.ventes.edit', compact('vente', 'produits'));

    }

    public function show($id){

    	$vente = Vente::FindOrFail($id);
    	return view('admin.ventes.show', compact('vente'));

    }

    public function update($id){

        $validator = Validator::make(Input::all(), [

            'produit'=>'required',
            'quantite'=>'required',
            
        ]);

        if($validator->fails()){

            return Redirect::Back()
                            ->withErrors($validator)
                            ->withInput();
        }
        else{



            $vente = Vente::FindOrFail($id);

            // Verification de l'existance de la ligne
            $verification = false;

            $sorties = Sortie::where('vente_id','=',$id)->get();
            foreach ($sorties as $sortie) {
                if($sortie->produit_id==Input::get('produit')){
                    $sortie->quantite = Input::get('quantite');
                    $sortie->montant = $sortie->produit->prix * Input::get('quantite');
                    $sortie->save();
                    $verification = true;
                }

            }
            
            if($verification == false){

                $sortie = new Sortie;
                $sortie->produit_id = Input::get('produit');
                $produit = Produit::FindOrFail($sortie->produit_id);
                
                if($produit->stock()>=Input::get('quantite'))
                {
                    
                    $sortie->montant = $produit->prix * Input::get('quantite');
                    $sortie->quantite = Input::get('quantite');
                    $sortie->vente_id = Input::get('vente');
                    $sortie->save();
                    Session::flash('success', 'Produit ajoute dans la liste');
                }
                else{
                    Session::flash('warning', 'Quantite non disponible doit etre inferieur ou egale a : '.$produit->stock());
                    return redirect()->route('ventes.edit', $vente->id);
                }
                
                
                
            }
            else{
                Session::flash('success', 'Modification de la quantite pris en compte');
            }
            

            
            return redirect()->route('ventes.edit', $vente->id);
        }
    }

    public function delete($id){

        $vente = Vente::FindOrfail($id);
        $vente->delete();
        return redirect()->route('ventes.index');
        
    }

    public function deleteSortie($id){

        $sortie = Sortie::FindOrfail($id);
        $sortie->delete();
        return redirect()->back();
        
    }
}
