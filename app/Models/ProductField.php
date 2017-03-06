<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductField extends Model
{
    protected $table = 'product_field';

    protected $fillable = [
        'value','product_id','product_field_setting_id'
    ];

    protected $hidden=[];

    /**
     * Get the product for the product field
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * Get the product field setting for 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productfieldsetting()
    {
        return $this->belongsTo('App\Models\ProductFieldSetting');
    }
}
