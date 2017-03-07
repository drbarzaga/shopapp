<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderFieldSetting extends Model
{
    protected $table = 'order_field_setting';

    protected $fillable = [
        'value','order_id','order_field_setting_id'
    ];

    protected $hidden=[];

    public function fields(){
        return $this->hasMany('App\Models\OrderField');
    }
}
