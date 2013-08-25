<?php

class StreamsController extends BaseController {

	protected $layout;
	protected $table;
	protected $module;
	protected $title;

	public function __construct()
	{
		$this->beforeFilter('checkModule');
		
		$this->module = "Streams";
		$this->table = new Stream;
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
		$stream = new Stream;

		$data['title'] = "News Feed";
		$data['icon'] = "list-alt";

		$data['module'] = strtolower($this->module);

		$data['streams'] = $this->table->read(null,0,10,array("s_updated"=>"desc"))->get();


		$this->layout->content = View::make('streams.index');
	
		View::share($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$stream = new Stream;

		$share = Input::get('share');

		$db['s_stream'] = $share;
		$db['s_created'] =  date('Y-m-d H:i:s');
		$db['s_updated'] =  date('Y-m-d H:i:s');
		$db['s_accountid'] =  Auth::user()->account_id;

		$sid = DB::table('gcp_stream')->insertGetId($db);

		$stream->s_stream = $share;
		$stream->s_created = date('Y-m-d H:i:s');
		$stream->s_updated = date('Y-m-d H:i:s');
		$stream->s_accountid = Auth::user()->account_id;

		//$sid = $stream->save()->insertGetId();

		$data['action'] = "share_fails";

		if($share)
		{
			$db['streams'] = $this->table->read(array('sid','=',$sid),0,10,array("s_updated"=>"desc"))->get();
			$data['action'] = "share_success";
			$data['content'] = (string) View::make('streams.post',$db);
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

}