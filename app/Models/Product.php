<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
      'title','category_id','active'
    ];

    protected $hidden=[];

    /**
     * Get photos for this product
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Models\ProductPhoto');
    }
}
