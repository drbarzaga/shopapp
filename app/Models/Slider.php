<?php

namespace ShopApp\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';

    protected $fillable = [
        'id','active'
    ];

    protected $hidden = [];
}
