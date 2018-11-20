<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userPost;
use Intervention\Image\Facades\Image;
use Auth;

use App\postImages;

class UsersController extends Controller
{

    public function editProfile(){
      return view('pages.editprofile');
    }
    public function submitPost($id,Request $request){


        $validate = $request->validate([
          'title' => 'required|max:80',
          'text' => 'required|max:1000',
          'image[]' => 'image'
        ]);
        $post =new userPost;

        $post->title=$request->title;
        $post->text = $request->text;
        $post->catagory_id = $request->catagory;
        $post->user_id = $id;
        $post->save();
        if(!is_null($request->images)){
          foreach ($request->images as $image) {
            $postImage = new postimages;
            //delete old image first
            //unlink(public_path($image));
            //create new image randomize name
            $img = time().".".$image->getClientOriginalExtension();
            $location = public_path('postimages/'.$img);
            Image::make($image)->save($location);
            //save image location to database
            $postImage->image= 'postimages/'.$img;
            $postImage->post_id = $post->id;
            $postImage->save();
          }
        }

        return redirect()->route('user.post',Auth::User()->id);
    }
    public function deletePost($id,$user_id){
      if(Auth::User()->id==$user_id){
          $post = userPost::find($id);

          $postImage = postImages::where('post_id','=',$id);
          foreach ($post->images as $image) {
            if(file_exists(public_path($image->image))){
                unlink(public_path($image->image));
            }

          }
          $post->delete();
          $postImage->delete();

      }
      return back();
    }
}
