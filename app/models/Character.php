<?php

class Character extends Eloquent {

	protected $primaryKey 	= 'char_id';
	protected $table 		= 'char';
	public $timestamps 		= false;

	public function read($where=array(),$skip=0,$take=10,$orderby=array()) 
	{
		$table = DB::table($this->table)
					->skip($skip)
					->take($take)
					->join('login','login.account_id','=','char.account_id')
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

	public function stats()
	{
		$table = DB::table('char')
					->select(DB::raw('count(*) as total_class, class'))
					->where('class','>',1)
					->having('total_class','>',100)
					->orderBy('total_class','desc')
					->groupBy('class')
					->get();

		return $table;
	}

	public function inventory($where=array(),$skip=0,$take=10,$orderby=array(),$select=array()) 
	{
		$table = DB::table('inventory')
					->skip($skip)
					->take($take)
					->join('gcp_items','gcp_items.id', '=','inventory.nameid')
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

	public function equip() 
	{
		return $this->hasOne('Inventory','char_id');
	}
}