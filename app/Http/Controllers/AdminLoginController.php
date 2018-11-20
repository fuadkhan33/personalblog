<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;


class AdminLoginController extends Controller
{


      public function __construct()
      {
        $this->middleware('guest:admin', ['except' => ['logout']]);
      }

      public function showLoginForm()
      {
        return view('auth.adminlogin');
      }
      protected $redirectTo = '/dashboard';

      public function login(Request $request)
      {
        // Validate the form data
        $this->validate($request, [
          'user_name'   => 'required',
          'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['user_name' => $request->user_name, 'password' => $request->password], $request->remember)) {
          // if successful, then redirect to their intended location
          return redirect()->intended(route('admin.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
      }

      public function logout()
      {
          Auth::guard('admin')->logout();
          return redirect('/admin');
      }


}
