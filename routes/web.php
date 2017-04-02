<?php
// INDEX
Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
