<?php namespace Artforwebs\Ankietkaapi;

use Illuminate\Support\ServiceProvider;
use Artforwebs\Ankietkaapi\Api\Client;
use Artforwebs\Ankietkaapi\Api\Codec;
use Artforwebs\Ankietkaapi\Api\Config;
use Artforwebs\Ankietkaapi\Api\Exceptions;
use Artforwebs\Ankietkaapi\Api\Helper;
use Artforwebs\Ankietkaapi\Api\Response;
use Artforwebs\Ankietkaapi\Api\Signer;
use Artforwebs\Ankietkaapi\Api\Verifer;
use GuzzleHttp\Client as GuzzleClient;

class AnkietkaapiServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('artforwebs/ankietkaapi');
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['ankietkaapi'] = $this->app->share(function($app)
        {
            return new Ankietkaapi(
				new GuzzleClient()
			);
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
        return array('ankietkaapi');
	}

}
