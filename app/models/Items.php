<?php

class Items extends Eloquent {

	protected $table = "gcp_items";
	public $timestamps = false;
	protected $guarded = array('id');

	public function read($where=array(),$skip=0,$take=10,$orderby=array(),$select=array()) 
	{
		$table = DB::table($this->table)
					->skip($skip)
					->take($take)
					->where(function($query) use ($where) {
						
						if($where && is_array($where))
						{
							foreach($where as $w)
								$query->where($w[0],$w[1],$w[2]);
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

	public function getItem($nameid)
	{
		$table = DB::table('gcp_items')->where('nameid','=',$nameid)->get();

		return $table;
	}

	
}