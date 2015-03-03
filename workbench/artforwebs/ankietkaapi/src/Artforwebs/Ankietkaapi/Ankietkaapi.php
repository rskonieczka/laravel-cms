<?php namespace Artforwebs\Ankietkaapi;

use Artforwebs\Ankietkaapi\Api\Client;
use Artforwebs\Ankietkaapi\Api\Codec;
use Artforwebs\Ankietkaapi\Api\Config;
use Artforwebs\Ankietkaapi\Api\Exceptions;
use Artforwebs\Ankietkaapi\Api\Helper;
use Artforwebs\Ankietkaapi\Api\Response;
use Artforwebs\Ankietkaapi\Api\Signer;
use Artforwebs\Ankietkaapi\Api\Verifer;


class Ankietkaapi{

	public function getResponse(){
		return new Response();
	}

	public function getClient($consumerKey, $consumerSecret, $token = null, $tokenSecret = null){
		return new Client($consumerKey, $consumerSecret, $token, $tokenSecret);
	}
}