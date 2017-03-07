<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'local';

    protected $fillable = [
        'state','description','user_id'
    ];

    protected $hidden=[];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function fields(){
        return $this->hasMany('App\Models\OrderField');
    }
}
