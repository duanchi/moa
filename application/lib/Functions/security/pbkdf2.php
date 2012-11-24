<?php

/**
 * A Function used to strengthen passwords against brute force attack.  This method is approved by the RSA as published in
 * http://www.ietf.org/rfc/rfc2898.txt - Sept 2000
 * @link https://github.com/thesmart/php-PBKDF2
 */


	/**
	 * Generate a random salt with plenty of entropy
	*
	* @static
	* @param int $iterationCount	Optional. The number of times to run the operation (i.e. > 10000 times)
	* @return string
	*/
function pbkdf2_salt($iterationCount = _PBKDF2_SALT_ITERATIONS) {
	if ($iterationCount < 10) $iterationCount = 10;
	$rand = array();
	for ($i = 0; $i < $iterationCount; ++$i) $rand[] = rand(0, 2147483647);
	return strtolower(hash('sha256', implode('', $rand)));
}

	/**
	 * Does the password match a hash?
	 *
	 * @static
	 * @param string $password		Plain-text password to hash using sha256
	 * @param string $hash			The sha256 hash to compare to
	 * @param string $salt			A consistent, secret random salt for the end-user
	 * @param int $iterationCount	Optional. The number of times to run the operation (i.e. > 10000 times)
	 * @return bool		Matches.
	 */
function pbkdf2_match($password, $hash, $salt, $secret = _PBKDF2_POMPOUS_SECRET, $iterationCount = _PBKDF2_HASH_ITERATIONS) {
	$hashExpected = pbkdf2_hash($password, $salt, $secret, $iterationCount);
	return $hashExpected === $hash;
}

	/**
	 * Hash a plain-text password, strengthening it to brute force.
	 *
	 * @static
	 * @param string $password		Plain-text password to hash using sha256
	 * @param string $salt			A consistent, secret random salt for the end-user
	 * @param int $iterationCount	Optional. The number of times to run the operation (i.e. > 10000 times)
	 * @param string $secret		Optional. A secret, known only to the application. This helps to add entropy.
	 * @return string
	 */
function pbkdf2_hash($password, $salt, $secret = _PBKDF2_POMPOUS_SECRET, $iterationCount = _PBKDF2_HASH_ITERATIONS) {
	$hash = $password;
	for ($i = 0; $i < $iterationCount; ++$i) $hash = strtolower(hash('sha256', $secret . $hash . $salt));
	return $hash;
}