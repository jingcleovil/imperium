<?php

// 
Route::get('/','MainController@index');

Route::get('mini/{type?}/{id?}','MiniController@minify');

// Account Routes

Route::get('accounts/login','AccountsController@login');
Route::resource('accounts', 'AccountsController');

// Auth

Route::post('login', function()
{
	$user = array(
		'userid' 	=> Input::get('username'),
		'user_pass' => md5(Input::get('password'))
	);

	$data['response'] = false;
	var_dump(Auth::attempt($user));

	if (Auth::attempt($user) )
	{
		return Redirect::intended('dashboard');
	}

	//return Redirect::intended('accounts/login');

	
});

