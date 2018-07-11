<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $guarded = ['id'];

    public function categorie(){

    	return $this->belongsTo('App\categorie');
    }

    public function rayon(){

    	return $this->belongsTo('App\Rayon');
    }

    public function etagege(){

    	return $this->belongsTo('App\etagere');
    }

    

    public function entrees()
    {
    	return $this->hasMany('App\Entree');
    }

    public function sorties()
    {
    	return $this->hasMany('App\Sortie');
    }

    public function nombreEntree(){

    	return $this->entrees()->sum('quantite');
    }

    public function nombreSortie(){

    	return $this->sorties()->sum('quantite');
    }

    public function stock(){

    	return $this->nombreEntree() - $this->nombreSortie();
    }
}
