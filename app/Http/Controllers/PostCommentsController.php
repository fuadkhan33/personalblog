<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\postComments;
class PostCommentsController extends Controller
{
    
    public function submitComment($id,Request $request){

      $comment = new postComments;
      $comment->post_id=$id;
      $comment->text = $request->comment;
      $comment->user_id=Auth::User()->id;
      $comment->save();
      return back();
    }
    public function deleteComment($id){

      $comment =postComments::find($id);
      $comment->delete();
      return back();
    }
}
