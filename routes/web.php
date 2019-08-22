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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/devices','DevicesController@index');

Route::get('/devices/create','DevicesController@create');

Route::post('/devicesaction','DevicesController@storeDevice');

Route::get('/loginForm','FormController@create');
Route::post('/devicesaction','FormController@store');
Route::get('/display','FormController@index');

//blog
Route::get('/blogs','BlogsController@index')->name('blogs_path');
Route::get('/blogs/create','BlogsController@create')->name('create_blog_path');
Route::post('/blogs','BlogsController@store')->name('store_blog_path');
Route::get('/blogs/{id}', 'BlogsController@show')->name('blog_path');
Route::get('/blogs/{id}/edit', 'BlogsController@edit')->name('edit_blog_path');
Route::put('/blogs/{id}','BlogsController@update')->name('update_blog_path');
Route::delete('/blogs/{id}','BlogsController@delete')->name('delete_blog_path');


//Route::get('/blogs/comments','BlogsController@create_comment')->name('create_blog_path');




Route::get('/blogs/comment','BlogsController@create_comment')->name('create_comment');
Route::post('/blog','BlogsController@store_comment')->name('store_comment');
//Route::get('/comments','CommentsController@index')->name('comments_path');
//Route::get('/comments/{$id}','CommentsController@show_comment')->name('comments_blog_path');



//endblog
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::post('/', 'HomeController@index')->name('home');
