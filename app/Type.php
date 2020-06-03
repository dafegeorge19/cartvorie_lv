<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id'
    ];

    /**
     * Get the category that owns the type.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the products for the type.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
