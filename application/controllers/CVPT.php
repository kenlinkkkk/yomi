<?php


class CVPT extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index() {
		$segment2 = $this->uri->segment(2);

		switch ($segment2) {
			case 'login':
				$this->login();
				break;
			case 'suggest':
				$this->suggest();
				break;
			case 'order':
				$this->order_service();
				break;
		}
	}

	public function login() {
//		$url = 'http://10.54.10.7:8081/yomi/v1/api/wap/loginFengshui';
//		$data = 'msisdn=934464916';
//
//		$ch = curl_init();
//
//		curl_setopt($ch, CURLOPT_URL, $url);
//		curl_setopt($ch, CURLOPT_POST, 1);
//		curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
//		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
//		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
//
//		$server_output = curl_exec ($ch);
//
//		curl_close ($ch);
//
//		$result = json_decode($server_output);
//
//		if ($result->resultCode == 1) {
//			$login_url = 'https://amduongnguhanh.vn/api/v1/login';
			$login_url = 'https://103.74.121.176/api/v2/login';
//			$data = array(
//				'phone' => '0'.$result->data->msisdn,
//				'password' =>  $result->data->mpin,
//			);

			$data = array(
				'phone' => '0934464916',
				'password' =>  '117916',
			);

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $login_url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'client-id: '. CVPT_CLIENT_ID, 'client-secret: '.CVPT_CLIENT_SECRET));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);

			$login_resp = json_decode(curl_exec($ch));
			curl_close($ch);

			var_dump($login_resp);
			die();
//		}
	}

	public function suggest()
	{
		date_default_timezone_set('UTC');
		$date = date('c');
		$request_line = 'POST /api/v1/vano/suggest HTTP/1.1';
		echo $date;
	}

	public function order_service()
	{
		date_default_timezone_set('UTC');
		$date = date('c');
		$request_line = 'POST /api/v1/vano/order-service HTTP/1.1';
		$digest = base64_encode('0967009571');
		$sign_text = 'date:'. $date . ' digest: '. $digest .' request_line:'.$request_line;
		$hmac = hash_hmac('sha256', $sign_text, CVPT_CLIENT_SECRET);
		$auth_signature = 'Signature keyId="'. CVPT_CLIENT_ID .'",algorithm="hmac-sha256",header="date digest request-line",signature="'. $hmac .'"';
		echo $auth_signature;
	}
}
