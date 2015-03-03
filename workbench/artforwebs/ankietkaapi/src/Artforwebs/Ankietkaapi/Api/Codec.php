<?php
namespace Artforwebs\Ankietkaapi\Api;
/**
 * Klasa do generowania sumy kontrolnej/sygnatury stringa
 * sekretną wartością $consumerSecret $tokenSecret
 * za pomocą fuckji skrótu HMAC-SHA1
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
class Codec {
	
	/**
	 * Obliczanie sumy kontrolnej/sygnatury
	 * 
	 * @param type $baseString
	 * @param type $consumerSecret
	 * @param type $tokenSecret
	 * @return string 
	 */
	public function signature($baseString, $consumerSecret, $tokenSecret = '') {
		$key  = Helper::urlencode($consumerSecret).'&';
		$key .= Helper::urlencode($tokenSecret);

		if (function_exists('hash_hmac')) {
			$signature = base64_encode(hash_hmac("sha1", $baseString, $key, true));
		}
		else {
		    $blocksize	= 64;
		    $hashfunc	= 'sha1';
		    if (strlen($key) > $blocksize) {
		        $key = pack('H*', $hashfunc($key));
		    }
		    $key	= str_pad($key,$blocksize,chr(0x00));
		    $ipad	= str_repeat(chr(0x36),$blocksize);
		    $opad	= str_repeat(chr(0x5c),$blocksize);
		    $hmac 	= pack(
				'H*',$hashfunc(
					($key^$opad).pack(
						'H*',$hashfunc(
							($key^$ipad).$baseString
						)
					)
				)
			);
			$signature = base64_encode($hmac);
		}
		return Helper::urlencode($signature);
	}

	/**
	 * Sprawdzenie czy sygnatura w requestu jest poprawną sygnaturą parametró żądania.
	 * czyli sprawdzeni, czy ktoś po drodze nie zmienił wartości któregoś z parametrów żądania.
	 * 
	 * @param string baseString
	 * @param string consumerSecret
	 * @param string tokenSecret
	 * @param string signature
	 * @return string
	 */
	public function verify($baseString, $consumerSecret, $tokenSecret, $signature) {
		$a = Helper::urldecode($signature);
		$b = Helper::urldecode($this->signature($baseString, $consumerSecret, $tokenSecret));

		// We have to compare the decoded values
		$valA  = base64_decode($a);
		$valB  = base64_decode($b);
		// Crude binary comparison
		return rawurlencode($valA) == rawurlencode($valB);
	}
	
}