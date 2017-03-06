<?php

namespace ShopApp;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';

    protected $fillable = [
        'user_id'
    ];

    protected $hidden=[];
}
