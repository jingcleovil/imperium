<?php

class Accounts extends Eloquent {

	protected $primaryKey 	= 'account_id';
	protected $table 		= 'login';
	public $timestamps 		= false;

	public function read($where=array(),$skip=0,$take=10,$orderby=array(),$select=array()) 
	{
		$table = DB::table($this->table)
					->skip($skip)
					->take($take)
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
}