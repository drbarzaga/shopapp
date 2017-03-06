<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $table='system_setting';

    protected $fillable = [
      'title','slidercount','localcount','categorycount','highlighted_product_count',
      'product_photo_count','active','description'
    ];

    protected $hidden=[];
}
