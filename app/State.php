<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    /**
     * Get the cities for the state.
     */
    public function areas()
    {
        return $this->hasMany('App\Area');
    }

    /**
     * Get the supermarkets for the state.
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
     * Get the orders for the state.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    
}
