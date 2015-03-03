<?php

namespace Artforwebs\Ankietkaapi\Api;
/**
 * Klasa do sygnowania/podpisywania requestu 
 * zgodnie ze standardem OAuth
 *
 * @author Piotr Sadowski <p.sadowski@ankietka.pl>
 * @category library
 * @package API
 * @copyright Copyright (c) 2011, iResearch
 * 
 * @see http://oauth.net/
 * @see https://dev.twitter.com/docs/auth/oauth
 * @see https://dev.twitter.com/docs/oauth/xauth
 */
class Signer {
	
	/**
	 * Sekretna wartość dla consumera
	 * nie przekazywana jawnie w requeście
	 * @var string
	 */
	private $_consumerSecret;
	/**
	 * Sekretna wartość dla uzytkownika (identyfikowanego przez token)
	 * nie przekazywana jawnie w requeście
	 * @var string
	 */
	private $_tokenSecret;
	
	/**
	 * Setter parametru $consumerSecret
	 * @param string $consumerSecret 
	 */
	public function setConsumerSecret($consumerSecret) {
		$this->_consumerSecret = $consumerSecret;
	}
	
	/**
	 * Setter parametru $tokenSecret
	 * @param string $tokenSecret 
	 */
	public function serTokenSecret($tokenSecret) {
		is_null($tokenSecret) ? $tokenSecret = '' : '';
		$this->_tokenSecret = $tokenSecret;
	}
	
	/**
	 * Sygnowanie metody sumą kontrolną/sygnaturą.
	 * Do podpisywania metody jest używana klasa Ankietka_Api_Codec
	 * Niezbędne są parametry żądania, nagłówek autoryzacji, metoda żądania POST/GET
	 * oraz sekretna wartość szyfrująca.
	 * 
	 * @param string $method POST|GET
	 * @param string $url
	 * @param array $headers
	 * @param array $params
	 * @return string
	 * @throws Ankietka_Api_Exception jeżeli brakuje wymaganych parametrów
	 */
	public function sign($method, $url, $headers, $params) {
		$required = array('oauth_consumer_key',	'oauth_signature_method', 'oauth_timestamp', 'oauth_nonce');
		if ($this->_tokenSecret != '') {
			$required[] = 'oauth_token';
		}

		foreach ($required as $req) {
			if (!isset($headers[$req])) {
				throw new AnkietkaException('Can\'t sign request, missing parameter "'.$req.'"');
			}
		}

		$base = Helper::signatureBaseString($method, $url, array_merge($params, $headers), Helper::NEW_VERSION);
		$codec = new Codec();
		$signature = $codec->signature($base, $this->_consumerSecret, $this->_tokenSecret);
		return $signature;
	}
	
}
?>