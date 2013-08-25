<?php

Route::get('/','MainController@index');


// Dashboard
Route::resource('dashboard','DashboardController');

// Account Routes
Route::get('accounts/login','AccountsController@login');
Route::get('accounts/logout','AccountsController@logout');
Route::post('accounts/lists','AccountsController@lists');
Route::post('accounts/storage','AccountsController@storage');
Route::post('accounts/auth','AccountsController@auth');
Route::resource('accounts', 'AccountsController');

// Strea Routes
Route::resource('streams', 'StreamsController');

// Characters Routes
Route::resource('characters/stats', 'CharactersController@stats');
Route::resource('characters/lists', 'CharactersController@lists');
Route::resource('characters', 'CharactersController');

// Items Routes
Route::get('items/purchase','ItemsController@purchase');
Route::post('items/purchase','ItemsController@purchase');
Route::resource('items', 'ItemsController');

// CMS Routes
Route::post('cms/lists', 'CmsController@lists');
Route::resource('cms', 'CmsController');

// Server Route
Route::resource('servers', 'ServersController');

// Donation Routes
Route::resource('donations', 'DonationsController');

// Comments
Route::resource('comments','CommentsController');


