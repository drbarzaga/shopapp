<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{    
    protected $table = 'product';

    protected $fillable = [
      'title'
    ];
    
    protected $hidden=[];

    /**
     * Get the product fields for the product
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productfields()
    {
        return $this->hasMany('App\Models\ProductField');
    }

    /**
     * Get the category of product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Get all photos for the product
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Models\ProductPhoto');
    }
}
