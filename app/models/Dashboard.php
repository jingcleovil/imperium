<?php

class Dashboard extends Eloquent {

	public function totalAccounts()
	{
		$total = DB::table('login')->where('account_id','>',1)->count();

		return $total;
	}

	public function totalCharacters()
	{
		$total = DB::table('char')->where('account_id','>',1)->count();

		return $total;
	}

	public function totalGuilds()
	{
		$total = DB::table('guild')->count();

		return $total;
	}

	public function totalZeny()
	{
		$total = DB::table('char')->sum('zeny');

		return $total;
	}
}