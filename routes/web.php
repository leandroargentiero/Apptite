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
// SEARCH ROUTES
Route::post('/events/zoeken', 'EventController@search');



    // MEALS ROUTES
    Route::get('/mijnkookboek', 'MealController@index');
    Route::get('maaltijden/aanmaken', 'MealController@create');
    Route::post('/maaltijden', 'MealController@store');
    Route::delete('/meals/{meal}', 'MealController@destroy');


    // EVENT ROUTES
    Route::get('/events', 'EventController@index');
    Route::get('/mijnevents', 'EventController@index');
    Route::post('events/aanmaken', 'EventController@store');
    Route::post('/events/update/{id}', 'EventController@update');
    Route::get('/events/{id}', 'EventController@show');
    Route::delete('/events/{event}', 'MealController@destroy');

    // Profile ROUTES
    Route::get('/mijnprofiel', 'UserController@index');
    Route::get('/profiel/{id}', 'UserController@show');
    Route::post('/mijnprofiel/update', 'UserController@update');


    // RESERVATION ROUTES
    Route::get('/mijnreservaties', 'ReservationController@index');
    Route::post('/reservaties/reserveren', 'ReservationController@store');
    Route::delete('/reservaties/{id}', 'ReservationController@destroy');

    // REVIEW ROUTES
    Route::post('/review/{id}', 'ReviewController@store');



