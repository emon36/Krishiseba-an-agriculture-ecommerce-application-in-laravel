<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $fillable = [

    	
    	'name',
    	'image',
    	'priority',
    	'short_name',
    	'number',
    	'type'
      
    	
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


   
}
