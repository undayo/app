<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
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
    	return view('admin');
    }
}
