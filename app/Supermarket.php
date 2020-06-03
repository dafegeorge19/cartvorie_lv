<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supermarket extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'state_id', 'area_id', 'street_address'
    ];

    
    /**
     * Get the products for the supermarket.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * Get all of the categries for the supermarket.
     */
    public function categories()
    {
        $categories = Category::all();
        $supermarket_categories = [];

        foreach($categories as $category) {
            if($category->products->where('supermarket_id', $this->id)->count())  {
                $supermarket_categories[] = $category;
            } 
        }
        
        return collect($supermarket_categories);
    }

    /**
     * Get the state that owns the supermarket.
     */
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    /**
     * Get the area that owns the supermarket.
     */
    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    /**
     * Get all of the supermarket's logo.
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function supermerket_categories()
    {
        // 
    }

    public function get_image()
    {
        $image = $this->images;

        if($image->count()) {
            return $this->images->first()->name;
        }

        return 'avatar.png';
    }
}
