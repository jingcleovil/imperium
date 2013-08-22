<?php

class DashboardController extends BaseController {

	protected $layout = "layouts.default";
	protected $table;

	public function __construct()
	{
		$this->table = new Dashboard;

		$this->beforeFilter('checkModule');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['title'] = "Dashboard";

		$data['totalAccounts'] 		= $this->table->totalAccounts();
		$data['totalCharacters'] 	= $this->table->totalCharacters();
		$data['totalGuilds'] 		= $this->table->totalGuilds();
		$data['totalZeny'] 			= $this->table->totalZeny();
		
		$this->layout->content = View::make('dashboard.index');

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

}