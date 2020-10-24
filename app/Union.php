<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    public function Sub_district()
	{
		return $this->belongsTo(sub_district::class);
	}
}
