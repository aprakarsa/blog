<?php

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

// Post
Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts/{post}/comments', 'CommentsController@store');

// Register
Route::get('/register','RegistrationsController@create');
Route::post('/register','RegistrationsController@store');

// Login
Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store');

Route::get('/logout','SessionsController@destroy');