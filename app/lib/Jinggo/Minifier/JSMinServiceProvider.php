<?php namespace Jinggo\Minifier;

use Illuminate\Support\ServiceProvider;

class JSMinServiceProvider extends ServiceProvider {
	
	public function register()
	{
		$this->app['jsmin'] = $this->app->share(function($app)
		{
			return new \Jinggo\Minifier\JSMin;
		});

		$this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Minify', 'Jinggo\Minifier\Facades\JSMin');

        });

	}

}