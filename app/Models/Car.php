<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';

    protected $fillable = [
        'user_id'
    ];

    protected $hidden=[];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function products(){
        return $this->hasMany('App\Models\CarProduct');
    }
}
