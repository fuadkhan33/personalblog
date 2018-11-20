<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Users;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller
{
    
    public function updateProfile(Request $request){
      $authUserId = Auth::User()->id;
      $user = Users::find($authUserId);
      $validate = $request->validate([
        'email' => 'required|email',
        'first_name' => 'required|max:25',
        'last_name' => 'required|max:25',
        'phone_number' => 'required',
        'image' => 'image'

      ]);

      $user->email = $request->email;
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      if($request->hasFile('image')){
        //delete old image first
        unlink(public_path($user->image));
        //create new image randomize name
        $img = time().".".$request->image->getClientOriginalExtension();
        $location = public_path('usersimage/'.$img);
        Image::make($request->file('image')->getRealPath())->save($location);
        //save image location to database
        $user->image= 'usersimage/'.$img;
      }
      $user->save();
      session()->flash('success','Successfuly Updated Profile');
      return back();
    }
    public function viewProfile($id){
      $users = Users::where('id','=',$id)->get();
      return view('pages.viewprofile')->with('users',$users);
    }
}
