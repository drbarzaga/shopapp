<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFieldSetting extends Model
{
    protected $table ='user_field_setting';

    protected $fillable = [
        'field'
    ];

    protected $hidden = [];

    /**
     * Get the user fields for the user field setting
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userfields()
    {
        return $this->hasMany('App\Models\UserField');
    }
}
