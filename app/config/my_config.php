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