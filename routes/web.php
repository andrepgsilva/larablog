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

Route::group (
    ['prefix'=>'profile', 'as'=>'profile.', 'where'=>['id', '[0-9]+'], 'middleware'=>'auth'],

    function() {
        Route::get('{user}/edit', 'ProfileController@edit')->name('edit');
        Route::patch('{user}', 'ProfileController@update')->name('update');
    }
);

Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');