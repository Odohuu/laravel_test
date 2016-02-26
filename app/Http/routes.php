<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/




Route::group(['middleware' => 'web'], function () {
    
    Route::get('/', 'HomeController@index');
    // Route::get('/',function(){
    //     return auth()->user();
    // });

    Route::post('admin/login','MainController@login_admin_post');
    Route::get('admin/login', function(){
        return view('auth/adminlogin');
    });
    Route::group(['middleware' => ['admins']], function () {
        Route::get('admin', function(){
            return 'Welcome to admin panel';
        });

    });

    Route::get('user/{id}', 'UserController@showProfile');
   
    // Route::get('login', 'MainController@login');
    // Route::post('login', 'MainController@artist_login');
    Route::auth();
    
});

Route::group(['middleware' => 'web', 'auth'], function () {
    Route::get('user/{id}/editProfile', 'UserController@editProfile');
    Route::PATCH('user/{id}', 'UserController@update');
});
