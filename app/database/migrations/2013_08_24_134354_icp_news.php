<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class IcpNews extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('icp_news', function(Blueprint $table) {
			$table->increments('id');
			$table->string('n_title',64);
			$table->text('n_content');
			$table->string('n_vanity',100);
			$table->integer('n_author');
			$table->integer('n_cat_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('icp_news');
	}

}
