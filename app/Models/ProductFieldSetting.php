<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFieldSetting extends Model
{
    protected $table = 'product_field_setting';

    protected $fillable = [
      'field'
    ];

    protected $hidden = [];

    /**
     * Get the fields for this field setting
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields()
    {
        return $this->hasMany('App\Models\ProductField');
    }
}
