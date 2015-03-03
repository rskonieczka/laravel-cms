<?php namespace Artforwebs\Ankietkaapi\Api;

use Zend_Http_Client;

class Client {

	const API_LOCATION = 'https://www.ankietka.pl/api/';
	//const API_LOCATION = 'http://beta.ankietka.pl/api/';
	/**
	 * Adres pod którym dostępne jest API
	 * W dokumententacji ten adres nazywany jest jako BASE_URL - URL bazowy
	 */
	//const API_LOCATION = 'http://ankietka.local/api/';
	/**
	 * Wartość klucza consumera/aplikacji API
	 * @var string
	 */
	private $_consumerKey = null;
	/**
	 * Tajna wartość consumera/aplikacji API
	 * @var string
	 */
	private $_consumerSecret = null;
	/**
	 * Wartość tokena użytkownika
	 * @var string
	 */
	private $_token = null;
	/**
	 * Tajna wartość dla tokena
	 * @var string
	 */
	private $_tokenSecret = null;
	/**
	 * Adres operacji API bez URL-a bazowego
	 * np. /survey
	 * @var string
	 */
	private $_uri = null;
	/**
	 * Paramtery wywołania operacji API
	 * @var array
	 */
	private $_params = array();
	/**
	 * Nagłówki HTTP wysyłane do API
	 * @var array
	 */
	private $_headers = array();

	/**
	 * Konstruktor
	 *
	 * @param string $consumerKey
	 * @param string $consumerSecret
	 * @param string $token
	 * @param string $tokenSecret
	 */
	public function __construct($consumerKey, $consumerSecret, $token = null, $tokenSecret = null) {
		$this->_params['x_auth_mode'] = 'client_auth';

		$this->_consumerKey = $consumerKey;
		$this->_consumerSecret = $consumerSecret;
		$this->_token = $token;
		$this->_tokenSecret = $tokenSecret;

		$this->_prepareHeaders();
	}

	/**
	 * Setter adresu operacji API
	 * @param string $uri
	 */
	public function setUri($uri) {
		$this->_uri = $uri;
	}

	/**
	 * Setter parametrów wywołania
	 * @param array $params
	 */
	public function setParams($params) {
		if(!is_array($params)) {
			throw new AnkietkaException('Params should be passed as an array');
		}
		/**
		 * @todo urlencode w razie potrzeby
		 */
		$this->_params = $params;
	}

	/**
	 * Wykonanie zapytania do API
	 * Adres URL, parametry i metoda muszą być ustawione za pomocą setterów
	 * @return string
	 */
	public function request() {
		$url = $this->_getUrl();
		$client = new Zend_Http_Client($this->_getUrl());
		$method = 'GET';

		if(is_array($this->_params) && count($this->_params) > 0) {
			$method = 'POST';
		}
		foreach($this->_params as $name => $value) {
			$client->setParameterPost($name, $value);
		}

		$signer = new Signer();
		$signer->setConsumerSecret($this->_consumerSecret);
		$signer->serTokenSecret($this->_tokenSecret);
		$ouauthSignature = $signer->sign(
			$method,
			$this->_getUrl(),
			$this->_headers,
			$this->_params
		);
		$this->_headers['oauth_signature'] = $ouauthSignature;
		$client->setHeaders('Authorization', $this->_getAuthorizationHeader());
		$response = $client->request($method);
		if(!$response->isSuccessful()) {
			$code = $response->getStatus();
			echo $code. ': '.$response->responseCodeAsText($code);
			dd($response->getBody());
		}
		return $response->getBody();
	}

	/**
	 * Getter pełnego adresu operacji API
	 * @return string
	 * @throws Ankietka_Api_Exception jeżeli URI nie był ustawiony
	 */
	private function _getUrl() {
		if(is_null($this->_uri)) {
			throw new AnkietkaException('API Operation\'s URI has not been set');
		}
		return self::API_LOCATION.trim($this->_uri, '/');
	}

	/**
	 * Przygotowanie parametrów nagłówka autoryzacji
	 * zgodnie ze standardem OAuth
	 * @throws Ankietka_Api_Exception jeżeli brakuje obowiązkowych pól
	 */
	private function _prepareHeaders() {
		$this->_headers['oauth_version'] = "1.0";
		$this->_headers['oauth_signature_method'] = "HMAC-SHA1";
		if(is_null($this->_consumerKey)) {
			throw new AnkietkaException('Consumer Key Has bo be set');
		}
		$this->_headers['oauth_consumer_key'] = $this->_consumerKey;

		!is_null($this->_token) ? $this->_headers['oauth_token'] = $this->_token : '';

		$this->_headers['oauth_timestamp'] = time();
		$this->_headers['oauth_nonce'] = $this->_generateNonce();

		//to insert after signing
		$this->_headers['oauth_signature'] = '';//
	}

	/**
	 * Zbudowanie nagłówka autoryzacji 'Authorization'
	 * Sklejenie wszystkich parametró oauth_ i xoauth_
	 * @return string
	 */
	private function _getAuthorizationHeader () {
		$result   = array();
		$result[] = 'OAuth realm=""';
		foreach ($this->_headers as $name => $value) {
			if (strncmp($name, 'oauth_', 6) == 0 || strncmp($name, 'xoauth_', 7) == 0) {
				$result[] = $name.'="'.$value.'"';
			}
		}
		return implode(', ', $result);
	}

	/**
	 * Wygenrerowanie parametru oauth_nonce
	 * służącego do detekcji zduplikowany requestów
	 * @return string
	 */
	private function _generateNonce() {
		$key = md5(uniqid(rand(), true));
		list($usec,$sec) = explode(' ',microtime());
		$key .= dechex($usec).dechex($sec);
		return $key;
	}

}