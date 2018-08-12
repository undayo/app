<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produit;

class Vente extends Model
{
    protected $guarded = ['id'];

    public function sorties(){

    	return $this->hasMany('App\Sortie');
    }

    public function client(){

    	return $this->belongsTo('App\Client');
    }

    public function nombre(){
    	return $this->sorties()->count();
    }

    public function montant(){
    	return $this->sorties()->sum('montant');
    }
}
