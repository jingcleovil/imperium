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
		$data['title'] 	= "Register Account";
		$data['ptitle'] = "Register Account";
		$data['stitle'] = "Please read our Terms of Service (ToS) before registering for an account, to ensure that you understand the rules of holding an account with our private Ragnarok Online game server.";
		$data['module'] = "create";


		$this->layout->content = View::make('accounts.create');

		View::share($data);
	}

	
	public function store()
	{
		$input = Input::all();

		$rules = array(
			'username'	=> 'required|unique:login,userid',
			'password'	=> 'required',
			'confpassword'	=> 'required|same:password',
		);

	
		$validator = Validator::make($input,$rules);

		if($validator->fails())
		{
			$messages = $validator->messages();

			if(Request::ajax())
			{
				$data['response'] = $messages->all("<li>:message</li>");

				return Response::json($data);
			}

			return Redirect::to('accounts/create')->withErrors($validator);
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