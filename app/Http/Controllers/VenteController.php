<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    		'client'=>'required',

    	]);

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{

    		$vente = new Vente;
    		$vente->date = Carbon::now();
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
            'client'=>'required',
        ]);

        if($validator->fails()){

            return Redirect::Back()
                            ->withErrors($validator)
                            ->withInput();
        }
        else{

            $vente = Vente::FindOrFail($id);

            if($vente->client==''){
                $vente->client = Input::get('client');
                
            }
            
            $vente->reduction = Input::get('reduction');
            $vente->save();

            $sortie = new Sortie;
            $sortie->produit_id = Input::get('produit');
            $sortie->quantite = Input::get('quantite');
            $sortie->vente_id = Input::get('vente');
            $sortie->save();

            Session::flash('success', 'Produit ajoute dans la liste');
            return redirect()->route('ventes.edit', $vente->id);
        }
    }

    public function delete($id){

        $vente = Vente::FindOrfail($id);
        $vente->delete();
        return return redirect()->route('ventes.index');
        
    }
}
