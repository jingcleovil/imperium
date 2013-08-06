<?php namespace Jinggo\PaymentGateway\Facades;

use Illuminate\Support\Facades\Facade;

class Payment extends Facade {

	protected static function getFacadeAccessor() { return 'payment'; }

}