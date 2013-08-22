<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//

});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('accounts/login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


Route::filter('checkModule', function($route,$request)
{
	$path 		= explode('/',$request->path());
	$modules 	= Config::get('ragnarok.Modules');
	$module 	= $path[0];
	$action 	= isset($path[1]) ? $path[1] : false;

	$auth_url  	= "accounts/login";
	$redirect 	= false;

	if(isset($modules[$module]))
	{
		$mod = $modules[$module];

		if(isset($mod[$action]))
		{
			if(in_array($mod[$action],array("ADMIN","AUTH")))
			{
				$redirect = true;
				if(Auth::check())
						$redirect = false;
			}
		}
		else
		{
			if(isset($mod['index']))
			{
				if(in_array($mod['index'],array("ADMIN","AUTH")))
				{
					$redirect = true;

					if(Auth::check())
						$redirect = false;
				}
			}
		}
	}

	if($redirect)
	{
		return Redirect::to($auth_url);
	}
});
