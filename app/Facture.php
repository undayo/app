<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $guarded =['id'];

    public function vente(){

    	return $this->belongsTo('App\Vente');
    }

    public function client(){

    	return $this->belongsTo('App\Client');
    }
}
