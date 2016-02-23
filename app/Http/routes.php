<?php

use App\User;
use App\Role;
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

Route::get('/', 'HomeController@index');


Route::group(['middleware' => 'web'], function () {
    
    Route::post('admin/login','MainController@login_admin_post');
    Route::get('admin/login', function(){
        return view('auth/adminlogin');
    });
    Route::group(['middleware' => ['admins']], function () {
        Route::get('admin', function(){
            return 'Welcome to admin panel';
        });
    });
    
    Route::auth();
    
});
