<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Produit;

class ProduitController extends Controller
{
    public function index(){

    	$produits = Produit::all();
    	return view('admin.produits.index', compact('produits'));

    }

    public function create(){

    	return view('admin.produits.create');
    }

    public function store(){

    	$validator = Validator::make(Input::all(), {
    		'nom'=>'required',
    		'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    	});

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{
            
    		$imageName = time().'.'.request()->image->getClientOriginalExtension();

    		$produit = new Produit;
    		$produit->nom = Input::get('nom');
    		$produit->categorie_id = Input::get('categorie');
    		$produit->image = $imageName;
    		$produit->save();

    		request()->image->move(public_path('images'), $imageName);

    		Session::flash('success','Produit ajoute au catalogue');
    		return redirect()->route('produits.index');
    	}
    }

    public function search(){

    	$produits = Produit::where('nom', 'LIKE', '%'.$search.'%')->orderBy('id', 'DESC')->paginate(10);
    	return view('admin.produits.index', compact('produits'));
    }

    public function edit($id){

    	$produit = Produit::FindOrFail($id);
    	return view('admin.produits.edit', compact('produit'));

    }

    public function show($id){

    	$produit = Produit::FindOrFail($id);
    	return view('admin.produits.show', compact('produit'));

    }

    public function update($id){

    	$validator = Validator::make(Input::all(), {
    		'nom'=>'required',
    		'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    	});

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{
            
    		$produit = Produit::FindOrFail($id);
    		$produit->nom = Input::get('nom');
    		$produit->categorie_id = Input::get('categorie');
    		if ($produit->image != Input::get('image'));
    		{
    			$imageName = time().'.'.request()->image->getClientOriginalExtension();
    			$produit->image = $imageName;
    			request()->image->move(public_path('images'), $imageName);
    		}

    		$produit->save();

           
    		Session::flash('success','Modification du produit pris en compte');
    		return redirect()->route('produits.index');
    	}
    }

    public function delete($id){

    	$produit = Produit::FindOrFail($id);
    	$produit->delete();

    	Session::flash('success','Produit supprime du catalogue');
    	return redirect()->route('produits');
    }
}
