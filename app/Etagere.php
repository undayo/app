<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etagere extends Model
{
    protected $guarded = ['id'];


     public function produits(){

    	return $this->hasMany('App\Produit');
    }

    public function nombreProduit(){

    	return $this->produits()->count();
    }
}
