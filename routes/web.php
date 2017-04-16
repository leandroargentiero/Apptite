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
Route::group(array('middleware' => 'auth'), function () {

    // MEALS ROUTES
    Route::get('/mijnmaaltijden', 'MealController@index');
    Route::get('maaltijden/aanmaken', 'MealController@create');
    Route::post('/maaltijden', 'MealController@store');
    Route::delete('/meals/{meal}', 'MealController@destroy');


    // EVENT ROUTES
    Route::get('/events', 'EventController@index');
    Route::post('events/aanmaken', 'EventController@store');
    Route::get('/events/{id}', 'EventController@show');
    Route::delete('/events/{event}', 'MealController@destroy');

    // Profile ROUTES
    Route::get('/mijnprofiel', 'UserController@index');
    Route::get('/profiel/{profiel}', 'UserController@show');
    Route::post('/mijnprofiel/update', 'UserController@update');


    // EVENT ROUTES

    // RESERVATION ROUTES


    Route::get('/users', 'UserController@index');

});