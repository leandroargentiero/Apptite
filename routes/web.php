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
    Route::get('/mymeals', 'MealController@index');
    Route::get('meals/create', 'MealController@create');
    Route::post('/meals', 'MealController@store');
    Route::delete('/meals/{meal}', 'MealController@destroy');


    // EVENT ROUTES
    Route::get('/events', 'EventController@index');
    Route::post('events/create', 'EventController@store');
    Route::delete('/events/{event}', 'MealController@destroy');

    Route::get('/users', 'UserController@index');

});