<?php
class MulticraftMiddleware
{
	public $api;
	
	public function __construct()
	{
		global $boot;

		$this->api = new MulticraftAPI(
			$boot['url'],
			$boot['user'],
			$boot['key']
		);
	}
}