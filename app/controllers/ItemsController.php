<?php

class ItemsController extends BaseController {

	protected $layout;
	protected $table;
	protected $module;
	protected $title;

	public function __construct()
	{
		$this->beforeFilter('checkModule');
		
		$this->table = new Items;

		$this->module = "items";
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
		$data['module'] = "items";
		
		$this->layout->content = View::make('items.index');

		View::share($data);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function purchase($type=null)
	{
		$page = Input::get('skip');
		$skip = 0;
		
		if($page) $skip = $page;
		$take = 30;

		$filter[] = array('premium','=',1);

		if($type)
		$filter[] = array('type','=',$type);



		$items = $this->table->read($filter,$skip,$take);

		$data['items'] = $items->get();

		if(Request::ajax())
		{
			$content['content'] = (string) View::make('items.items',$data);
			return Response::json($content);
		}

		$data['module'] = "items";
		
		$data['title'] = "Item Mall";
		$data['icon'] = "shopping-cart";


		$this->layout->content = View::make('items.purchase');

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
		$data['item'] = $item = $this->table->find($id)->toArray();


		$data['icon'] = "";

		if(file_exists(public_path('images/items/thumb/'.$id.".gif")))
		{
			$data['icon'] = "<img src='".asset('images/items/thumb/'.$id).".gif'/>";
		}

		if($item['type'] == 6)
		{
			$data['icon'] = "<img src='".asset('images/items/card.gif')."'/>";
		}

		$content = View::make('items.show',$data);

		if(Request::ajax())
		{
			$data['content'] = (string)$content;
			$data['title'] = $data['icon']." ".$item['name_japanese']." [ $item[id] ]";

			return Response::json($data);
		}

		return $content;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['item'] = $item = $this->table->find($id)->toArray();

		$data['id'] = $id;

		return View::make('items.edit',$data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$item = Items::find($id);

		$item->update(Input::all());

		return Response::json(array('response'=>'updated'));
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
			$filter = ['userid','like',"%$sSearch%"];
		}

		$results 	= $this->table->read($filter,$iDisplayStart,$displayRecords,array('id'=>'desc'));
		$total 		= $this->table->read($filter)->count();

		foreach($results->get() as $res)
		{
			$rows[] = array(
				
			);
		}

		$data['aaData'] = $rows;

		$data['iTotalDisplayRecords'] = $total;
		$data['iTotalRecords'] = $displayRecords;

		return Response::json($data);
	}
}