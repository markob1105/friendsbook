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


//Route::get('/', function () {
  //  return view('welcome');
//});
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'PostController@index')->name('home');
    Route::get('/posts/{post}', 'PostController@show');
    Route::post('/posts', 'PostController@store');

    Route::get('/findfriends', 'FriendshipController@findfriends');
    Route::get('/addfriend/{id}', 'FriendshipController@sendRequest');
    Route::get('/requests', 'FriendshipController@requests');
    Route::get('/accept/{name}/{surname}/{id}', 'FriendshipController@accept');
    Route::get('/friends', 'FriendshipController@friends');
    Route::get('/removerequest/{id}', 'FriendshipController@removerequest');

    Route::get('/photos/index', 'PhotoController@index');
    Route::post('/photos', 'PhotoController@store');

    Route::post('/posts/{post}/comments', 'CommentsController@store');

    Route::get('/profile', 'ProfileController@index');
});

Route::get('/test', function() {
    return asset('/upload/large/mVXlGtq4ZL_related_posts_2.jpg');
});

/*Route::get('/findfriends', function(){
    $auth_user_id = Auth::user()->id;
    $allUsers = DB::table('users')->where('id', '!=', $auth_user_id)->get();

    foreach($allUsers as $u)
    {
        echo $u->name.' '; echo $u->surname.' '; echo $u->birth_date;
        echo "<br>";
    }

});*/
