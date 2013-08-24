<?php

class CommentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		$Input = Input::all();

		$Rules = array(
			'comment' => 'required'
		);

		$validator = Validator::make($Input,$Rules);

		$data['errors'] = "";

		if($validator->fails())
		{
			$data['errors'] = $validator->messages()->all();
		}
		else
		{
			$Comment = New Comments;

			$Comment->c_sid = Input::get('sid');
			$Comment->c_comment = Input::get('comment');
			$Comment->c_created = date('Y-m-d H:i:s');
			$Comment->c_accountid = Auth::user()->account_id;

			$Comment->save();

			$data['comment'] = nl2br($Comment->c_comment);
			$data['nickname'] = Auth::user()->userid;

			$data['sid'] = $Comment->c_sid;

			$data['content'] = (string) View::make('streams.comment',$data);

			$data['action'] = "comment_success";



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