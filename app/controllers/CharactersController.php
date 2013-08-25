<?php

class CharactersController extends BaseController {

	protected $layout;
	protected $table;
	protected $module;
	protected $title;

	public function __construct()
	{
		$this->beforeFilter('checkModule');
		
		$this->table = new Character;

		$this->module = "Characters";
		$this->layout = "layouts.".Config::get('ragnarok.DefaultTheme');

		$menuItems = Config::get('ragnarok.MenuItems');

		if(isset($menuItems[$this->module]))
		{
			$module 	  = $menuItems[$this->module];
			$this->module = $module['module'];
		}

	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function index()
	{
		$data['title'] = ucwords($this->module);
		$data['module'] = $this->module;

		$this->layout->content = View::make($this->module.'.index');

		View::share($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = new Character;

		$filter[] = ['char_id','=',$id];

		$char = $user->read($filter)->get();

		$data['title'] 	= "Viewing Character [ ".$id." ]";
		$data['char'] = $char[0];
		$data['icon'] 	= "user";
		$data['module'] = $this->module;
		$data['id']		= $id;

		$this->layout->content = View::make('characters.show');

		View::share($data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function lists($id=null)
	{

		if($id)
		{
			$filter[] = ['char.account_id','=',$id];

			$data['chars'] = $this->table->read($filter)->get();

			$content = View::make('characters.lists',$data);

			$data['content'] = (string) $content;

			return Response::json($data);
		}

		$displayRecords = Input::get('iDisplayLength');
		$iDisplayStart	= Input::get('iDisplayStart');
		$sSearch 		= Input::get('sSearch');

		$rows 			= [];
		$filter			= [];
		$data['aaData'] = [];

		if($sSearch)
		{
			$filter[] = ['name','like',"%$sSearch%"];
		}

		$results 	= $this->table->read($filter,$iDisplayStart,$displayRecords,array('char_id'=>'desc'));
		$total 		= $this->table->read($filter)->count();

		foreach($results->get() as $res)
		{
			$job_name = "Unknown";
			$job_class = Config::get('classes.Jobs');

			if(isset($job_class[$res->class]))
			{
				$job_name = $job_class[$res->class];
			}

			$rows[] = array(
				"<a href='".url('characters/'.$res->char_id)."' class='glyphicon glyphicon-search'></a>",
				$res->char_id,
				$res->account_id,
				$res->name,
				$res->str,
				$res->vit,
				$res->agi,
				$res->int,
				$res->dex,
				$res->luk,
				$res->status_point,
				$job_name
				
			);
		}

		$data['aaData'] = $rows;

		$data['iTotalDisplayRecords'] = $total;
		$data['iTotalRecords'] = $displayRecords;

		return Response::json($data);
	}

	public function stats()
	{
		$job_class = Config::get('classes.Jobs');

		$chars = array();
		$series = array();

		$characters = $this->table->stats();

		foreach($characters as $char)
		{
			
			if(isset($job_class[$char->class]))
			{
				$chars[] = array((string)$job_class[$char->class],(int)$char->total_class);
			}
		}

		$data['data']['data'] = $chars;
		$data['data']['series'] = $series;

		//$data['chars'] = $chars;

		return Response::json($data);
	}

	public function inventory()
	{

		$displayRecords = Input::get('iDisplayLength');
		$iDisplayStart	= Input::get('iDisplayStart');
		$sSearch 		= Input::get('sSearch');

		$char_id 	= Input::get('char_id');

		$rows 			= [];
		$filter			= [];
		$data['aaData'] = [];

		$filter[]		= ['char_id','=',$char_id];

		if($sSearch)
		{
			$filter[] = ['name_japanese','like',"%$sSearch%"];
		}

		$results 	= $this->table->inventory($filter,$iDisplayStart,$displayRecords,array('inventory.id'=>'desc'));
		$total 		= $this->table->inventory($filter)->count();

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
				$res->name_japanese,
				$res->amount,
				$res->expire_time
			);
		}

		$data['aaData'] = $rows;

		$data['iTotalDisplayRecords'] = $total;
		$data['iTotalRecords'] = $displayRecords;

		return Response::json($data);
	}
}