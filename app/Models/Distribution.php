<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model{

	protected $table = 'distribution';

	public function ratecards(){
        return $this->belongsToMany('App\Models\Ratecard', 'ratecard');
    } 
   
}