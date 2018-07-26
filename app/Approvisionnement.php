<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approvisionnement extends Model
{
    protected $guarded =['id'];

    public function entrees(){

    	return $this->hasMany('App\Entree');

    }

    public function fournisseur(){

    	return $this->belongsTo('App\Fournisseur');

    }

    public function produitQte(){
    	return $this->entrees()->sum('quantite');
    }
}
