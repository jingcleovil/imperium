<?php

class Storage extends Eloquent {
	
	protected $table 		= 'storage';
	public $timestamps 		= false;

	public function read($where=array(),$skip=0,$take=10,$orderby=array(),$select=array(),$id=null) 
	{
		$table = DB::table($this->table)
					->skip($skip)
					->take($take)
					->join('gcp_items','gcp_items.id','=','storage.nameid')
					->select('name_japanese','storage.id','expire_time','amount','nameid','type','gcp_items.id')
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

}