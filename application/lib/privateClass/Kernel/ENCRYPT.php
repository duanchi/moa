<?php

namespace privateClass\Kernel;

class ENCRYPT {
	public static function make($plain_text, $salt = null, $secret = null, $encrypt_type = _ENCRYPT_MD5) {
		$result = array();
		switch($encrypt_type) {
			case _ENCRYPT_SHA1:
				$result['hash'] = sha1($plain_text);
				break;
				
			case _ENCRYPT_RSA:
				
				break;
			
			case _ENCRYPT_RANDOM:
				
				break;
				
			case _ENCRYPT_PBKDF2:
				$result['salt'] = $salt == null ? pbkdf2_salt() : $salt;
				$result['hash'] = $secret == null ? pbkdf2_hash($plain_text,$result['salt']) : pbkdf2_hash($plain_text,$result['salt'],$secret);
				break;
				
			case _ENCRYPT_MD5:
			default:
				$result['hash'] = md5($plain_text);
				break;
		}
		return $result;
	}
	
	public static function match($plain_text, $hash, $salt, $secret = null, $encrypt_type = _ENCRYPT_MD5) {
		$result = FALSE;
		switch($encrypt_type) {
			case _ENCRYPT_SHA1:
				$result = sha1($plain_text) === $hash;
				break;
		
			case _ENCRYPT_RSA:
		
				break;
					
			case _ENCRYPT_RANDOM:
		
				break;
		
			case _ENCRYPT_PBKDF2:
				$result = ($secret == null) ? pbkdf2_match($plain_text,$hash,$salt) : pbkdf2_match($plain_text,$hash,$salt,$secret);
				break;
		
			case _ENCRYPT_MD5:
			default:
				$result = md5($plain_text) === $hash;
				break;
		}
		return $result;
	}
}

?>