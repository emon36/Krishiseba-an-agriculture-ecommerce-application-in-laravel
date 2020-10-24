<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = [

    	'user_id',
    	'ip_address',
        'payment_id',
    	'product_id',
    	'name',
    	'phone_no',
    	'shipping_address',
    	'paid',
    	'completed',
    	'seen',
        'transaaction_id'
    	
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);

    }

     public function carts()
    {
    	return $this->hasMany(Cart::class);

    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

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
