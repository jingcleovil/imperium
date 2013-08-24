<?php

class Comments extends Eloquent {

	protected $table = "gcp_comment";
	protected $primaryKey = "cid";
	public $timestamps = false;


	public function getComments($sid)
	{
		$comments = DB::table($this->table)
					->orderBy('cid','desc')
					->skip(0)
					->take(5)
					->join('gcp_user','gcp_comment.c_accountid','=','gcp_user.u_accountid')
					->where('c_sid','=',$sid)
					->get();;

		return $comments;
	}

}