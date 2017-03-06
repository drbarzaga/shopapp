<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFieldSetting extends Model
{
    protected $table = 'product_field_setting';

    protected $fillable = [
      'field'
    ];

    protected $hidden = [];
}
