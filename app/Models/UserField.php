<?php

namespace ShopApp\Models;

use Illuminate\Database\Eloquent\Model;

class UserField extends Model
{
    protected $table = 'user_field';

    protected $fillable = [
        'value','user_id','user_field_setting_id'
    ];

    protected $hidden = [];
}
