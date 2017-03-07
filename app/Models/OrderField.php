<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderField extends Model
{
    protected $table = 'order_field_setting';

    protected $fillable = [
        'field'
    ];

    protected $hidden=[];

    public function order(){
        return $this->belongsTo('App\Models\Order');
    }

    public function field_setting(){
        return $this->belongsTo('App\Models\OrderFieldSetting');
    }
}
