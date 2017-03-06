<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderPhoto extends Model
{
    protected $table = 'slider_photo';

    protected $fillable = [
      'photo','slider_id'
    ];

    protected $hidden=[];

    /**
     * Get the slider for this photo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function slider()
    {
        return $this->belongsTo('App\Models\Slider');
    }
}
