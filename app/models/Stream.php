<?php

class Stream extends Eloquent {

	protected $table = "gcp_stream";

	protected $primaryKey = "sid";

	protected $guarded = array();

	public static $rules = array();


	public function read($where=array(),$skip=0,$take=10,$orderby=array(),$select=array()) 
	{
		$table = DB::table($this->table)
					->skip($skip)
					->take($take)
					->join('gcp_user','gcp_user.u_accountid', '=','gcp_stream.s_accountid')
					->where(function($query) use ($where) {
						
						if($where && is_array($where))
						{
							if(count($where) === 3)
							{
								$query->where($where[0],$where[1],$where[2]);
							}
						}
					});

		if($orderby && is_array($orderby))
		{
			$sortname = "";
			$sortby = "";

			foreach($orderby as $key=>$val)
			{
				$sortname = $key;
				$sortby = $val;
			}

			$table->orderBy($sortname,$sortby);
		}

		return $table;
	}

	public function comments()
	{
		return $this->hasOne('comments');
	}
}
