<?php

namespace ShopApp\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
      'title','category_id','active'
    ];

    protected $hidden=[];
}
