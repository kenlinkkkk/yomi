<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 08/26/2019
 * Time: 10:53 AM
 */
/**
 * @param $key
 * @param $data
 * @return bool|string
 */
function aes128Encrypt($key, $data) {
	return base64_encode(openssl_encrypt($data, 'aes-128-ecb', $key, OPENSSL_RAW_DATA));
}

/**
 * @param $key
 * @param $data
 * @return bool|string
 */
function aes128Decrypt($key, $data) {
	return openssl_decrypt(base64_decode($data), 'aes-128-ecb', $key, OPENSSL_RAW_DATA);
}

/**
 * @param $str
 * @param $mode
 * @return bool|string
 */
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

/**
* @param $phone
* @param $pass
 * @return mixed|string
*/
function loginAPI($phone, $pass) {
	$url = 'http://10.54.10.7:8081/yomi/v1/ping/checkLogin';

	$data = 'msisdn='. $phone .'&mpin='. $pass;

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$resp = curl_exec($ch);

	curl_close($ch);

	$data = json_decode($resp);

	return $data;
}

/**
 * @param $msisdn
 * @return array
 */
function checkPackageStatusAPI($msisdn) {
	$url = 'http://10.54.10.7:8081/yomi/v1/ping/checkPackageStatus';
	$data = 'msisdn='.$msisdn;

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec ($ch);

	curl_close ($ch);

	$data = json_decode($server_output);
	$array = array();
	if ($data->resultCode == 1) {
		$data1 = $data->data;

		foreach ($data1 as $item => $value) {
			if (intval($value->packageId) == 1 && intval($value->status) == 1) {
				$array["KP"] = 1;
			} elseif (intval($value->packageId) == 2 && intval($value->status) == 1){
				$array["KP7"] = 1;
			} elseif (intval($value->packageId) == 5 && intval($value->status) == 1) {
				$array["PT"] = 1;
			} elseif (intval($value->packageId) == 7 && intval($value->status) == 1) {
				$array["PT7"] = 1;
			} elseif (intval($value->packageId) == 11 && intval($value->status) == 1) {
				$array["QT"] = 1;
			} elseif (intval($value->packageId) == 12 && intval($value->status) == 1) {
				$array["CV"] = 1;
			}
		}
	}

	return $array;
}

function str_name($str) {
	return mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
}
?>
