<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    protected $guarded = ['id'];

    public function approvisionnement(){

    	return $this->belongsTo('App\approvisionnement');
    }

    public function produit(){

    	return $this->belongsTo('App\Produit');
    }
}
