<?php

namespace ShopApp\Models;

use Illuminate\Database\Eloquent\Model;

class ProductField extends Model
{
    protected $table = 'product_field';

    protected $fillable = [
      'value','product_id','product_field_setting_id'
    ];

    protected $hidden = [];
}
