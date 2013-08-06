<?php namespace Jinggo\Minifier\Facades;

use Illuminate\Support\Facades\Facade;

class Minify extends Facade {

	protected static function getFacadeAccessor() { return 'minify'; }
	
}