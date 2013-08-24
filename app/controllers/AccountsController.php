<?php

class AccountsController extends BaseController {

	protected $layout;
	protected $table;
	protected $module;
	protected $title;

	public function __construct()
	{
		$this->beforeFilter('checkModule');
		
		$this->module = "Accounts";
		$this->table = new Accounts;
		$this->layout = "layouts.".Config::get('ragnarok.DefaultTheme');

		$menuItems = Config::get('ragnarok.MenuItems');

		if(isset($menuItems[$this->module]))
		{
			$module 	  = $menuItems[$this->module];
			$this->module = $module['module'];
		}

	}
	

	public function index()
	{

		$data['title'] = ucwords($this->module);
		$data['module'] = $this->module;

		$this->layout->content = View::make('accounts.index');

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
		$data['title'] = "Login";
		$data['icon'] = "lock";

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
		$user = Accounts::find($id)->toArray();

		$data['title'] 	= "Viewing Account [ ".$id." ]";
		$data['user'] 	= $user;
		$data['icon'] 	= "user";
		$data['module'] = $this->module;

		$this->layout->content = View::make('accounts.show');

		View::share($data);
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

	public function lists()
	{
		$displayRecords = Input::get('iDisplayLength');
		$iDisplayStart	= Input::get('iDisplayStart');
		$sSearch 		= Input::get('sSearch');

		$rows 			= [];
		$filter			= [];
		$data['aaData'] = [];

		if($sSearch)
		{
			$filter = ['userid','like',"%$sSearch%"];
		}

		$results 	= $this->table->read($filter,$iDisplayStart,$displayRecords,array('account_id'=>'desc'));
		$total 		= $this->table->read($filter)->count();

		foreach($results->get() as $res)
		{
			$rows[] = array(
				"<a href=\"".url('accounts/'.$res->account_id)."\" class='glyphicon glyphicon-search'></a>",
				$res->account_id,
				$res->userid,
				"***@domain.com",
				$res->sex === 'M' ? 'Male' : 'Female',
				$res->last_ip,
				$res->lastlogin
				
			);
		}

		$data['aaData'] = $rows;

		$data['iTotalDisplayRecords'] = $total;
		$data['iTotalRecords'] = $displayRecords;

		return Response::json($data);
	}

	public function storage()
	{

		$this->table = new Storage;

		$displayRecords = Input::get('iDisplayLength');
		$iDisplayStart	= Input::get('iDisplayStart');
		$sSearch 		= Input::get('sSearch');

		$account_id 	= Input::get('account_id');

		$rows 			= [];
		$filter			= [];
		$data['aaData'] = [];

		if($sSearch)
		{
			$filter[] = ['name_japanese','like',"%$sSearch%"];
		}

		if($account_id)
		{
			$filter[] = ['account_id','=',$account_id];
		}

		$results 	= $this->table->read($filter,$iDisplayStart,$displayRecords,array('account_id'=>'desc'));
		$total 		= $this->table->read($filter)->count();

		foreach($results->get() as $res)
		{
			
			$image = "";

			if(file_exists(public_path('images/items/thumb/'.$res->nameid.".gif")))
			{
				$image = "<img src='".asset('images/items/thumb/'.$res->nameid).".gif'/>";
			}

			if($res->type == 6)
			{
				$image = "<img src='".asset('images/items/card.gif')."'/>";
			}

			$rows[] = array(
				$res->id,
				$image,
				"<a href='".url('items/'.$res->id)."' class='view_data'>".$res->name_japanese."</a>",
				$res->amount,
				$res->expire_time,
				""
			);
		}

		$data['aaData'] = $rows;

		$data['iTotalDisplayRecords'] = $total;
		$data['iTotalRecords'] = $displayRecords;

		return Response::json($data);
	}

	public function auth()
	{
		$username = trim(Input::get('userid'));
		$password = trim(Input::get('user_pass'));

		if(Config::get('ragnarok.MD5') === true)
			$password = md5($password);

		$account = Accounts::where('userid',$username)->where('user_pass',$password)->get()->toArray();

		if(!$account)
		{
			return Redirect::to('accounts/login')
						->with('login_errors', true);
		}
		else
		{
			
			$user = User::find($account[0]['account_id']);

			Auth::login($user);

			return Redirect::to('dashboard');

		}
	}

	public function logout()
	{
		Auth::logout();

		return Redirect::to('/');
	}
}