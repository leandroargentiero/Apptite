<?php
// INDEX
Route::get('/', function () {
    return view('home');
});
// INDEX - HOME ROUTE
Route::get('/home', 'HomeController@index');

// /LOGIN - /REGISTER - /PASSWORDRESET
Auth::routes();
// LOGOUT ROUTE
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');




// ALL ROUTES WHERE USER LOGIN IS REQUIRED
Route::group(['namespace' => 'Admin'], function()
{


});