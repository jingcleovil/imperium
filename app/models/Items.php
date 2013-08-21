<?php

class Items extends Eloquent {

	protected $table = "gcp_items";
	public $timestamps = false;
	protected $guarded = array('id');

}