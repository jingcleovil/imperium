<?php

class MainController extends BaseController {

	protected $layout = "layouts.master";

	public function index()
	{
		$data['title'] 	= "Welcome to Page";
		$data['module'] = "main";

		$this->layout->content = View::make('main/index');

		View::share($data);
	}
}