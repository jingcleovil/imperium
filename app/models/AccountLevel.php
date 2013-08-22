<?php

class AccountLevel extends Eloquent {

	const ANYONE =   -2;
	const UNAUTH =   -1;
	const NORMAL =    0;
	const LOWGM  =    1;
	const HIGHGM =    2;
	const ADMIN  =   99;
	const NOONE  = 9999;

	public static function getGroupLevel($group_id)
	{
		$groups = Config::get('ragnarok.Groups');

		if(isset($groups[$group_id]['level']))
			return $groups[$group_id]['level'];
		else
			return AccountLevel::ANYONE;
		
	}

	public static function getGroupName($group_id)
	{
		$groups = Config::get('ragnarok.Groups');

		if(isset($groups[$group_id]['name']))
			return $groups[$group_id]['name'];
		else
			return null;
	}



}