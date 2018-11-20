<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\userPost;
class catagory extends Model
{
    public function posts(){
        return $this->hasMany('App\userPost','catagory_id','id');
    }
}
