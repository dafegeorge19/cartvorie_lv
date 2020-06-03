<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'state_id'
    ];

    /**
     * Get the state that owns the area.
     */
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    /**
     * Get the supermarkets for the area.
     */
    public function supermarkets()
    {
        return $this->hasMany('App\Supermarket');
    }

    /**
     * Get the addresses for the state.
     */
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    /**
     * Get the orders for the area.
     */
    public function orders()
    {
        return $this->hasMany('App\Area');
    }
}
