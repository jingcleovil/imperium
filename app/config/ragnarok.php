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

	'siteTitle'		=> 'Imperium Ragnarok Panel', // Default Site Title
	'AllowMD5'		=> true, // Set false if you want to disabled md5 password,
	'EmailIsUnique'	=> false, // Allow multiple email
	'PassWordLength'=> array(8,31), // Password max and min lenth

	/*
	|--------------------------------------------------------------------------
	| Menu Settings
	|--------------------------------------------------------------------------
	|
	| Do not modify settings below unless you know what you are doing.
	|
	*/

	'MenuItems'	=>	array(

		'Main Menu'	=>	array(
			'Home'		=>	array('module'	=> '/', 'icon' => 'home'),
			'Streams'	=>	array('module'	=> 'streams', 'icon' => 'link'),
		),

		'Account'	=>	array(
			'Register' 	=> array('module' => 'accounts', 'action' => 'create', 'icon' => 'user'),
			'Login' 	=> array('module' => 'accounts', 'action' => 'login', 'icon' => 'lock'),
		),

		'Donations'	=>	array(
			'Purchase' => array('module' => 'account', 'action' => 'create', 'icon' => 'usd'),
			'Donate' => array('module' => 'account', 'action' => 'create', 'icon' => 'shopping-cart')
		),
	
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