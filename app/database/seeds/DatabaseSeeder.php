<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('MainsTableSeeder');
		$this->call('MainsTableSeeder');
		$this->call('AccountsTableSeeder');
		$this->call('StreamsTableSeeder');
		$this->call('CharactersTableSeeder');
		$this->call('ServersTableSeeder');
		$this->call('CmsTableSeeder');
		$this->call('ItemmallsTableSeeder');
		$this->call('DonationsTableSeeder');
	}

}