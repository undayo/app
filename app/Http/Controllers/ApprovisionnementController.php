<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Approvisionnement;

class ApprovisionnementController extends Controller
{
    public function index(){

    	$approvisionnements = Approvisionnement::all();
    	return view('admin.approvisionnements.index', compact('approvisionnements'));

    }

    public function create(){

    	return view('admin.approvisionnements.create');
    }

    public function store(){

    	$validator = Validator::make(Input::all(), {
    		'fournisseur'=>'required',

    	});

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{

    		$approvisionnement = new Approvisionnement;
    		$approvisionnement->date = Carbon::now();
    		$approvisionnement->save();

    		return redirect()->route('approvisionnements.edit', $approvisionnement->id);
    	}
    }

    public function search(){

    	$approvisionnements = approvisionnement::where('fournisseur', 'LIKE', '%'.$search.'%')
    	                                        ->orderBy('id', 'DESC')->paginate(10);
    	return view('admin.approvisionnements.index', compact('approvisionnements'));
    }

    public function edit($id){

    	$approvisionnement = Approvisionnement::FindOrFail($id);
        $produits = Produit::all();
    	return view('admin.approvisionnements.edit', compact('approvisionnement', 'produits'));

    }

    public function show($id){

    	$approvisionnement = Approvisionnement::FindOrFail($id);
    	return view('admin.approvisionnements.show', compact('approvisionnement'));

    }

    public function update($id){

        $validator = Validator::make(Input::all(), [

            'produit'=>'required',
            'quantite'=>'required',
            'fournisseur'=>'required',
        ]);

        if($validator->fails()){

            return Redirect::Back()
                            ->withErrors($validator)
                            ->withInput();
        }
        else{

            $approvisionnement = Approvisionnement::FindOrFail($id);

            if($approvisionnement->fournisseur==''){
                $approvisionnement->fournisseur = Input::get('fournisseur');
                $approvisionnement->save();
            }

            $entree = new Entree;
            $entree->produit_id = Input::get('produit');
            $entree->quantite = Input::get('quantite');
            $entree->approvisionnement_id = Input::get('approvisionnement');
            $entree->save();

            Session::flash('success', 'Produit ajoute dans la liste');
            return redirect()->route('approvisionnements.edit', $approvisionnement->id);
        }
    }

    public function delete($id){

        $approvisionnement = Approvisionnement::FindOrfail($id);
        $approvisionnement->delete();
        return return redirect()->route('approvisionnements.index');
        
    }

  
}
