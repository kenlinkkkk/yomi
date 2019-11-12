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
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);

	$server_output = curl_exec ($ch);

	curl_close ($ch);

	$data = json_decode($server_output);
	$array = array();
	if ($data->resultCode == 1) {
		$data1 = $data->data;
		$array['status'] = 1;
		foreach ($data1 as $item => $value) {
			if (intval($value->packageId) == 1 && intval($value->status) == 1) {
				$array["KP"] = 'ACTIVE';
			} elseif (intval($value->packageId) == 2 && intval($value->status) == 1){
				$array["KP7"] = 'ACTIVE';
			} elseif (intval($value->packageId) == 5 && intval($value->status) == 1) {
				$array["PT"] = 'ACTIVE';
			} elseif (intval($value->packageId) == 7 && intval($value->status) == 1) {
				$array["PT7"] = 'ACTIVE';
			} elseif (intval($value->packageId) == 11 && intval($value->status) == 1) {
				$array["QT"] = 'ACTIVE';
			} elseif (intval($value->packageId) == 12 && intval($value->status) == 1) {
				$array["CV"] = 'ACTIVE';
			}
		}
	} else {
		$array['status'] = 0;
	}

	return $array;
}

function sachkhampha($url, $param) {
	$ch = curl_init();
	$post = http_build_query($param);

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 300);


	$server_output = curl_exec($ch);

	curl_close($ch);

	return json_decode($server_output);
}

function str_name($str) {
	return mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
}

function check_mac($str) {
	return md5($str.md5('dinhmenh2015'));
}

function convertText($str) {
	$unicode = array(
		'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
		'd'=>'đ',
		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		'i'=>'í|ì|ỉ|ĩ|ị',
		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		'D'=>'Đ',
		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
	);

	foreach($unicode as $nonUnicode=>$uni){
		$str = preg_replace("/($uni)/i", $nonUnicode, $str);
	}

	$str = str_replace(" ", "-", $str);
	return strtolower($str);
}
?>
