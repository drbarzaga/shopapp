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
}
