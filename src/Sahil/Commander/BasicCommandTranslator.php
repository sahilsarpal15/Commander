<?php namespace Sahil\Commander;

use Exception;

class BasicCommandTranslator implements CommandTranslator {

	public function toCommandHandler($command) 
	{
		$handler = str_replace('Command', 'CommandHandler', get_class($command)); //to a specific handler

		if( ! class_exists($handler))
		{
			$message = "Command Handler [$handler] doesnot exist";

			throw new Exception($message);
		}
		return $handler;
	}

	public function toValidator($command)
	{
		return str_replace('Command', 'Validator', get_class($command));
	}
}