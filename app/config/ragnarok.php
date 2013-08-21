<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Ragnarok Default Settings
	|--------------------------------------------------------------------------
	|
	| This is your default ragnarok settings
	|
	*/

	'SiteName'		=> 'Imperium Control Panel', // Default Site Title
	'AllowMD5'		=> true, // Set false if you want to disabled md5 password,
	'EmailIsUnique'	=> false, // Allow multiple email
	'PassWordLength'=> array(8,31), // Password max and min lenth
	'DefaultTheme'  => 'default',

	'ServerInfo'	=>	array(

		'ServerName' => 'Imperium RO', 

	),

	/*
	|--------------------------------------------------------------------------
	| Menu Settings
	|--------------------------------------------------------------------------
	|
	| Do not modify settings below unless you know what you are doing.
	|
	*/

	'MenuItems'		=> 	array(

		'Home'			=> array('module' => '/', 	'icon' => 'home', 'access' => array(1,2,3)),
		'Dashboard'		=> array('module' => 'dashboard', 	'icon' => 'time', 'access' => array(1,2,3)),
		'Accounts'		=> array('module' => 'accounts', 	'icon' => 'user'),
		'Characters'	=> array('module' => 'characters', 	'icon' => 'list'),
		'CMS'			=> array('module' => 'cms', 	'icon' => 'list'),
		'Server Info'	=> array('module' => 'servers', 		'icon' => 'tasks'),
		'Donate'		=> array('module' => 'donation', 	'icon' => 'usd'),
		'Purchase'		=> array('module' => 'itemall/purchase', 	'icon' => 'shopping-cart'),
		'Login'			=> array('module' => 'accounts/login', 	'icon' => 'lock'),
		'Logout'		=> array('module' => 'accounts/logout', 	'icon' => 'off'),

	),

	/*
	|--------------------------------------------------------------------------
	| Assets Settings
	|--------------------------------------------------------------------------
	|
	| Do not modify settings below unless you know what you are doing.
	|
	*/

	'resource_folder' => 'resources/',

	'assets' => array(

		'css' => array(

			'default' => array(
				array('path'=>'css/', 'file'=>'style.css')			
			),
			'main' => array(
				 array('path'=>'css/', 'file'=>'main.css')			
				,array('path'=>'css/', 'file'=>'main.css')			
			),
		),

		'js' => array(
			'default' => array(
				 array('path'=>'js/', 'file'=>'app.js')
				,array('path'=>'js/', 'file'=>'script.js')
			)
		)

	)

);