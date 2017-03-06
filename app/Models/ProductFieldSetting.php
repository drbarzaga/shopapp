<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFieldSetting extends Model
{
    protected $table = 'product_field_setting';

    protected $fillable = [
        'field'
    ];

    protected $hidden=[];

    /**
     * Get the product fields for the product field setting
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productfields()
    {
        return $this->hasMany('App\Models\ProductField');
    }
}
