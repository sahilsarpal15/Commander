<?php namespace Sahil\Commander;

interface CommandTranslator {

	public function toCommandHandler($command);

	public function toValidator($command);

}