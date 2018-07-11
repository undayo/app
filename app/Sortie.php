<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    protected $guarded = ['id'];

    public function vente(){

    	return $this->belongsTo('App\Vente');
    }

    public function produit(){

    	return $this->belongsTo('App\Produit');
    }


}
