<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Users extends Authenticatable
{
  use Notifiable;
  protected $guard = 'user';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_name', 'email', 'first_name', 'last_name', 'password', 'phone_number',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];
  public function posts(){
     return $this->hasMany('App\userPost','user_id','id');
  }
  public function likes(){
    return $this->hasMany('App\postLikes','user_id','id');
  }
}
