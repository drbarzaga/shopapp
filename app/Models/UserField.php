<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserField extends Model
{
    protected $table = 'user_field';

    protected $fillable = [
        'value','user_id','user_field_setting_id'
    ];

    protected $hidden = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function fieldsetting(){
        return $this->belongsTo('App\Models\UserFieldSetting');
    }
}
