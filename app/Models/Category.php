<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
      'title','photo','parent','active'
    ];

    protected $hidden = [];

    /**
     * Get the products for the category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Products()
    {
      return $this->hasMany('App\Models\Product');
    }
    /**
     * Get parent for this Category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getParent()
    {
        return $this->belongsTo('App\Models\Category', 'parent');
    }
    /**
     * Get the categories childrens for this category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getChildrens()
    {
        return $this->hasMany('App\Models\Category', 'parent');
    }
}
