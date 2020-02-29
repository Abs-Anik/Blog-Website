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

Route::get('/','PagesController@index');

Route::get('/about','PagesController@about');

Route::get('/services','PagesController@services');
Route::get('/blog','PagesController@blog');


// post 

Route::get('/posts','PostsController@index');
Route::get('/show/{id}','PostsController@show');

Route::get('/create','PostsController@create');
Route::post('/store','PostsController@store');

Route::get('/edit/{id}','PostsController@edit');
Route::post('/update/{id}','PostsController@update');

Route::get('/destroy/{id}','PostsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
