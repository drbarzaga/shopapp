<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserField extends Model
{
    protected $table ='user_field';

    protected $fillable = [
      'value','user_id','user_field_setting_id'
    ];

    protected $hidden = [];

    /**
     * Get the user for the user field
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the user field setting for the user field
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userfieldsetting()
    {
        return $this->belongsTo('App\Models\UserFieldSetting');
    }
}
