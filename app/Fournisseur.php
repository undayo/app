<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $guarded = ['id'];

    public function approvisionnements()
    {
       return $this->hasMany('App\approvisionnement');
    }

    public function nombre(){

    	return $this->approvisionnements()->count();
    }
}
