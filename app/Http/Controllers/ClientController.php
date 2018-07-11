<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Client;

class ClientController extends Controller
{
    public function index(){

    	$clients = Client::all();
    	return view('admin.clients.index', compact('clients'));

    }

    public function create(){

    	return view('admin.clients.create');
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

    		$client = new Client;
    		$client->nom = Input::get('nom');
    		$client->telephone = Input::get('telephone');
    		$client->save();

    		Session::flash('success','client enregistre avec success');
    		return redirect()->route('clients.index');
    	}
    }

    public function search(){

    	$clients = Client::where('nom', 'LIKE', '%'.$search.'%')->orderBy('id', 'DESC')->paginate(10);
    	return view('admin.clients.index', compact('clients'));
    }

    public function edit($id){

    	$client = Client::FindOrFail($id);
    	return view('admin.clients.edit', compact('client'));

    }

    public function show($id){

    	$client = Client::FindOrFail($id);
    	return view('admin.clients.show', compact('client'));

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
            
    		$client = Client::FindOrFail($id);
    		$client->nom = Input::get('nom');
    		$client->save();

           
    		Session::flash('success','Modification du client pris en compte');
    		return redirect()->route('clients.index');
    	}
    }

    public function delete($id){

    	$client = Client::FindOrFail($id);
    	$client->delete();

    	Session::flash('success','client supprime du catalogue');
    	return redirect()->route('clients.index');
    }
}
