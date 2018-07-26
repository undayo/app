<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $guarded = ['id'];

    public function approvisionnements()
    {
       return $this->hasMany('App\Approvisionnement');
    }

    public function nombre(){

    	return $this->approvisionnements()->count();
    }

    public function recent(){
    	$recents = $this->approvisionnements();
        $last = null;
    	if($recents!=null){
    		foreach ($recents as $recent) {
    			$last = $recent->date;
    		}
    	}
    	else{
    		$last ="None";
    	}

    	return $last;
    }

}
