<?php

class MainController extends BaseController {

	protected $layout = "layouts.default";

	public function index()
	{
		$data['title'] 	= "Imperium Control Panel (iCP)";
		$data['module'] = "main";

		$this->layout->content = View::make('main.index');

		View::share($data);
	}
}