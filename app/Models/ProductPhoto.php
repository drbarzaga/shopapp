<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $table = 'product_photo';

    protected $fillable = [
        'photo','product_id'
    ];

    protected $hidden=[];
}
