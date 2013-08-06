<?php

class MiniController extends BaseController {

	public function minify($type=null,$id=null)
	{
		$response = Minify::outputByGroup($type,$id);
		
		echo $response;
	}

}