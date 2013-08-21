<?php

 
Route::get('/','MainController@index');

// Account Routes
Route::get('accounts/login','AccountsController@login');
Route::post('accounts/lists','AccountsController@lists');
Route::post('accounts/storage','AccountsController@storage');
Route::resource('accounts', 'AccountsController');

// Dashboard
Route::resource('dashboard','DashboardController');

// Strea Routes
Route::resource('streams', 'StreamsController');

// Characters Routes
Route::resource('characters/stats', 'CharactersController@stats');
Route::resource('characters/lists', 'CharactersController@lists');
Route::resource('characters', 'CharactersController');

// Items Routes
Route::resource('items', 'ItemsController');