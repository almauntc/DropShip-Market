<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDropshipper extends Model
{
   
   protected $table = "dropshippers";

    public function myproduct(){
    	return $this->hasMany('App\sale', 'dropshipper_id');
    }
}
