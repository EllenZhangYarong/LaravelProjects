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

Route::get('/', function () {
    return view('welcome');
});

/*
 * Aticle Page
 *
 * */
/*
 * User Login & Register Page
 **/

//User register page
Route::get('/register','\App\Http\Controllers\RegisterController@index');
//User register logic
Route::post('/register','\App\Http\Controllers\RegisterController@register');
//User Login
Route::get('/login','\App\Http\Controllers\LoginController@index');
//User Login Logic
Route::post('/login','\App\Http\Controllers\LoginController@login');
//User Logout
Route::get('/logout','\App\Http\Controllers\LoginController@logout');
//User persona setting
Route::get('/user/me/setting','\App\Http\Controllers\UserController@setting');
//User setting logic
Route::post('/user/me/setting','\App\Http\Controllers\UserController@settingSave');

//List all posts
Route::get('/posts','\App\Http\Controllers\PostController@index');

//Create a new post and save it
Route::get('/posts/create','\App\Http\Controllers\PostController@create');
Route::post('/posts','\App\Http\Controllers\PostController@store');

//Display one post detail
Route::get('/posts/{post}','\App\Http\Controllers\PostController@show');

//Edit a post and update it
Route::get('/posts/{post}/edit','\App\Http\Controllers\PostController@edit');
Route::put('/posts/{post}','\App\Http\Controllers\PostController@update');

//Delete a post
Route::get('/posts/{post}/delete','\App\Http\Controllers\PostController@delete');

//upload image
Route::post('/posts/image/upload','\App\Http\Controllers\PostController@imageUpload');

