<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|This means:
|--------------Remaining Tasks-------------
|
/*




/*
|This routes also used as a Index Route will bring all the --------top post------------ front
*/
Route::get('/','PostPageController@renderPostPage')->name('post.all');

Route::get('/catagory/{id}', 'CatagoryController@viewCatagory')->name('catagory');
Route::get('/post{id}','UserPostController@viewPost')->name('post.view');

Route::get('/user/viewprofile{id}','ProfileController@viewProfile')->name('profile.view');
Route::get('/aboutus',function(){
  return view('pages.aboutus');
})->name('about.us');
Route::get('post/search','UserPostController@searchPost')->name('post.search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'/user'],function(){
  Route::get('/user_post/{id}','UserPostController@userPost')->name('user.post');
  Route::get('/edit_profie','UsersController@editProfile')->name('user.profile.edit');
  Route::post('/edit_profie/update','ProfileController@updateProfile')->name('user.profile.update');
  Route::get('/post/like{id}','PostPageController@likePost')->name('user.post.like');
  Route::get('/post/unlike{id}','PostPageController@unlikePost')->name('user.post.unlike');
  Route::post('/post/submitcommnet{id}','PostCommentsController@submitComment')->name('post.comment');
  Route::get('/post/deletecommnet{id}','PostCommentsController@deleteComment')->name('comment.delete');
  Route::get('/submitpost','PostPageController@randerSubmitPostPage')->name('user.post.submitpage');
  Route::post('/post/submit{id}','UsersController@submitPost')->name('user.post.submit');
  Route::get('/post/delete{id}/{user_id}','UsersController@deletePost')->name('user.post.delete');
  Route::get('/user_catagory/{id}', 'CatagoryController@viewUserCatagory')->name('catagoryauth');
});
Route::group(['prefix'=>'/admin'],function(){
  Route::get('/','AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login','AdminLoginController@login')->name('admin.login.submit');
  Route::get('/','DashboardController@render')->name('admin.dashboard');
});
