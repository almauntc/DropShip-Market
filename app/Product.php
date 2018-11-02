<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = "products";

    public function attributes(){
    	return $this->hasMany('App\ProductsAttribute', 'product_id');
    }

    public function info_bayar(){
    	return $this->hasMany('App\Cart', 'product_id');
    }
}
