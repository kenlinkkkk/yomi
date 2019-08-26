<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 08/26/2019
 * Time: 10:53 AM
 */

function aes128Encrypt($key, $data) {
	if(16 !== strlen($key)) $key = hash('MD5', $key, true);
	$padding = 16 - (strlen($data) % 16);
	$data .= str_repeat(chr($padding), $padding);
	return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_ECB, str_repeat("\0", 16)));
}
function aes128Decrypt($key, $data) {
	$data = base64_decode($data);
	if(16 !== strlen($key)) $key = hash('MD5', $key, true);
	$data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_ECB, str_repeat("\0", 16));
	$padding = ord($data[strlen($data) - 1]);
	return substr($data, 0, -$padding);
}

function rewitePhoneNumb($str, $mode) {
	$text = substr($str, 2, strlen($str) - 2);
	if ($mode == 1) {
		$result = substr($text, 0, 5);
		$result = '0' . $result;
		$result .= 'xxxx';
	} elseif ($mode == 2) {
		$result = '0' . $text;
	}

	return $result;
}
?>
