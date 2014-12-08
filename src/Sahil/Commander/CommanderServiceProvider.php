<?php namespace Sahil\Commander;

use Illuminate\Support\ServiceProvider;

class CommanderServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerCommandTranslator();

		$this->registerCommandBus();
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('commander');
	}

	private function registerCommandTranslator()
	{
		$this->app->bind('Sahil\Commander\CommandTranslator', 
			'Sahil\Commander\BasicCommandTranslator');
	}

	private function registerCommandBus()
	{
		$this->app->bindShared('Sahil\Commander\CommandBus', function()
		{
			return $this->app->make('Sahil\Commander\ValidationCommandBus');
		});
	}
}
