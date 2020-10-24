<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_district extends Model
{
    public function district()
	{
		return $this->belongsTo(District::class);
	}

	public function union()
	{
		return $this->hasMany(Union::class);
	}
}
