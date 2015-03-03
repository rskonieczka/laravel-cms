<?php namespace Artforwebs\Ankietkaapi\Api;
/**
 * Klasa 'pomagiera'
 * Zawiera zestaw statycznych funckji używanych w klasach pakietu API
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
class Helper {
	
	const OLD_VERSION = 0;
	const NEW_VERSION = 1;
	
	/**
	 * Konwersja parametró requestu do stringa, 
	 * który ma zostać sygnowany/podpisany
	 * 
	 * @param string $method POST|GET
	 * @param string $url
	 * @param array $params
	 * @return string
	 */
	public static function signatureBaseString($method, $url, $params, $version = 1) {
		$sig = array();
		$sig[] = $method;
		$sig[] = $url;
		$sig[] = self::normalizeParams($params, $version);
		
		foreach($sig as $key => $value) {
			$sig[$key] = self::urlencode($value);
		}
		return implode('&', $sig);
	}
	
	/**
	 * Statyczna metoda do sortowania parametrów w porządku leksykograficznym
	 * Tak jak wymaga tego standard OAuth.
	 * @param array $params
	 * @return string 
	 */
	public static function normalizeParams($params, $version = 0) {
		/*
		// sort by name, then by value 
		// (needed when we start allowing multiple values with the same name)
		$keys   = array_keys($this->param);
		$values = array_values($this->param);
		array_multisort($keys, SORT_ASC, $values, SORT_ASC);
        */
		$normalized = array();

		ksort($params);
		
		foreach ($params as $key => $value) {
		    // all names and values are already urlencoded, exclude the oauth signature
		    if ($key != 'oauth_signature') {
				if (is_array($value)) {
					$value_sort = $value;
					sort($value_sort);
					
					if($version == self::NEW_VERSION) {
						$normalized[] = urldecode(http_build_query(array($key => $value_sort)));
					}
					elseif($version == self::OLD_VERSION) {
						foreach ($value_sort as $v) {
							$normalized[] = $key.'='.$v;
						}
					}
				}
				else {
					$normalized[] = $key.'='.$value;
				}
			}
		}
		return implode('&', $normalized);
	}
	
	/**
	 * Enkodowanie stringów zgodnie ze standardem RFC3986
	 * 
	 * @param string s
	 * @return string
	 */
	public static function urlencode($s){
		if ($s === false) {
			return $s;
		}
		else {
			return str_replace('%7E', '~', rawurlencode($s));
		}
	}
	
	/**
	 * Dekodowanie stringa zgodnie ze standardem RFC3986.
	 * Metoda poprawnie dekoduje również string zakodowane wg. standardu RFC1738.
	 * 
	 * @param string s
	 * @return string
	 */
	public static function urldecode($s) {
		if ($s === false) {
			return $s;
		}
		else {
			return rawurldecode($s);
		}
	}
	
}
?>