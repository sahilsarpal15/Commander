<?php namespace Sahil\Commander;

use Illuminate\Foundation\Application;

class DefaultCommandBus implements CommandBus{
	
	protected $commandTranslator;
	protected $app;

	public function __construct(Application $app, CommandTranslator $commandTranslator)
	{
		$this->app = $app;
		$this->commandTranslator = $commandTranslator;
	}

	public function execute($command)
	{
		$handler = $this->commandTranslator->toCommandHandler($command);

		return $this->app->make($handler)->handle($command);
	}
}