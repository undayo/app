<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    protected $guarded = ['id'];

    public function sorties(){

    	return $this->hasMany('App\Vente');
    }

    public function client(){

    	return $this->belongsTo('App\Client');
    }
}
