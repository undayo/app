<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Categorie;

class CategorieController extends Controller
{
    public function index(){

    	$categories = Categorie::all();
    	return view('admin.categories.index', compact('categories'));

    }

    public function create(){

    	return view('admin.categories.create');
    }

    public function store(){

    	$validator = Validator::make(Input::all(), {
    		'nom'=>'required',

    	});

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{

    		$categorie = new Categorie;
    		$categorie->nom = Input::get('nom');
    		$categorie->save();

    		Session::flash('success','Categorie enregistre avec success');
    		return redirect()->route('categories.index');
    	}
    }

    public function search(){

    	$categories = Categorie::where('nom', 'LIKE', '%'.$search.'%')->orderBy('id', 'DESC')->paginate(10);
    	return view('admin.categories.index', compact('categories'));
    }

    public function edit($id){

    	$categorie = Categorie::FindOrFail($id);
    	return view('admin.categories.edit', compact('categorie'));

    }

    public function show($id){

    	$categorie = Categorie::FindOrFail($id);
    	return view('admin.categories.show', compact('categorie'));

    }

    public function update($id){

    	$validator = Validator::make(Input::all(), {
    		'nom'=>'required',

    	});

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{
            
    		$categorie = Categorie::FindOrFail($id);
    		$categorie->nom = Input::get('nom');
    		$categorie->save();

           
    		Session::flash('success','Modification de la categorie pris en compte');
    		return redirect()->route('categories.index');
    	}
    }

    public function delete($id){

    	$categorie = Categorie::FindOrFail($id);
    	$categorie->delete();

    	Session::flash('success','categorie supprime du catalogue');
    	return redirect()->route('categories.index');
    }
}
