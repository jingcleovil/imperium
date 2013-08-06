<?php namespace Jinggo\Validators;

class DbExists extends \Illuminate\Validation\Validator {

	public function validateUsernameExist($att,$val,$param)
	{
		return $val !== "admin";
	}

}