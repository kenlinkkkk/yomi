<?php


class CVPT extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->login();
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
			case 'service':
				$this->service();
				break;
			case 'mau-may-man':
				$this->luckyColor();
				break;
			case 'nhan-sinh':
				$this->nhanSinh();
				break;
			case 'tuoi-xong-dat':
				$this->tuoiXongDat();
				break;
			case 'xuat-hanh':
				$this->xuathanh();
				break;
			case 'kieng-ki':
				$this->kiengki();
				break;
			case 'check-profile':
				$this->checkProfile();
				break;
			case 'update-profile':
				$this->showUpdateForm();
				break;
			case 'post-update':
				$this->updateProfile();
				break;
			default :
				$this->list_all();
				break;
		}
	}

	public function login() {
		$url = 'http://10.54.10.7:8081/yomi/v1/api/wap/loginFengshui';
		$data = 'msisdn='. substr($this->session->msisdn, -9);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$server_output = curl_exec ($ch);

		curl_close ($ch);

		$result = json_decode($server_output);

		if ($result->resultCode == 1) {
//			$login_url = 'https://amduongnguhanh.vn/api/v1/login';
			$login_url = 'http://103.74.121.176/api/v1/login';
			$data = array(
				'phone' => '0'.$result->data->msisdn,
				'password' =>  $result->data->mpin,
			);

//			$data = array(
//				'phone' => '0902178830',
//				'password' =>  '835111',
//			);

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $login_url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'client-id: '. CVPT_CLIENT_ID, 'client-secret: '.CVPT_CLIENT_SECRET));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);

			$login_resp = json_decode(curl_exec($ch));
			curl_close($ch);

			$array = array(
				'token_auth' => $login_resp->data->token
			);

			$this->session->set_userdata($array);
		}
	}

	public function suggest()
	{
		$url = 'http://103.74.121.176/api/v1/vano/suggest';
//		$url = 'https://amduongnguhanh.vn/api/v1/vano/suggest';

		$response = '';
		if ($this->input->get('d')) {
			$data = array(
				'today' => date('Y-m-d'),
				'birth_day' => date_format($this->input->get('d'), 'Y-m-d'),
			);

			date_default_timezone_set('UTC');
			$date = date('Y-m-d').'T'.date('h:m:s.B').'Z';

			$request_line = 'POST /api/v1/vano/suggest HTTP/1.1';

			$digest = base64_encode(json_encode($data));

			$sign_text = 'date:'. $date . ' digest:'. $digest .' request-line:'.$request_line;

			$hmac = base64_encode(hash_hmac('sha256', $sign_text, CVPT_CLIENT_SECRET, true));

			$auth_signature = 'Signature keyId="'. CVPT_CLIENT_ID.'",algorithm="hmac-sha256",headers="date digest request-line",signature="'. $hmac .'"';

			$ch = curl_init();

			$headers = array(
				'Content-Type: application/json',
				'client-id: '. CVPT_CLIENT_ID,
				'date: '. $date,
				'digest: '. $digest,
				'request-line: POST /api/v1/vano/suggest HTTP/1.1',
				'token: '. $auth_signature,
				'Authorization: Bearer '. $this->session->token_auth,
			);

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);

			$response = json_decode(curl_exec($ch));
			curl_close($ch);
		}

		$main = array(
			'title' => 'Ngày hôm nay của bạn như nào?',
			'view' => $this->load->view('CVPT/suggest', $response, TRUE),
		);
		$data1 = array(
			'main' => $main,
			'promotion' => $this->load->view('front_promotion', '', TRUE),
			'footer' => $this->load->view('front_footer', '', TRUE),
		);

		return $this->load->view('front_layout', $data1, FALSE);;
	}

	public function order_service()
	{
		$url = 'http://103.74.121.176/api/v1/vano/order-service';

		$data = array(
			'product_code' => 'PT-DV-2',
			'target' => '2',
			'attrs' => array(
				array(
					'code' => 'nam_sinh_cua_ban',
					'value' => '09/01/1993'
				),
				array(
					'code' => 'ngay_thang_nam_can_xem',
					'value' => '11/10/1993'
				),
			),
		);

		date_default_timezone_set('UTC');
		$date = date('c');

		$request_line = 'POST /api/v1/vano/order-service HTTP/1.1';

		$digest = base64_encode(json_encode($data));

		$sign_text = 'date:'. $date . ' digest:'. $digest .' request-line:'.$request_line;

		$hmac = hash_hmac('sha256', $sign_text, CVPT_CLIENT_SECRET);

		$auth_signature = 'Signature keyId="'. CVPT_CLIENT_ID.'",algorithm="hmac-sha256",headers="date digest request-line",signature="'. $hmac .'"';

		$ch = curl_init();

		$headers = array(
			'Content-Type: application/json',
			'client-id: '. CVPT_CLIENT_ID,
			'date: '. $date,
			'digest:' .$digest,
			'request-line: ' . $request_line,
			'token: ' .$auth_signature,
			'Authorization: Bearer '. $this->session->token_auth,
		);

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$response = json_decode(curl_exec($ch));
		var_dump(curl_getinfo($ch, CURLOPT_HTTPHEADER));
		echo '<br>';
		curl_close($ch);
		var_dump($response);
		die();
	}

	public function services()
	{
		$url = 'http://103.74.121.176/api/v1/vano/services';
//		$url = 'https://amduongnguhanh.vn/api/v1/vano/services';

		$data = array(
			'mon' => 11
		);

		date_default_timezone_set('UTC');
		$date = date('Y-m-d').'T'.date('h:m:s.B').'Z';

		$request_line = 'GET /api/v1/vano/services HTTP/1.1';

		$digest = base64_encode(json_encode($data));

		$sign_text = 'date:'. $date . ' digest:'. $digest .' request-line:'.$request_line;

		$hmac = base64_encode(hash_hmac('sha256', $sign_text, CVPT_CLIENT_SECRET, true));

		$auth_signature = 'Signature keyId="'. CVPT_CLIENT_ID.'",algorithm="hmac-sha256",headers="date digest request-line",signature="'. $hmac .'"';

		$ch = curl_init();

		$headers = array(
			'Content-Type: application/json',
			'client-id: '. CVPT_CLIENT_ID,
			'date: '. $date,
			'digest: '. $digest,
			'request-line: '. $request_line,
			'token: '. $auth_signature,
			'Authorization: Bearer '. $this->session->token_auth,
		);

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$response = json_decode(curl_exec($ch));
		curl_close($ch);

		$main = array(
			'title' => 'Cố vấn phong thủy',
			'view' => $this->load->view('CVPT/index', $response, TRUE),
		);

		$data1 = array(
			'main' => $main,
			'promotion' => $this->load->view('front_promotion', '', TRUE),
			'footer' => $this->load->view('front_footer', '', TRUE),
		);

		return $this->load->view('front_layout', $data1, FALSE);
	}

	public function service()
	{
		$segment3 = $this->uri->segment(3);
		$url = 'http://103.74.121.176/api/v1/vano/service/'. $segment3;
//		$url = 'https://amduongnguhanh.vn/api/v1/vano/service/'. $segment3;

		$data = array(
			'mon' => 11
		);

		date_default_timezone_set('UTC');
		$date = date('Y-m-d').'T'.date('h:m:s.B').'Z';

		$request_line = 'GET /api/v1/vano/services HTTP/1.1';

		$digest = base64_encode(json_encode($data));

		$sign_text = 'date:'. $date . ' digest:'. $digest .' request-line:'.$request_line;

		$hmac = base64_encode(hash_hmac('sha256', $sign_text, CVPT_CLIENT_SECRET, true));

		$auth_signature = 'Signature keyId="'. CVPT_CLIENT_ID.'",algorithm="hmac-sha256",headers="date digest request-line",signature="'. $hmac .'"';

		$ch = curl_init();

		$headers = array(
			'Content-Type: application/json',
			'client-id: '. CVPT_CLIENT_ID,
			'date: '. $date,
			'digest: '. $digest,
			'request-line: '. $request_line,
			'token: '. $auth_signature,
			'Authorization: Bearer '. $this->session->token_auth,
		);

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$response = json_decode(curl_exec($ch));
		curl_close($ch);
	}

	public function luckyColor()
	{
		$url = 'http://103.74.121.176/api/v1/vano/color';
//		$url = 'https://amduongnguhanh.vn/api/v1/vano/color';

		$data = array(
			'mon' => 11
		);

		date_default_timezone_set('UTC');
		$date = date('Y-m-d').'T'.date('h:m:s.B').'Z';

		$request_line = 'GET /api/v1/vano/services HTTP/1.1';

		$digest = base64_encode(json_encode($data));

		$sign_text = 'date:'. $date . ' digest:'. $digest .' request-line:'.$request_line;

		$hmac = base64_encode(hash_hmac('sha256', $sign_text, CVPT_CLIENT_SECRET, true));

		$auth_signature = 'Signature keyId="'. CVPT_CLIENT_ID.'",algorithm="hmac-sha256",headers="date digest request-line",signature="'. $hmac .'"';

		$ch = curl_init();

		$headers = array(
			'Content-Type: application/json',
			'client-id: '. CVPT_CLIENT_ID,
			'date: '. $date,
			'digest: '. $digest,
			'request-line: '. $request_line,
			'token: '. $auth_signature,
			'Authorization: Bearer '. $this->session->token_auth,
		);

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$response = json_decode(curl_exec($ch));
		curl_close($ch);

		$main = array(
			'title' => 'Nhân sinh',
			'view' => $this->load->view('CVPT/service_luckycolor', $response, TRUE),
		);

		$data1 = array(
			'main' => $main,
			'promotion' => $this->load->view('front_promotion', '', TRUE),
			'footer' => $this->load->view('front_footer', '', TRUE),
		);

		return $this->load->view('front_layout', $data1, FALSE);
	}

	public function nhanSinh()
	{
		$url = 'http://103.74.121.176/api/v1/vano/nhan_sinh';
//		$url = 'https://amduongnguhanh.vn/api/v1/vano/nhan_sinh';

		$data = array(
			'mon' => 11
		);

		date_default_timezone_set('UTC');
		$date = date('Y-m-d').'T'.date('h:m:s.B').'Z';

		$request_line = 'GET /api/v1/vano/services HTTP/1.1';

		$digest = base64_encode(json_encode($data));

		$sign_text = 'date:'. $date . ' digest:'. $digest .' request-line:'.$request_line;

		$hmac = base64_encode(hash_hmac('sha256', $sign_text, CVPT_CLIENT_SECRET, true));

		$auth_signature = 'Signature keyId="'. CVPT_CLIENT_ID.'",algorithm="hmac-sha256",headers="date digest request-line",signature="'. $hmac .'"';

		$ch = curl_init();

		$headers = array(
			'Content-Type: application/json',
			'client-id: '. CVPT_CLIENT_ID,
			'date: '. $date,
			'digest: '. $digest,
			'request-line: '. $request_line,
			'token: '. $auth_signature,
			'Authorization: Bearer '. $this->session->token_auth,
		);

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$response = json_decode(curl_exec($ch));
		curl_close($ch);

		$main = array(
			'title' => 'Màu may mắn',
			'view' => $this->load->view('CVPT/service_nhansinh', $response, TRUE),
		);

		$data1 = array(
			'main' => $main,
			'promotion' => $this->load->view('front_promotion', '', TRUE),
			'footer' => $this->load->view('front_footer', '', TRUE),
		);

		return $this->load->view('front_layout', $data1, FALSE);
	}

	public function tuoiXongDat()
	{
		$url = 'http://103.74.121.176/api/v1/vano/xong_dat?all=true';
//		$url = 'https://amduongnguhanh.vn/api/v1/vano/xong_dat';

		$data = array(
			'mon' => 11
		);

		date_default_timezone_set('UTC');
		$date = date('Y-m-d').'T'.date('h:m:s.B').'Z';

		$request_line = 'GET /api/v1/vano/services HTTP/1.1';

		$digest = base64_encode(json_encode($data));

		$sign_text = 'date:'. $date . ' digest:'. $digest .' request-line:'.$request_line;

		$hmac = base64_encode(hash_hmac('sha256', $sign_text, CVPT_CLIENT_SECRET, true));

		$auth_signature = 'Signature keyId="'. CVPT_CLIENT_ID.'",algorithm="hmac-sha256",headers="date digest request-line",signature="'. $hmac .'"';

		$ch = curl_init();

		$headers = array(
			'Content-Type: application/json',
			'client-id: '. CVPT_CLIENT_ID,
			'date: '. $date,
			'digest: '. $digest,
			'request-line: '. $request_line,
			'token: '. $auth_signature,
			'Authorization: Bearer '. $this->session->token_auth,
		);

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$response = json_decode(curl_exec($ch));
		curl_close($ch);

		$main = array(
			'title' => 'Tuổi xông đất',
			'view' => $this->load->view('CVPT/service_xongdat', $response, TRUE),
		);

		$data1 = array(
			'main' => $main,
			'promotion' => $this->load->view('front_promotion', '', TRUE),
			'footer' => $this->load->view('front_footer', '', TRUE),
		);

		return $this->load->view('front_layout', $data1, FALSE);
	}

	public function xuathanh()
	{
		$url = 'http://103.74.121.176/api/v1/vano/xuat_hanh';
//		$url = 'https://amduongnguhanh.vn/api/v1/vano/xuat_hanh';

		$data = array(
			'mon' => 11
		);

		date_default_timezone_set('UTC');
		$date = date('Y-m-d').'T'.date('h:m:s.B').'Z';

		$request_line = 'GET /api/v1/vano/services HTTP/1.1';

		$digest = base64_encode(json_encode($data));

		$sign_text = 'date:'. $date . ' digest:'. $digest .' request-line:'.$request_line;

		$hmac = base64_encode(hash_hmac('sha256', $sign_text, CVPT_CLIENT_SECRET, true));

		$auth_signature = 'Signature keyId="'. CVPT_CLIENT_ID.'",algorithm="hmac-sha256",headers="date digest request-line",signature="'. $hmac .'"';

		$ch = curl_init();

		$headers = array(
			'Content-Type: application/json',
			'client-id: '. CVPT_CLIENT_ID,
			'date: '. $date,
			'digest: '. $digest,
			'request-line: '. $request_line,
			'token: '. $auth_signature,
			'Authorization: Bearer '. $this->session->token_auth,
		);

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$response = json_decode(curl_exec($ch));
		curl_close($ch);

		$main = array(
			'title' => 'Xuất hành',
			'view' => $this->load->view('CVPT/service_xuathanh', $response, TRUE),
		);

		$data1 = array(
			'main' => $main,
			'promotion' => $this->load->view('front_promotion', '', TRUE),
			'footer' => $this->load->view('front_footer', '', TRUE),
		);

		return $this->load->view('front_layout', $data1, FALSE);
	}

	public function kiengki()
	{
		$url = 'http://103.74.121.176/api/v1/vano/kieng_ki';
//		$url = 'https://amduongnguhanh.vn/api/v1/vano/kieng_ki';

		$data = array(
			'full_name' => 'PT-DV-2',
			'birth_day' => '10/12/1993',
			'hob' => '10:06',
		);

		date_default_timezone_set('UTC');
		$date = date('Y-m-d').'T'.date('h:m:s.B').'Z';

		$request_line = 'GET /api/v1/vano/services HTTP/1.1';

		$digest = base64_encode(json_encode($data));

		$sign_text = 'date:'. $date . ' digest:'. $digest .' request-line:'.$request_line;

		$hmac = base64_encode(hash_hmac('sha256', $sign_text, CVPT_CLIENT_SECRET, true));

		$auth_signature = 'Signature keyId="'. CVPT_CLIENT_ID.'",algorithm="hmac-sha256",headers="date digest request-line",signature="'. $hmac .'"';

		$ch = curl_init();

		$headers = array(
			'Content-Type: application/json',
			'client-id: '. CVPT_CLIENT_ID,
			'date: '. $date,
			'digest: '. $digest,
			'request-line: '. $request_line,
			'token: '. $auth_signature,
			'Authorization: Bearer '. $this->session->token_auth,
		);

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$response = json_decode(curl_exec($ch));
		curl_close($ch);

		$main = array(
			'title' => 'Kiêng kị',
			'view' => $this->load->view('CVPT/service_kiengki', $response, TRUE),
		);

		$data1 = array(
			'main' => $main,
			'promotion' => $this->load->view('front_promotion', '', TRUE),
			'footer' => $this->load->view('front_footer', '', TRUE),
		);

		return $this->load->view('front_layout', $data1, FALSE);
	}

	public function checkProfile()
	{
		$url = 'http://103.74.121.176/api/v1/vano/profile';
//		$url = 'https://amduongnguhanh.vn/api/v1/vano/profile';

		$data = array(
			'full_name' => 'PT-DV-2',
			'birth_day' => '10/12/1993',
			'hob' => '10:06',
		);

		date_default_timezone_set('UTC');
		$date = date('Y-m-d').'T'.date('h:m:s.B').'Z';

		$request_line = 'GET /api/v1/vano/services HTTP/1.1';

		$digest = base64_encode(json_encode($data));

		$sign_text = 'date:'. $date . ' digest:'. $digest .' request-line:'.$request_line;

		$hmac = base64_encode(hash_hmac('sha256', $sign_text, CVPT_CLIENT_SECRET, true));

		$auth_signature = 'Signature keyId="'. CVPT_CLIENT_ID.'",algorithm="hmac-sha256",headers="date digest request-line",signature="'. $hmac .'"';

		$ch = curl_init();

		$headers = array(
			'Content-Type: application/json',
			'client-id: '. CVPT_CLIENT_ID,
			'date: '. $date,
			'digest: '. $digest,
			'request-line: '. $request_line,
			'token: '. $auth_signature,
			'Authorization: Bearer '. $this->session->token_auth,
		);

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$response = json_decode(curl_exec($ch));
		curl_close($ch);

		if(!empty($response->data->full_name)) {
			redirect('cvpt');
		} else {
			redirect('cvpt/update-profile');
		}
	}

	public function showUpdateForm()
	{
		$main = array(
			'title' => 'Cố vấn phong thủy',
			'view' => $this->load->view('CVPT/profile', '', TRUE),
		);

		$data1 = array(
			'main' => $main,
			'promotion' => $this->load->view('front_promotion', '', TRUE),
			'footer' => $this->load->view('front_footer', '', TRUE),
		);

		return $this->load->view('front_layout', $data1, FALSE);
	}

	public function updateProfile()
	{
		$url = 'http://103.74.121.176/api/v1/vano/profile';
//		$url = 'https://amduongnguhanh.vn/api/v1/vano/profile';

		$data1 = array(
			'full_name' => $this->input->post('full_name'),
			'birth_day' => date('d/m/Y', strtotime($this->input->post('birth_day'))),
			'hob' => date('H:i', $this->input->post('hob')),
		);


		date_default_timezone_set('UTC');
		$date = date('Y-m-d').'T'.date('h:m:s.B').'Z';

		$request_line = 'GET /api/v1/vano/services HTTP/1.1';

		$digest = base64_encode(json_encode($data1));

		$sign_text = 'date:'. $date . ' digest:'. $digest .' request-line:'.$request_line;

		$hmac = base64_encode(hash_hmac('sha256', $sign_text, CVPT_CLIENT_SECRET, true));

		$auth_signature = 'Signature keyId="'. CVPT_CLIENT_ID.'",algorithm="hmac-sha256",headers="date digest request-line",signature="'. $hmac .'"';

		$ch = curl_init();

		$headers = array(
			'Content-Type: application/json',
			'client-id: '. CVPT_CLIENT_ID,
			'date: '. $date,
			'digest: '. $digest,
			'request-line: '. $request_line,
			'token: '. $auth_signature,
			'Authorization: Bearer '. $this->session->token_auth,
		);

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data1));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$update = json_decode(curl_exec($ch));

		if ($update->status == 200) {
			redirect('cvpt');
		}
	}

	public function list_all()
	{
//		$this->checkProfile();

		$main = array(
			'title' => 'Cố vấn phong thủy',
			'view' => $this->load->view('CVPT/services', '', TRUE),
		);

		$data1 = array(
			'main' => $main,
			'promotion' => $this->load->view('front_promotion', '', TRUE),
			'footer' => $this->load->view('front_footer', '', TRUE),
		);

		return $this->load->view('front_layout', $data1, FALSE);
	}
}
