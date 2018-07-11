<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    protected $guarded = ['id'];

    public function etagere(){

    	return $this->belongsTo('App\Etagere');
    }

    public function produits()
    {
    	return $this->hasMany('App\Produit');
    }

    public function nombre()
    {
    	return $this->produits()->count();
    }
}
