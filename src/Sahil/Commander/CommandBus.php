<?php namespace Sahil\Commander;

interface CommandBus {

	public function execute($command);
}