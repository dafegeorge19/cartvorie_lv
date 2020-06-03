<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'state_id', 'area_id', 'street_address'
    ];

    /**
     * Get the user that owns the address.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the state that owns the address.
     */
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    /**
     * Get the area that owns the address.
     */
    public function area()
    {
        return $this->belongsTo('App\Area');
    }
}
