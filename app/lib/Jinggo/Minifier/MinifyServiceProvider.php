<?php namespace Jinggo\Minifier;

use Illuminate\Support\ServiceProvider;

class MinifyServiceProvider extends ServiceProvider {
	
	public function register()
	{
		$this->app['minify'] = $this->app->share(function($app)
		{
			return new \Jinggo\Minifier\Minify;
		});


		$this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Minify', 'Jinggo\Minifier\Facades\Minify');
            
        });

	}

}