<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarProduct extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'count','product_id','car_id'
    ];

    protected $hidden = [];
}
