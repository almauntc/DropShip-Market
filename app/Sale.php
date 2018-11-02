<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function mystatus(){
    	return $this->hasMany('App\Customer', 'sale_id');
    }

   
    
}
