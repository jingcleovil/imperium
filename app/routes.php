<?php

 
Route::get('/','MainController@index');

// Account Routes
Route::get('accounts/login','AccountsController@login');
Route::post('accounts/lists','AccountsController@lists');
Route::resource('accounts', 'AccountsController');

// Dashboard
Route::resource('dashboard','DashboardController');

// Strea Routes
Route::resource('streams', 'StreamsController');

// Characters Routes
Route::resource('characters/lists', 'CharactersController@lists');
Route::resource('characters', 'CharactersController');


Route::resource('servers', 'ServersController');