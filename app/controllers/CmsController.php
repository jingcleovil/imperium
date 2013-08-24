<?php

class CmsController extends BaseController {

	protected $table;
	protected $module;
	protected $title;

	public function __construct()
	{
		$this->beforeFilter('checkModule');
		
		$this->module = "Cms";
		$this->table = new Cms;
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
		$data['title'] = "Content Management System";
		$data['module'] = strtolower($this->module);
		
		$this->layout->content = View::make('cms.index');

		View::share($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['title'] = "Create page";
		$data['module'] = strtolower($this->module);
		
		$this->layout->content = View::make('cms.create');

		View::share($data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$Input = Input::all();

		$Rules = array(
			'page_title' => 'required'
		);

		$Validator = Validator::make($Input,$Rules);

		if($Validator->fails())
		{
			$data['errors'] = $Validator->messages('<li>:messages</li>')->all();
			$data['action'] = "retry";
		}
		else
		{
			$data['action'] = "forward";
			$data['url'] = url('cms');

			$Pages = new Pages;

			$Pages->p_body = Input::get('page_content');
			$Pages->p_title = Input::get('page_title');
			$Pages->p_author = Auth::user()->account_id;

			$Pages->save();

		}

		return Response::json($data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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

	public function lists()
	{
		$table			= new Pages;

		$displayRecords = Input::get('iDisplayLength');
		$iDisplayStart	= Input::get('iDisplayStart');
		$sSearch 		= Input::get('sSearch');

		$rows 			= [];
		$filter			= [];
		$data['aaData'] = [];

		if($sSearch)
		{
			$filter = ['page_title','like',"%$sSearch%"];
		}

		$results 	= $table->read($filter,$iDisplayStart,$displayRecords,array('updated_at'=>'desc'));
		$total 		= $table->read($filter)->count();

		foreach($results->get() as $res)
		{
			$rows[] = array(
				"<a href=\"".url('cms/'.$res->id)."\" class='glyphicon glyphicon-search'></a>",
				$res->p_title,
				$res->p_author,
				$res->created_at
			);
		}

		$data['aaData'] = $rows;

		$data['iTotalDisplayRecords'] = $total;
		$data['iTotalRecords'] = $displayRecords;

		return Response::json($data);
	}

}