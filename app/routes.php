<?php


Route::get('/','MainController@index');

Route::get('mini/{type?}/{id?}','MiniController@minify');

Route::resource('accounts', 'AccountsController');