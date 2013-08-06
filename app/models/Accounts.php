<?php

class Accounts extends Eloquent {

	protected $primaryKey 	= 'account_id';
	protected $table 		= 'login';
	public $timestamps 		= false;

	public static function saveData()
	{
		return 'Active';
	}
}