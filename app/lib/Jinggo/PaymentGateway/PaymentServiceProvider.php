<?php namespace Jinggo\PaymentGateway;

use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app['payment'] = $this->app->share(function($app)
		{
			return new \Jinggo\PaymentGateway\Payment;
		});


		$this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Payment', 'Jinggo\PaymentGateway\Facades\Payment');
        });

	}

}