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
	'MD5'			=> true, // Set false if you want to disabled md5 password,
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

		'Home'			=> array('module' => '/', 			'icon' => 'home'),
		'Dashboard'		=> array('module' => 'dashboard', 	'icon' => 'time'),
		'Streams'		=> array('module' => 'streams', 	'icon' => 'globe'),
		'Accounts'		=> array('module' => 'accounts', 	'icon' => 'user'),
		'Characters'	=> array('module' => 'characters', 	'icon' => 'list'),
		'CMS'			=> array('module' => 'cms', 		'icon' => 'book'),
		'Server Info'	=> array('module' => 'servers', 	'icon' => 'tasks'),
		'Donate'		=> array('module' => 'donations', 	'icon' => 'usd'),
		'Purchase'		=> array('module' => 'items', 'action'=>'purchase', 'icon' => 'shopping-cart'),
		'Login'			=> array('module' => 'accounts', 'action' => 'login', 'icon' => 'lock'),
		'Logout'		=> array('module' => 'accounts', 'action' => 'logout', 'icon' => 'off'),

	),

	// SubMenus
	
	'SubMenus' 	=> array(
		
		'cms'	=>	array(
			'Lists' => array('module' => 'cms', 'action' => '/'),
			'Create Page' => array('module' => 'cms', 'action' => 'create'),
		)
	),

	/*
	|--------------------------------------------------------------------------
	| Item Mall Settings
	|--------------------------------------------------------------------------
	|
	| Do not modify settings below unless you know what you are doing.
	|
	*/

	'ItemCategories' => array(
		'All' => 2,
		''
	),

	/*
	|--------------------------------------------------------------------------
	| Group Settings
	|--------------------------------------------------------------------------
	|
	| Do not modify settings below unless you know what you are doing.
	|
	*/

	'Groups' => array(
		0 => array(
			'name'  => "Player",
			'level' => AccountLevel::NORMAL
		),
		1 => array(
			'name'  => "Super Player",
			'level' => AccountLevel::NORMAL
		),
		2 => array(
			'name'  => "Support",
			'level' => AccountLevel::LOWGM
		),
		3 => array(
			'name'  => "Script Manager",
			'level' => AccountLevel::LOWGM
		),
		4 => array(
			'name'  => "Event Manager",
			'level' => AccountLevel::LOWGM
		),
		10 => array(
			'name'  => "Law Enforcement",
			'level' => AccountLevel::HIGHGM
		),
		99 => array(
			'name'  => "Administrator",
			'level' => AccountLevel::ADMIN
		)
	),

	/*
	|--------------------------------------------------------------------------
	| Access Settings
	|--------------------------------------------------------------------------
	|
	| Do not modify settings below unless you know what you are doing.
	|
	*/


	'Modules' => array(
		'main'	=>	array(
			"index"	=> AccountLevel::NORMAL
		),
		'dashboard' => array(
			"index"	=> AccountLevel::NORMAL
		),
		'streams' => array(
			"index"	=> AccountLevel::NORMAL,
		),
		'accounts' => array(
			"index"	=> AccountLevel::ADMIN,
			"login"	=> AccountLevel::UNAUTH,
			"logout"=> AccountLevel::NORMAL,
			"auth" 	=> AccountLevel::ANYONE
		),
		'characters' => array(
			"index"	=> AccountLevel::ADMIN,
			"stats" => AccountLevel::NORMAL
		),
		'cms' => array(
			"index"	=> AccountLevel::ADMIN,
		),
		
		'items' => array(
			"index"	=> AccountLevel::ADMIN,
			"purchase"	=> AccountLevel::NORMAL,
		)
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