<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// pour sécuriser une route mais ça nécessite une requete qui contient un user
// ->middleware('CheckRole:user') 

//Routes Posts
Route::get('post', 'PostsController@index')->name('post');

Route::get('post/read/{id}', 'PostsController@show')->name('read');

Route::get('post/create', 'PostsController@create');
Route::post('post/create', 'PostsController@store');


Route::get('post/edit/{id}', 'PostsController@edit');
Route::post('post/edit/{id}', 'PostsController@update');

Route::delete('post/delete/{id}', 'PostsController@destroy');

//Routes Comments
Route::get('/comment', 'CommentsController@index')->name('comments');

Route::get('post/comment/{id}', 'CommentsController@create');
Route::post('post/comment/{id}', 'CommentsController@store');

Route::get('comment/edit/{id}', 'CommentsController@edit');
Route::post('comment/edit/{id}', 'CommentsController@update');

Route::delete('comment/delete/{id}', 'CommentsController@destroy');