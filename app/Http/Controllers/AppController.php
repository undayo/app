<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class AppController extends Controller
{
    public function login(){
    	return view('login');
    }

    public function register(){
    	return view('register');
    }

    public function index(){
    	if(Auth::check()){
    		return view('admin');
    	}
    	else
    	{
    		return redirect()->route('login');

    	}
    	
    }

    public function auth(){
    	
    	$validator = Validator::make(Input::all(), [
    		'email'=>'required',
    		'password'=>'required',
    	]);

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{

    		$email = Input::get('email');
    		$password = Input::get('password');

    		if(Auth::attempt(['email'=>$email, 'password'=>$password])){

    			Session::flash('info','Welcome '.Auth::user()->name);
    			return redirect()->route('admin');
    		}
    		else{
    			Session::flash('warning','Bad credentials');
    			return Redirect::back();
    		}
    		
    	}
    }

    public function registration()
    {
    	$validator = Validator::make(Input::all(), [
    		'name'=>'required',
    		'email'=>'required',
    		'password'=>'required',
    	]);

    	if($validator->fails()){

    		return Redirect::Back()
    		                 ->withError($validator)
    		                 ->withInput();
    	}
    	else{
            
            $name = Input::get('name');
    		$email = Input::get('email');
    		$password = Hash::make(Input::get('password'));

    		$user = new User;
    		$user->name = $name;
    		$user->email = $email;
    		$user->password = $password;
    		$user->save();

    		return redirect()->route('login');
    		
    	}
    }

    public function logout(){
    	if(Auth::check()){
    		Auth::logout();
           return redirect()->route('login');
    	}
    	else{
    		Session::flash('warning', 'Session expired!');
    		return redirect()->route('login');
    	}
    }
}
