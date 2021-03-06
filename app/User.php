<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
// implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'username', 'phone_number', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    // public function getFullNameAttribute()
    // {
    //     // return "{$this->fullname} {$this->username}";
    // }

    /**
     * Get the addresses for the user.
     */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    /**
     * Get the agent detail associated with the user.
     */
    // public function agent_detail()
    // {
    //     return $this->hasOne('App\AgentDetail');
    // }

    /**
     * Get all of the user's images.
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    /**
     * Get the products for the user.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function hasRole($role)
    {
        if($this->role == $role) {
            return 1;
        }

        return 0;
    }

    /**
     * Get the orders for the user.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

}
