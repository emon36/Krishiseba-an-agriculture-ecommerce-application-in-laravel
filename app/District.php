<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
	public function division()
	{
		return $this->belongsTo(Division::class);
	}

	public function Sub_district(){
   	
   	return $this->hasMany(Sub_district::class);

   	
   }
}
