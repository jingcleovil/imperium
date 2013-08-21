<?php

class AccountsController extends BaseController {

	protected $layout = "layouts.master";

	public function index()
	{

		$data['title'] = "Welcome to Page";

		$this->layout->content = View::make('main.index');

		View::share($data);
	}

	
	public function create()
	{
		$data['page_title'] = "Create";

		$this->layout->content = View::make('accounts.create');

		View::share($data);
	}

	public function login()
	{
		$data['page_title'] = "Create";

		$this->layout->content = View::make('accounts.login');

		View::share($data);
	}

	
	public function store()
	{
		$input = Input::all();

		$validate_email = "";
		$AllowMD5 		= false;
		$between		= '8,31';

		if(Config::get('my_config.EmailIsUnique'))
			$validate_email = "|unique:login,email";

		if(Config::get('my_config.AllowMD5'))
			$AllowMD5 = true;

		if(is_array(Config::get('my_config.PassWordLength')) && count(Config::get('my_config.PassWordLength')) >= 2)
		{
			$passlength = Config::get('my_config.PassWordLength');

			$between = $passlength[0].",".$passlength[1];
		}



		$rules = array(
			'username'			=> 'required|unique:login,userid|not_in:super,admin',
			'password'			=> 'required|between:'.$between,
			'confirmpassword'	=> 'required|same:password',
			'gender'			=> 'required',
			'email'				=> 'required|email'.$validate_email
		);

		$validator = Validator::make($input,$rules);

		$data['action'] = "forward";

		if($validator->fails())
		{
			$data['action'] = "retry";

			$messages = $validator->messages();

			if(Request::ajax())
			{
				$data['errors'] = $messages->all("<li>:message</li>");
				return Response::json($data);
			}

			return Redirect::to('accounts/create')->withErrors($validator);
		}
		else
		{
			$data['action'] = "success";

			$accounts = new Accounts;

			$password = Input::get('password');

			if($AllowMD5) $password = md5($password);

			$month 	= Input::get('month');
			$year 	= Input::get('year');
			$day 	= Input::get('day');

			$birthdate = $year."-".$month."-".$day;

			$accounts->userid 		= Input::get('username');
			$accounts->user_pass 	= $password;
			$accounts->email 		= Input::get('email');
			$accounts->sex 			= Input::get('gender');
			$accounts->birthdate	= $birthdate;

			$accounts->save();

			return Response::json($data);
		}

	}

	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		//
	}

	
	public function update($id)
	{
		//
	}

	
	public function destroy($id)
	{
		//
	}


}