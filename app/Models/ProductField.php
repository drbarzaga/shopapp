<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductField extends Model
{
    protected $table = 'product_field';

    protected $fillable = [
      'value','product_id','product_field_setting_id'
    ];

    protected $hidden = [];

    /**
     * Get the product for this field
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function field_setting()
    {
        return $this->belongsTo('App\Models\ProductFieldSetting');
    }
}
