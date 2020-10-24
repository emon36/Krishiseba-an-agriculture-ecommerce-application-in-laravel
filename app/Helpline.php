<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Helpline extends Model
{
    public function division()
{
    return $this->belongsTo(Division::class);
}

public function district()
{
    return $this->belongsTo(District::class);
}

public function sub_district()
{
    return $this->belongsTo(Sub_district::class);
}

public function union()
{
    return $this->belongsTo(Union::class);
}

}
