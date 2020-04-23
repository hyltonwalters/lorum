<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');
Route::resource('threads', 'ThreadsController')->except('show');
Route::get('threads/{channel}/{thread}', 'ThreadsController@show')->name('threads.show');
Route::get('threads/{channel}', 'ChannelsController@index')->name('channels.index');
Route::post('threads/{channel}/{thread}/replies', 'RepliesController@store')->name('replies.store');
