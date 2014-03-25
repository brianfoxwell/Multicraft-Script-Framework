<?php

class Fire
{
	protected $classname;
	protected $params = [];

	/**
	 * Example Argument -- RestartServer:server=1,time=7
	 */
	public function __construct($arguments)
	{
		array_shift($arguments); // Remove first space.
		$this->setup($arguments);
	}

	protected function setup($arguments)
	{
		$arguments = explode(':', $arguments[0]);

		$classname = trim(array_shift($arguments)); // Get key and remove from array

		$params = [];
		foreach(explode(",", $arguments[0]) as $arg)
		{
			$explodedParams = [];
			$explodedParams = explode('=', $arg);

			$params[trim($explodedParams[0])] = trim($explodedParams[1]);
		}
		
		$this->params = $params;
		$this->classname = $classname;
	}

	public function run()
	{
		$class = new $this->classname(new MulticraftMiddleware, $this->params);
		$class->run();
	}
}