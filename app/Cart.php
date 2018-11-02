<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

	protected $table = "carts";

    public function dropshipper(){
    	return $this->belongsTo('App\UserDropshipper', 'id');
    }

    public function myproduct(){
    	return $this->hasMany('App\Sale', 'cart_id');
    }

    
}
