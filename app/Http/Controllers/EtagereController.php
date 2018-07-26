<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Etagere;

class EtagereController extends Controller
{
    public function index(){

    	$etageres = Etagere::all();
    	return view('admin.etageres.index', compact('etageres'));

    }

    public function create(){

    	return view('admin.etageres.create');
    }

    public function store(){

    	$validator = Validator::make(Input::all(), [
    		'nom'=>'required',

    	]);

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{

    		$etagere = new Etagere;
    		$etagere->nom = Input::get('nom');
    		$etagere->rayon_id = Input::get('rayon');
    		$etagere->save();

    		Session::flash('success','Etagere enregistre avec success');
    		return redirect()->route('etageres.index');
    	}
    }

    public function search(){

    	$etageres = etagere::where('nom', 'LIKE', '%'.$search.'%')->orderBy('id', 'DESC')->paginate(10);
    	return view('admin.etageres.index', compact('etageres'));
    }

    public function edit($id){

    	$etagere = Etagere::FindOrFail($id);
    	return view('admin.etageres.edit', compact('etagere'));

    }

    public function show($id){

    	$etagere = Etagere::FindOrFail($id);
    	return view('admin.etageres.show', compact('etagere'));

    }

    public function update($id){

    	$validator = Validator::make(Input::all(), [
    		'nom'=>'required',
    		'rayon'=>'required',

    	]);

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{
            
    		$etagere = Etagere::FindOrFail($id);
    		$etagere->nom = Input::get('nom');
    		$etagere->rayon_id = Input::get('rayon');
    		$etagere->save();

           
    		Session::flash('success','Modification de l etagere pris en compte');
    		return redirect()->route('etageres.index');
    	}
    }

    public function delete($id){

    	$etagere = Etagere::FindOrFail($id);
    	$etagere->delete();

    	Session::flash('success','Etagere supprime du catalogue');
    	return redirect()->route('etageres.index');
    }
}
