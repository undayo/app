<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Produit;
use App\Categorie;
use App\Etagere;
use App\Rayon;
use App\Fournisseur;

class ProduitController extends Controller
{
    public function index(){

    	$produits = Produit::all();
        $categories = Categorie::all();
        $rayons = Rayon::all();
        $etageres = Etagere::all();
    	return view('admin.produits.index', compact('produits','categories','rayons','etageres'));

    }

    public function create(){

    	return view('admin.produits.create');
    }

    public function store(){

    	$validator = Validator::make(Input::all(), [
    		'nom'=>'required',
    		'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prix' => 'required',

    	]);

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{
            
    		$imageName = time().'.'.request()->image->getClientOriginalExtension();

    		$produit = new Produit;
    		$produit->nom = Input::get('nom');
            $produit->prix = Input::get('prix');
    		$produit->categorie_id = Input::get('categorie');
            $produit->rayon_id = Input::get('categorie');
            $produit->etagere_id = Input::get('etagere');
    		$produit->image = $imageName;
    		$produit->save();

    		request()->image->move(public_path('images/produits'), $imageName);

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
        $rayons = Rayon::all();
        $etageres = Etagere::all();
    	return view('admin.produits.edit', compact('produit','rayons', 'etageres'));

    }

    public function show($id){

    	$produit = Produit::FindOrFail($id);
    	return view('admin.produits.show', compact('produit'));

    }

    public function update($id){

    	$validator = Validator::make(Input::all(), [
    		'nom'=>'required',

    	]);

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{
            
    		$produit = Produit::FindOrFail($id);
    		$produit->nom = Input::get('nom');
    		$produit->rayon_id = Input::get('rayon');
    		$produit->etagere_id = Input::get('etagere');
    		$produit->save();

           
    		Session::flash('success','Changement d emplacement du produit pris en compte');
    		return redirect()->route('rayons.index');
    	}
    }

    public function delete($id){

    	$produit = Produit::FindOrFail($id);
    	$produit->delete();

    	Session::flash('success','Produit supprime du catalogue');
    	return redirect()->route('produits');
    }

    public function inventory(){
        $categories = Categorie::all();
        $fournisseurs = Fournisseur::all();
        $stock = $this->stockGlobale();
        return View('admin.produits.inventory', compact('categories', 'stock','fournisseurs'));
    }
    
    public function stockGlobale(){
        $produits = Produit::all();
        $nombre = 0;
        foreach ($produits as $produit) {
            $nombre = $nombre + $produit->stock();
        }
        return $nombre;
    }

    public function inventoryDetails($id){
        $categories = Categorie::all();
        $fournisseurs = Fournisseur::all();
        $stock = $this->stockGlobale();
        $item = Categorie::FindOrFail($id);
        return View('admin.produits.show', compact('categories', 'stock','fournisseurs','item'));
    }
}
