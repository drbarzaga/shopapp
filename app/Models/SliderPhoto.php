<?php

namespace ShopApp\Models;

use Illuminate\Database\Eloquent\Model;

class SliderPhoto extends Model
{
    protected $table = 'slider_photo';

    protected $fillable = [
        'photo','slider_id'
    ];

    protected $hidden = [];
}
