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

    public function car(){
        return $this->belongsTo('App\Models\Car');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
