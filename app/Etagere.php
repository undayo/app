<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etagere extends Model
{
    protected $guarded = ['id'];

    public function rayon(){

    	return $this->belongsTo('App\Rayon');
    }

    public function produits(){

    	return $this->hasMany('App\Produit');
    }

    public function nombreProduit(){

    	return $this->produits()->count();
    }
}
