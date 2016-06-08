<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::get('/admin/redirect', 'SocialAuthController@redirect');
Route::get('/admin/callback', 'SocialAuthController@callback');


Route::group(['middleware' => ['web']], function () {

    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('access', function(){
        return "You have an access";
    })->middleware('isAdmin');

    Route::get('form', function(){
        return view('form');
    });
    Route::post('post_to_me', function(Request $request){
        echo $request->name;
    });
});


Route::group(['middleware' => ['web']], function () {
    //Login Routes...
    Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout','AdminAuth\AuthController@logout');
    // Registration Routes...
    Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'AdminAuth\AuthController@register');
    Route::get('/admin', 'AdminController@index');
});

