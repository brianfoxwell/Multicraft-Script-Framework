<?php
class RestartServer implements Runnable
{
	protected $multicraft;
	protected $server;
	protected $warningTime;

	public function __construct(MulticraftMiddleware $middleware, array $params = [])
	{
		$this->server = (int) $params['server'];
		$this->warningTime = (int) $params['time'];
		
		$this->multicraft = $middleware->api;
	}

	public function run()
	{
		$this->countDown();

		//$this->multicraft->restartServer($this->server);
	}

	protected function countDown()
	{
		$this->multicraft->sendConsoleCommand($this->server, 'say Server restarting in:');

		sleep(1);

		for ($i = $this->warningTime; $i >= 1; --$i)
		{
		    $this->multicraft->sendConsoleCommand($this->server, 'say '.$this->waterfall($i));
		    sleep(1);
		}

		$this->multicraft->sendConsoleCommand($this->server, 'say Be Right Back!');
	}

	protected function waterfall($int)
	{
		return str_repeat('-', $int)."> $int";
	}
}
