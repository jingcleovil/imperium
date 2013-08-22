<?php

class Access extends Eloquent {

	public static function checkAccess($path)
	{
		$modules = Config::get('ragnarok.Modules');
        $show   = false;

		$path 	 = explode('/',$path);

		$AuthURL = "accounts/login";

        $action = isset($path[1]) ? $path[1] : false;
        $module = isset($path[0]) ? $path[0] : false;

        if(isset($modules[$module][$action]))
        {
        	//echo  $modules[$module][$action];
        }
        else if(isset($modules[$module]['index']))
        {
        	$mod = $modules[$module]['index'];

        	if($mod >= 0)
        	{
        		if(Auth::check())
        		{
        			$group_id = Auth::user()->group_id;

        			if($group_id >= $mod)
        				return;
        			else
        				return Redirect::to($AuthURL);
        		}

        		return Redirect::to($AuthURL);
        	}
        }

	}
}