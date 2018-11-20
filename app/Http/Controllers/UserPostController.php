<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Users;
use App\userPost;
use App\postImages;
use Auth;
class UserPostController extends Controller{
    public function userPost($userId){
        $posts =Users::find($userId)->posts()->get();
        return view('pages.posts')->with('posts',$posts);
    }
    public function viewPost($id){
        $post = userPost::where('id','=',$id)->get()->first();
        return view('pages.postsview')->with('post',$post);
    }
    public function searchPost(Request $request){
        $posts = userPost::orwhere('title','like','%'.$request->search.'%')->orwhere('text','like','%'.$request->search.'%')->orwhere('created_at','like','%'.$request->search.'%')->get();
        return view('pages.posts')->with('posts',$posts);
    }

}
