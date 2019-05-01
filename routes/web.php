<?php
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/', 'WelcomeController@index');
Route::get('/signup', 'SignUpController@index');
Route::post('/signup', 'SignUpController@signup');

Route::middleware(['authenticated'])->group(function(){
    Route::get('/profile/{stock}', 'ProfileController@deleteStockFromProfile');
    Route::get('/profile', 'ProfileController@index');
    Route::get('/logout', 'LoginController@logout');
    Route::get('/stocks', 'StocksController@index');
    Route::post('/stocks/{stock}/{user}', 'StocksController@addStock');
    Route::get('/stocks/{id}', 'StocksController@getStock');
    Route::get('/stocks/{id}/search', 'StocksController@search');
    Route::get('/stocks/{id}/search/get', 'StocksController@getSearch');
  });
