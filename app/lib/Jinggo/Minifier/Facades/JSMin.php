<?php namespace Jinggo\Minifier\Facades;

use Illuminate\Support\Facades\Facade;

class JSMin extends Facade {

	protected static function getFacadeAccessor() { return 'jsmin'; }
	
}