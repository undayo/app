<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $guarded =['id'];

    public function produits(){

    	return $this->hasMany('App\Produit');
    }

    public function nombre(){

    	return $this->produits()->count();
    }
}
