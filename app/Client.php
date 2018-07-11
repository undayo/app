<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded =['id'];

    public function ventes(){

    	return $this->hasMany('App\Vente');
    }

    public function nombre(){

    	return $this->ventes()->count();
    }

    public function achats(){

    	return $this->ventes()->sum('montant');
    }
}
