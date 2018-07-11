<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Fournisseur;

class FournisseurController extends Controller
{
    public function index(){

    	$fournisseurs = Fournisseur::all();
    	return view('admin.fournisseurs.index', compact('fournisseurs'));

    }

    public function create(){

    	return view('admin.fournisseurs.create');
    }

    public function store(){

    	$validator = Validator::make(Input::all(), {
    		'nom'=>'required',
    		'telephone'=>'required'

    	});

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{

    		$fournisseur = new Fournisseur;
    		$fournisseur->nom = Input::get('nom');
    		$fournisseur->telephone = Input::get('telephone');
    		$fournisseur->save();

    		Session::flash('success','fournisseur enregistre avec success');
    		return redirect()->route('fournisseurs.index');
    	}
    }

    public function search(){

    	$fournisseurs = Fournisseur::where('nom', 'LIKE', '%'.$search.'%')->orderBy('id', 'DESC')->paginate(10);
    	return view('admin.fournisseurs.index', compact('fournisseurs'));
    }

    public function edit($id){

    	$fournisseur = Fournisseur::FindOrFail($id);
    	return view('admin.fournisseurs.edit', compact('fournisseur'));

    }

    public function show($id){

    	$fournisseur = Fournisseur::FindOrFail($id);
    	return view('admin.fournisseurs.show', compact('fournisseur'));

    }

    public function update($id){

    	$validator = Validator::make(Input::all(), {
    		'nom'=>'required',
    		'telephone'=>'required',

    	});

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{
            
    		$fournisseur = Fournisseur::FindOrFail($id);
    		$fournisseur->nom = Input::get('nom');
    		$fournisseur->telephone = Input::get('telephone');
    		$fournisseur->save();

           
    		Session::flash('success','Modification du fournisseur pris en compte');
    		return redirect()->route('fournisseurs.index');
    	}
    }

    public function delete($id){

    	$fournisseur = Fournisseur::FindOrFail($id);
    	$fournisseur->delete();

    	Session::flash('success','fournisseur supprime du catalogue');
    	return redirect()->route('fournisseurs.index');
    }
}
