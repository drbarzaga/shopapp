<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table='local';

    protected $fillable=[
      'title','photo','description','urlmap'
    ];

    protected $hidden=[];
}
