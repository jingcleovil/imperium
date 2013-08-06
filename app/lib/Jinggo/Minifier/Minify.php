<?php namespace Jinggo\Minifier;

use \Illuminate\Support\Facades\Config;
use \Illuminate\Support\Facades\Response;

class Minify {

 	var $lang;
 	var $version;
 	var $browser;
 	var $css3;
 	var $ssl;
 	var $resource;
 	var $assets;

 	public function __construct()
 	{
 		$this->resource = Config::get('my_config.resource_folder');
 		$this->assets = Config::get('my_config.assets');
 	}

	public function js($js)
	{
		$jsmin = JSMin::minify($js);

		return $jsmin;
	}

	public function initialize($lang=false,$browser=false,$version=false,$css3=false,$ssl=false)
	{
		return $lang;
	}

	public function gfiles($type=null,$id=null)
	{
		if(!isset($this->assets[$type][$id])) die("$type and $id is invalid");

		$files = $this->assets[$type][$id];
		$rfiles = array();

		foreach($files as $f) {

			$target = $this->resource.$type."/".$f['file'];
			$upath = $this->resource.$f['path'];

			if(file_exists($target)) {
				$rfiles[] = array('path'=>$upath,'file'=>$target);
			}
		}

		return $rfiles;
	}

	public function mtime($type, $id) 
	{
		$files = $this->gfiles($type,$id);
	}

	public function outputByGroup($type,$id)
	{
		$files = $this->gfiles($type,$id);

		if(!$files) die("$type and $id is invalid: outputByGroup");

		$content = "";

		foreach($files as $f)
		{
			$string = file_get_contents($f['file']);

			if($type == "js")
			{
				$content .= $this->js($string);
			}
		}

		$out = "";

		if($type == "js")
		{
			$out = $this->set_output("application/x-javascript",$content);
		}

		return $out;
	}

	public function set_output($type="",$content="",$time="",$expires="")
	{
		$response = Response::make($content);

		if (!$time) $time = time();

		$last_modified_time = $time;
		$etag = md5($content);

		$response->header("last-modified", gmdate("D, d M Y H:i:s", $last_modified_time)." GMT");
		$response->header("etag",$etag);

		$response->header("content_type","$type; charset=utf-8");
		$response->header("Pragma","public");
		$response->header("Cache-Control","maxage=".$expires);
		$response->header('Expires', gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');


		return $content;

	}
}