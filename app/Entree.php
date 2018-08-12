<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    protected $guarded = ['id'];

    public function approvisionnement(){

    	return $this->belongsTo('App\Approvisionnement');
    }

    public function produit(){

    	return $this->belongsTo('App\Produit');
    }
}
