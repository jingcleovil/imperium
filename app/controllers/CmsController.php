<?php

class CmsController extends BaseController {

	protected $table;
	protected $module;
	protected $title;

	public function __construct()
	{
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

		$results 	= $this->table->read($filter,$iDisplayStart,$displayRecords,array('updated_at'=>'desc'));
		$total 		= $this->table->read($filter)->count();

		foreach($results->get() as $res)
		{
			$rows[] = array(
				"<a href=\"".url('cms/'.$res->account_id)."\" class='glyphicon glyphicon-search'></a>",
				$res->page_title,
				$res->created_on
			);
		}

		$data['aaData'] = $rows;

		$data['iTotalDisplayRecords'] = $total;
		$data['iTotalRecords'] = $displayRecords;

		return Response::json($data);
	}

}