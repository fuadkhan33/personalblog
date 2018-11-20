<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userPost extends Model
{
    public function likes(){
      return $this->hasMany('app\postLikes','post_id','id');
    }
    public function comments(){
      return $this->hasMany('App\postComments','post_id','id');
    }
    public function images(){
      return $this->hasMany('App\postImages','post_id','id');
    }
}
