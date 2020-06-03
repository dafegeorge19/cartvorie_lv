<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'cv_name', 'status'
    ];

    /**
     * Get the user details associated with the agent.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

}
