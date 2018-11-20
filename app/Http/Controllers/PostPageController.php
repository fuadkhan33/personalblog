<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userPost;
use App\postLikes;
use Auth;
class PostPageController extends Controller
{
    public function renderPostPage(){
        $posts = userPost::orderBy('id','asc')->get();
        return view('pages.posts')->with('posts',$posts);
    }

    public function likePost($id){
        $postLike = new postLikes;
        $postLike->user_id  = Auth::User()->id;
        $postLike->post_id = $id;
        $postLike->save();
        return back();
    }
    public function unlikePost($id){
        $postLike = postLikes::where('user_id', '=', Auth::User()->id) -> where('post_id','=',$id)->delete();
        return back();
    }
    public function randerSubmitPostPage(){
      return view('pages.submitpost');
    }
}
