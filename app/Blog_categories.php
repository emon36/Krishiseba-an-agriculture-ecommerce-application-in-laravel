<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_categories extends Model
{
   public function posts()
    {   
         return $this->hasMany('App\Post','category_id');
        }
}
