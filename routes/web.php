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


Route::get('/','PostsController@index');
Route::get('index','PostsController@index');
Route::post('create/{id}','PostsController@create');
// Route::post('reply','PostsController@reply');
Route::delete('delete/{id}','PostsController@delete');

Route::resource('articles', 'ArticleController');
Route::resource('users', 'UsersController');

Auth::routes();
Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'twitter|google');
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'twitter|google');
Route::get('/mypage', 'HomeController@index')->name('home');
