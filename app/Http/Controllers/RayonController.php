<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Rayon;
use App\Produit;
use App\Etagere;

class RayonController extends Controller
{
   public function index(){

    	$rayons = Rayon::all();
        $produits = Produit::all();
        $etageres = Etagere::all();
    	return view('admin.rayons.index', compact('rayons', 'produits','etageres'));

    }

    public function create(){

    	return view('admin.rayons.create');
    }

    public function store(){

    	$validator = Validator::make(Input::all(), [
    		'nom'=>'required',
    		'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    	]);

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{
            
    		$imageName = time().'.'.request()->image->getClientOriginalExtension();

    		$rayon = new Rayon;
    		$rayon->nom = Input::get('nom');
    		$rayon->image = $imageName;
    		$rayon->save();

    		request()->image->move(public_path('images/rayons'), $imageName);

    		Session::flash('success','Enregistrement du rayon effectue avec success');
    		return redirect()->route('rayons.index');
    	}
    }

    public function search(){

    	$rayons = Rayon::where('nom', 'LIKE', '%'.$search.'%')->orderBy('id', 'DESC')->paginate(10);
    	return view('admin.rayons.index', compact('rayons'));
    }

    public function edit($id){

    	$rayon = Rayon::FindOrFail($id);
    	return $rayon;

    }

    public function show($id){

    	$rayon = Rayon::FindOrFail($id);
    	return view('admin.rayons.show', compact('rayon'));

    }

    public function update($id){

    	$validator = Validator::make(Input::all(), [
    		'nom'=>'required',
    		'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    	]);

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{
            
    		$rayon = Rayon::FindOrFail($id);
    		$rayon->nom = Input::get('nom');
    		if ($rayon->image != Input::get('image'));
    		{
    			$imageName = time().'.'.request()->image->getClientOriginalExtension();
    			$rayon->image = $imageName;
    			request()->image->move(public_path('images/rayons'), $imageName);
    		}

    		$rayon->save();


           
    		Session::flash('success','Modification du rayon pris en compte');
    		return redirect()->route('rayons.index');
    	}
    }

    public function delete($id){

    	$rayon = Rayon::FindOrFail($id);
    	$rayon->delete();

    	Session::flash('success','rayon supprime du catalogue');
    	return redirect()->route('rayons.index');
    }
    
}
