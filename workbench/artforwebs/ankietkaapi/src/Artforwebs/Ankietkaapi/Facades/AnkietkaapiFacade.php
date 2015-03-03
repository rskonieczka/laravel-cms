<?php namespace Artforwebs\Ankietkaapi\Facades;

use Illuminate\Support\Facades\Facade;

class AnkietkaapiFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'ankietkaapi'; }

}
