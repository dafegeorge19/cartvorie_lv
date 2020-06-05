<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $fillable = [
      'user_id', 'state_id', 'area_id', 'account_type'
  ];

  /**
   * Get the user that owns the address.
   */
  public function user()
  {
      return $this->belongsTo('App\User');
  }

}
