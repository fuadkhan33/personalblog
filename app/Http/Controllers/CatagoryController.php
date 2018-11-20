<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catagory;
use App\userPost;
use Auth;

class CatagoryController extends Controller
{
    /*
    |View the post order by catagory
    |
    */
    public function viewCatagory($id){
      $posts = catagory::find($id)->posts()->get();
      return view('pages.posts')->with('posts',$posts);
    }
    public function viewUserCatagory($id){
      $posts = userPost::where('catagory_id','=',$id)->where('user_id','=',Auth::User()->id)->get();
      return view('pages.posts')->with('posts',$posts);
    }
}
