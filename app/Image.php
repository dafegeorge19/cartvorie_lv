<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the owning imageable model.
     */
    public function imageable()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the product's images.
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
