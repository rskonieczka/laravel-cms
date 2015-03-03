<?php namespace Artforwebs\Ankietkaapi\Api;
/**
 * Klasa do weryfikowania zapytań wykonywanych do API
 * Sprawdza obecnośc nałówków i poprawność sumy kontrolnej
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
class Verifier {
	
	/**
	 * Maksymalne odchylenie pomiędzy 
	 * timestampem klienta a timestampem servera
	 * 
	 */
	const MAX_TIMESTAMP_SKEW = 600;
	
	/**
	 * Przychodzący request
	 * @var Zend_Controller_Request_Http 
	 */
	private $_request;
	/**
	 * Nagłówki requestu
	 * @var array 
	 */
	private $_headers;
	/**
	 * ID consumera API (korzystającej aplikacji)
	 * @var integer 
	 */
	private $_consumerID;
	/**
	 * Klucz consumera/aplikacji
	 * @var integer 
	 */
	private $_consumerKey;
	/**
	 * ID konta w imieniu którego consumer 
	 * wykonuje zapytania do API
	 * @var integer
	 */
	private $_userID;
	
	/**
	 * Konstruktor. 
	 * Parametrem jest request do weryfikacji
	 * 
	 * @param Zend_Controller_Request_Http request
	 */
	public function __construct(Zend_Controller_Request_Http $request){
		$this->_request = $request;
		$this->_parseHeaders();
	}
	
	/**
	 * Getter parametru consumerID
	 * @return integer
	 */
	public function getConsumerId() {
		return $this->_consumerID;
	}
	
	/**
	 * Getter parametru consumerKey
	 * @return integer
	 */
	public function getConsumerKey() {
		return $this->_consumerKey;
	}
	
	/**
	 * Getter ID użytkonika/konta
	 * @return integer
	 */
	public function getUserId() {
		return $this->_userID;
	}
	
	/**
	 * Sprawdzenie czy request jest podpisany wg. standardu OAuth
	 * @return boolean
	 */
	public function requestIsSigned () {
		if ($this->_request->getParam('oauth_signature', false)) {
			$signed = true;
		}
		else {
			$header = $this->_request->getHeader('Authorization');
			if ($header && strpos($header, 'oauth_signature') !== false) {
				$signed = true;
			}
			else {
				$signed = false;
			}
		}
		return $signed;
	}

	/**
	 * Weryfikacja poprawności wysyłanych parametrów
	 * w tym parametru oauth_nonce
	 * i sygantury (sumy kontrolnej) requestu.
	 * 
	 * @param boolean $withToken
	 * @return boolean
	 * @throws Ankietka_Api_Exception
	 */
	public function verifyRequest($withToken = true) {
		$consumerKey = Ankietka_Api_Helper::urldecode($this->_getParam('oauth_consumer_key'));
		$token       = Ankietka_Api_Helper::urldecode($this->_getParam('oauth_token'));
		$timestamp   = $this->_getParam('oauth_timestamp', true);
		$nonce       = $this->_getParam('oauth_nonce', true);
		$secrets     = array();
		
		if ($consumerKey) {
			$secrets = $this->_getSecretsForVerify($consumerKey, $token);
			
			if($withToken && $this->_request->getControllerName() != 'error') {
				$this->_checkServerNonce($consumerKey, $token, $timestamp, $nonce);
			}
			
			$oauthSig = $this->_getParam('oauth_signature');
			if (empty($oauthSig)) {
				throw new Ankietka_Api_Exception('Verification of signature failed (no oauth_signature in request).');
			} 
			
			try {
				$this->verifySignature($secrets['consumer_secret'], $secrets['token_secret'], $withToken);
			}
			catch (Ankietka_Api_Exception $e) {
				throw new Ankietka_Api_Exception('Verification of signature failed. '.$e->getMessage());
			}
		}
		else {
			throw new Ankietka_Api_Exception('Can\'t verify request, missing oauth_consumer_key or oauth_token');
		}
		
		$this->_consumerID = $secrets['consumer_id'];
		$this->_consumerKey = $consumerKey;
		$this->_userID = $secrets['user_id'];
		return true;
	}
	
	/**
	 * Weryfikacja signatury requestu przy uzyciu standardowej fukcji skrótu
	 * 
	 * @param string consumerSecret
	 * @param string tokenSecret
	 * @param boolean withToken
	 * @throws Ankietka_Api_Exception
	 */
	public function verifySignature($consumerSecret, $tokenSecret, $withToken) {
		
		$required = array('oauth_consumer_key',	'oauth_signature_method', 'oauth_timestamp', 'oauth_nonce', 'oauth_signature');

		if ($withToken !== false) {
			$required[] = 'oauth_token';
		}

		foreach ($required as $req) {
			if (!isset($this->_headers[$req])) {
				throw new Ankietka_Api_Exception('Can\'t verify request signature, missing parameter "'.$req.'"');
			}
		}

		$this->_checkVersion();
		
		$method = $this->_request->getMethod();
		$url = $this->_request->getScheme().'://'.$this->_request->getHttpHost().$this->_request->getRequestUri();
		$params = array_merge($this->_request->getPost(), $this->_headers);
		$signature = $this->_getParam('oauth_signature');
		unset($params['oauth_signature']);
		
		try {
			$base = Ankietka_Api_Helper::signatureBaseString($method, $url, $params, Ankietka_Api_Helper::NEW_VERSION);
			$this->verifyDataSignature($base, $consumerSecret, $tokenSecret, $signature);
		}
		catch(Ankietka_Api_Exception $e) {
			$base = Ankietka_Api_Helper::signatureBaseString($method, $url, $params, Ankietka_Api_Helper::OLD_VERSION);
			$this->verifyDataSignature($base, $consumerSecret, $tokenSecret, $signature);
		}
	}

	/**
	 * Metoda pomocnicza do weryfikacji sygnatury
	 * 
	 * @param string $base
	 * @param string $consumerSecret
	 * @param string $tokenSecret
	 * @param string $signature
	 * @return boolean
	 * @throws Ankietka_Api_Exception
	 */
	public function verifyDataSignature($base, $consumerSecret, $tokenSecret, $signature ) {
		is_null($base) ? $base = '' : '';
		$codec = new Codec();
		
		if (!$codec->verify($base, $consumerSecret, $tokenSecret, $signature)) {
			throw new AnkietkaException('Signature verification failed (hmac-sha1)');
		}
		return true;
	}
	
	/**
	 * Getter parametru requestu
	 * W tym parametró POST i GET oraz wartości nagłówków autoryzacji
	 * 
	 * @param string $name
	 * @return string 
	 */
	private function _getParam($name) {
		$param = $this->_request->getParam($name, false);
		if(!$param && isset ($this->_headers[$name])) {
			$param = $this->_headers[$name];
		}
		return $param;
	}
	
	/**
	 * Przetwarzanie nagłówka autoryzacji
	 * w celu uzyskania wszystkich wartości potrzebnych do weryfikacji requestu
	 */
	private function _parseHeaders () {
		$header = $this->_request->getHeader('Authorization');
		if ($header) {
			$auth = trim($header);
			if (strncasecmp($auth, 'OAuth', 4) == 0) {
				$vs = explode(',', substr($auth, 6));
				foreach ($vs as $v) {
					if (strpos($v, '=')) {
						$v = trim($v);
						list($name,$value) = explode('=', $v, 2);
						if (!empty($value) && $value{0} == '"' && substr($value, -1) == '"') {
							$value = substr(substr($value, 1), 0, -1);
						}
						
						if (strcasecmp($name, 'realm') == 0) {
							$this->realm = $value;
						}
						else {
							$this->_headers[$name] = $value;
						}
					}
				}
			}
		}
	}
	
	/**
	 * Wyciągnięcie z bazy danych sekretnych wartości 
	 * dla consumera i opcjonalnie dla tokena
	 * @param string $consumerKey
	 * @param string $token
	 * @return array('consumer_secret', 'consumer_id', 'token_secret', 'user_id')
	 */
	private function _getSecretsForVerify($consumerKey, $token = false) {
		$result = array();
		
		Zend_Loader::loadClass('tConsumer', '../application/api/orm/');
		$tConsumer = new tConsumer();
		$consumer = $tConsumer->fetchRow('consumer_key = "'.$consumerKey.'"');
		if(!$consumer) {
			throw new Ankietka_Api_Exception('Consumer key not found in Database');
		}
		$result['consumer_secret'] = $consumer->consumer_secret;
		$result['consumer_id']     = $consumer->id;
		
		if($token !== false) {
			Zend_Loader::loadClass('tToken', '../application/api/orm/');
			$tToken = new tToken();
			
			$token = $tToken->fetchRow('token = "'.$token.'" AND id_consumer = '.$consumer->id);
			if(!$token) {
				throw new Ankietka_Api_Exception('Token not found in Database for this Consumer');
			}
			$result['token_secret'] = $token->token_secret;
			$result['user_id'] = $token->id_konto;
		}
		else {
			$result['token_secret'] = '';
			$result['user_id'] = false;
		}
		return $result;
	}

	/**
	 * Sprawdzenie wartośći parametru oauth_nonce
	 * która ma na celu wychwycenie duplikacji requestów.
	 * 
	 * @param string $consumerKey
	 * @param string $token
	 * @param string $timestamp
	 * @param string $nonce 
	 * @throws Ankietka_Api_Exception
	 */
	private function _checkServerNonce($consumerKey, $token, $timestamp, $nonce) {
		$db = Zend_Registry::get('db');
		/* @var $db Zend_Db_Adapter_Abstract */
		$select = new Zend_Db_Select($db);
		$select->from(array('n' => 'xauth_nonce'), array(
			'timestamp' => new Zend_Db_Expr('MAX(timestamp)'), 
			'skew'      => new Zend_Db_Expr('MAX(timestamp) > '.$timestamp.' + '.self::MAX_TIMESTAMP_SKEW.'')
		));
		$select->where('consumer_key = "'.$consumerKey.'"');
		$select->where('token = "'.$token.'"');
		$result = $db->fetchRow($select);
		
		if (!empty($result) && $result['skew']) {
			throw new AnkietkaException('Timestamp is out of sequence. Request rejected. Got '.$timestamp.' last max is '.$r['timestamp'].' allowed skew is '.self::MAX_TIMESTAMP_SKEW);
		}
		
		Zend_Loader::loadClass('tNonce', '../application/api/orm/');
		$tNonce = new tNonce();
		$duplicate = $tNonce->fetchRow('consumer_key = "'.$consumerKey.'" AND token = "'.$token.'" AND timestamp = "'.$token.'" AND nonce = "'.$nonce.'"');
		
		if($duplicate) {
			throw new AnkietkaException('Duplicate timestamp/nonce combination, possible replay attack. Request rejected.');
		}
		
		$tNonce->insert(array(
			'consumer_key' => $consumerKey,
			'token' => $token,
			'timestamp' => $timestamp,
			'nonce' => $nonce
		));
		
		// Clean up all timestamps older than the one we just received
		$tNonce->delete('consumer_key = "'.$consumerKey.'" AND token = "'.$token.'" AND timestamp < '.$timestamp.' - '.self::MAX_TIMESTAMP_SKEW.' ');
	}
	
	/**
	 * Sprawdzenie kilku dodatkowych parametrów
	 * Dla zwykłego puryzmu.
	 * 
	 * @throws Ankietka_Api_Exception
	 */
	private function _checkVersion () {
		if (isset($this->_headers['oauth_version'])) {
			$version = Helper::urldecode($this->_headers['oauth_version']);
			if ($version != '1.0') {
				throw new AnkietkaException('Expected OAuth version 1.0, got "'.$this->_headers['oauth_version'].'"');
			}
		}
	}

}
?>