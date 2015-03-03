<?php namespace Artforwebs\Ankietkaapi\Api;
/**
 * Klasa do wysłania odpowiednio sformatowanej odpowiedzi API
 * Klasa zawiera obsługę odpowiedzi w standardzie JSON
 * W przyszłości będzie wspierać również stanard XML.
 * Klasa ma zaimplementowaną obsługę wysyłania odpowiednich nagłówków HTTP
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
class Response {

	/**
	 * echo odpowiedzi w formacie JSON
	 * 
	 * @param array|string $value 
	 */
	public static function json($value) {
		self::ok(false);
		header('Content-type: application/json');
		$response = Zend_Controller_Front::getInstance()->getResponse();
		$response->sendHeaders();
		echo Zend_Json_Encoder::encode($value);
		exit;
	}
	
	/**
	 * echo błędu operacji API
	 * @param type $msg 
	 */
	public static function error($msg) {
		self::badRequest(false);
		echo Zend_Json_Encoder::encode(array('error' => $msg));
		$response = Zend_Controller_Front::getInstance()->getResponse();
		$response->sendHeaders();
		exit;
	}
	
	/**
	 * 200
	 * Zapytanie zostało wykonane poprawnie 
	 */
	public static function ok($exit = true) {
		$response = Zend_Controller_Front::getInstance()->getResponse();
		$response->setHttpResponseCode(200);
		if($exit) exit; else return;
	}
	
	/**
	 * 400
	 * Parametr przyjął nieprawidłową wartość 
	 * lub wartość parametru nie znajduje się w określonym zbiorze. 
	 */
	public static function badRequest($exit = true, $invalidParams = null) {
		$response = Zend_Controller_Front::getInstance()->getResponse();
		$response->setHttpResponseCode(400);
		if(!is_null($invalidParams)) {
			echo Zend_Json_Encoder::encode(array('invalid_parameters' => $invalidParams));
		}
		if($exit) {
			$response->sendHeaders();
			exit; 
		}
	}
	
	/**
	 * 401
	 * Brak autoryzacji lub uprawnień do danego zasobu. 
	 */
	public static function unauthorized($exit = true) {
		$response = Zend_Controller_Front::getInstance()->getResponse();
		$response->setHttpResponseCode(401);
		if($exit) {
			$response->sendHeaders();
			exit; 
		}
	}
	
	/**
	 * 404
	 * Zasób nie został znaleziony lub nie istnieje. 
	 */
	public static function notFound($exit = true) {
		$response = Zend_Controller_Front::getInstance()->getResponse();
		$response->setHttpResponseCode(404);
		if($exit) {
			$response->sendHeaders();
			exit; 
		}
	}
	
	/**
	 * 406
	 * Wymagany parametr nie został przekazany. 
	 */
	public static function missingParameter($exit = true, $missingParameters = null) {
		$response = Zend_Controller_Front::getInstance()->getResponse();
		$response->setHttpResponseCode(406);
		if(!is_null($missingParameters)) {
			echo Zend_Json_Encoder::encode(array('missing_parameters' => $missingParameters));
		}
		if($exit) {
			$response->sendHeaders();
			exit; 
		}
	}
	
	/**
	 * 409
	 * Kod zwracany przy nieudanej próbie zapisu danych (np. dodawanie pytania, dodawanie ankiety).
	 */
	public static function conflict($exit = true, $msg = null) {
		$response = Zend_Controller_Front::getInstance()->getResponse();
		$response->setHttpResponseCode(409);
		if(!is_null($msg)) {
			echo Zend_Json_Encoder::encode(array('conflict_description' => $msg));
		}
		if($exit) {
			$response->sendHeaders();
			exit; 
		}
	}
	
	/**
	 * 402
	 * Ograniczenia wykupionego pakietu uniemożliwiają dostęp do zasobu. 
	 */
	public static function paymentRequired($exit = true) {
		$response = Zend_Controller_Front::getInstance()->getResponse();
		$response->setHttpResponseCode(402);
		if($exit) {
			$response->sendHeaders();
			exit; 
		}
	}
	
	/**
	 * 500
	 * Ograniczenia wykupionego pakietu uniemożliwiają dostęp do zasobu. 
	 */
	public static function internalError($exit = true) {
		$response = Zend_Controller_Front::getInstance()->getResponse();
		$response->setHttpResponseCode(500);
		if($exit) {
			$response->sendHeaders();
			exit; 
		}
	}
	
	/**
	 * Indents a flat JSON string to make it more human-readable.
	 * @param string $json The original JSON string to process.
	 * @return string Indented version of the original JSON string.
	 */
	public static function indent($json) {
		$result      = '';
		$pos         = 0;
		$strLen      = strlen($json);
		$indentStr   = '  ';
		$newLine     = "\n";
		$prevChar    = '';
		$outOfQuotes = true;

		for ($i=0; $i<=$strLen; $i++) {

			// Grab the next character in the string.
			$char = substr($json, $i, 1);

			// Are we inside a quoted string?
			if ($char == '"' && $prevChar != '\\') {
				$outOfQuotes = !$outOfQuotes;

			// If this character is the end of an element, 
			// output a new line and indent the next line.
			} 
			else if(($char == '}' || $char == ']') && $outOfQuotes) {
				$result .= $newLine;
				$pos --;
				for ($j=0; $j<$pos; $j++) {
					$result .= $indentStr;
				}
			}

			// Add the character to the result string.
			$result .= $char;

			// If the last character was the beginning of an element, 
			// output a new line and indent the next line.
			if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
				$result .= $newLine;
				if ($char == '{' || $char == '[') {
					$pos ++;
				}

				for ($j = 0; $j < $pos; $j++) {
					$result .= $indentStr;
				}
			}

			$prevChar = $char;
		}

		return '<pre>'.$result.'</pre>';
	}
}
?>
