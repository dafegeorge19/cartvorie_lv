<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * Get the types for the category.
     */
    public function types()
    {
        return $this->hasMany('App\Type');
    }

    /**
     * Get all of the supermarket's logo.
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function get_image()
    {
        $image = $this->images;

        if($image != null) {
            return $this->images->first()->name;
        }

        return 'avatar.png';
    }

}
