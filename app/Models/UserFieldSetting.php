<?php

namespace ShopApp\Models;

use Illuminate\Database\Eloquent\Model;

class UserFieldSetting extends Model
{
    protected $table = 'user_field_setting';

    protected $fillable = [
      'field'
    ];

    protected $hidden = [];
}
