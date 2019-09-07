<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 08/29/2019
 * Time: 09:27 AM
 */

class ChiemTinh extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('_helper');
		$this->load->model('query');
		$this->load->library('convert');
	}

	public function index()
	{
		$segment2 = $this->uri->segment(2);
		$segment1 = $this->uri->segment(1);
		$phone = $this->session->msisdn;

		$phone = substr($phone, 2, strlen($phone) - 2);

		if ($segment1 == 'chiem-tinh') {
			switch ($segment2) {
				case 'boi-sim':
					$main = $this->boi_sim($phone);
					break;
				case 'tong-quan-cung-hoang-dao';
					$main = $this->tq_cunghoangdao();
					break;
				case 'tao-sach':
					$main = $this->sachkhampha();
					break;
				case 'phong-thuy':
					$main = $this->phongthuy();
					break;
			}
		}

		$promotion = $this->load->view('front_promotion', '', TRUE);
		$footer = $this->load->view('front_footer', '', TRUE);

		$data = array(
			'main' => $main,
			'promotion' => $promotion,
			'footer' => $footer,
		);

		return $this->load->view('front_layout', $data, TRUE);

	}

	public function boi_sim($phone) {
		$gia_tri = intval($phone) % 80;

		$dien_giai = $this->query->getSimData($gia_tri);

		$hung_cat = array(
			'hung' => 'HUNG',
			'dai_hung' => 'ĐẠI HUNG',
			'cat' => 'CÁT',
			'dai_cat' => 'ĐẠI CÁT',
			'binh' => 'BÌNH',
		);

		if ($dien_giai[0]['hung_cat'] == 'hung' || $dien_giai[0]['hung_cat'] == 'dai_hung') {
			$que = $hung_cat[$dien_giai[0]['hung_cat']];
			$kq = 'SIM số này không hợp với bạn, hãy tìm sim khác phù hợp với vận hạn của bạn hơn';
		} elseif ($dien_giai[0]['hung_cat'] == 'binh') {
			$que = $hung_cat[$dien_giai[0]['hung_cat']];
			$kq = 'SIM số này có thể giữ cũng có thể bỏ, quyết định là tùy ở bạn!';
		} else {
			$que = $hung_cat[$dien_giai[0]['hung_cat']];
			$kq = 'SIM số này rất hợp với bạn!';
		}

		$results = array(
			'que' => $que,
			'kq' => $kq,
			'dien_giai' => $dien_giai[0]['dien_giai'],
		);

		$data = array(
			'view' => $this->load->view('front_boi', $results, TRUE),
			'title' => 'Bói SIM',
		);

		return $data;
	}

	public function boi_ten($str)
	{
		$get = $this->input->get();

		$fullname =urldecode(preg_replace('/\-+/', ' ', $get['fullname']));

		$data = explode(' ', mb_strtolower($fullname));

		if (count($data) < 2) {
			$noti = 'Tên quá ngắn!';
		} elseif (count($data) > 6) {
			$noti = 'Tên quá dài!';
		} else {
			$ten['ho'] = $data[0];
			$ten['ten'] = $data[count($data) - 1];

			$data[0] = $data[count($data) - 1] = null;

			$ten['dem'] = array_filter($data);

			$han_tu = array(
				'fullname' => str_name($fullname),
				'ho' => $this->query->getHanTu($ten['ho']),
				'ten' => $this->query->getHanTu($ten['ten']),
			);


		}
	}

	public function tq_cunghoangdao() {
		$data = array(
			'view' => $this->load->view('front_tqchd', '', TRUE),
			'title' => 'Tổng quan cung hoàng đạo',
		);

		return $data;
	}

	public function sachkhampha()
	{
		if (!empty($_POST['name'])) {
			$param = array(
				'email' => $_POST['email'],
				'birth_hour' => $_POST['giosinh'],
				'birth_date' => $_POST['ngaysinh'],
				'birth_month' => $_POST['thangsinh'],
				'birth_year' => $_POST['namsinh'],
				'gender' => $_POST['gioitinh'],
				'fullname' => $_POST['name'],
				'username' => substr($this->session->msisdn, 1, strlen($this->session->msisdn) - 1),
			);

			if ($this->session->msisdn != 'empty') {
				$data = array(
					'phone' => $this->session->msisdn,
					'name' => $_POST['name'],
					'email' => $_POST['email'],
					'gender' => $_POST['gioitinh'],
					'birth_hour' => $_POST['giosinh'],
					'birth_day' => $_POST['ngaysinh'],
					'birth_month' => $_POST['thangsinh'],
					'birth_year' => $_POST['namsinh'],
				);

				$add_status = $this->query->addUser($data);
			}

			$results = sachkhampha(API_PAY_BOOK, $param);

			echo $results->status;
			die();
		} else {
			$param = array(
				'email' => $_POST['email'],
			);

			$results = sachkhampha(API_TRAIL_BOOK, $param);

			echo $results->status;
			die();
		}
	}

	public function phongthuy()
	{
		$phone = $this->session->msisdn;

		$data = $this->query->getUser($phone);

		$user_info = $data[0];

		$cung_menh = array( 'Sinh Khí', 'Thiên Y', 'Diên Niên', 'Phục Vị', 'Tuyệt Mệnh',
			'Ngũ Quỷ', 'Lục Sát', 'Họa Hại' );
		$huong = array( 'Chính Bắc', 'Đông Bắc', 'Chính Đông', 'Đông Nam', 'Chính Nam',
			'Tây Nam', 'Chính Tây', 'Tây Bắc' );
		$goc = array( '337.5° - 22.4°', '22.5° - 67.4°', '67.5° - 112.4°', '112.5° - 157.4°',
			'157.5° - 202.4°', '202.5° - 247.4°', '247.5° - 292.4°', '292.5° - 337.4°' );
		$que_data = array(
			1 => array( 3, 5, 1, 0, 2, 4, 7, 6 ),
			2 => array( 4, 0, 7, 5, 6, 3, 1, 2 ),
			3 => array( 1, 6, 3, 2, 0, 7, 4, 5 ),
			4 => array( 0, 4, 2, 3, 1, 5, 6, 7 ),
			5 => array(
				array( 4, 0, 7, 5, 6, 3, 1, 2 ),
				array( 5, 3, 6, 4, 7, 0, 3, 1 ),
			),
			6 => array( 6, 1, 5, 7, 4, 2, 0, 3 ),
			7 => array( 7, 2, 4, 6, 5, 1, 3, 0 ),
			8 => array( 5, 3, 6, 4, 7, 0, 2, 1 ),
			0 => array( 2, 7, 0, 1, 3, 6, 5, 4 ),
		);
		$mau = array(
			1 => 'Màu Đen (xanh lam nhạt)',
			2 => 'Màu Vàng (Vàng marông)',
			3 => 'Màu  Xanh (Xanh lục nhạt)',
			4 => 'Màu Xanh (Xanh lục nhạt)',
			5 => 'Màu  Vàng (Vàng marông)',
			6 => 'Màu Trắng (Trắng sữa)',
			7 => 'Màu Trắng (Trắng sữa)',
			8 => 'Màu Màu  Vàng (Vàng marông)',
			9 => 'Hồng (Hồng nhạt)'
		);

		$mau_code = array(
			1 => array('#000000', '#17a2b8'),
			2 => array('#ffff00', '#e6a817'),
			3 => array('#007bff', '#78b9ff'),
			4 => array('#007bff', '#78b9ff'),
			5 => array('#ffff00', '#e6a817'),
			6 => array('#ffffff', '#f9f8e4'),
			7 => array('#ffffff', '#f9f8e4'),
			8 => array('#ffff00', '#e6a817'),
			9 => array('#e83e8c', '#e9a0c1'),
		);

		$lunar_date = $this->convert->convertDate($user_info['birth_day'], $user_info['birth_month'], $user_info['birth_year']);

		$lunar_year = $lunar_date['year'];

		$gender = $user_info['gender'] === 'm' ? 0 : 1;

		if (!$gender) {
			$sub = $lunar_year > 2000 ? 99 : 100;
		} else {
			$sub = $lunar_year > 2000 ? 4 : 3;
		}

		$short_year = (int) substr($lunar_year, -2);

		$que = abs($short_year - $sub) % 9;

		$results = array();

		if ($que == 5) {
			$args = $que_data[$que][$gender];
		} else {
			$args = $que_data[$que];
		}


		foreach ($args as $key => $cung) {
			$results[$cung] = array(
				'text' => 'Hướng' . $cung_menh[$cung] .' - '.$huong[$key],
				'goc' =>$goc [$key],
			);
		}

		ksort($results);

		$chunk = array_chunk($results, 4);

		$final_rs = array(
			'mau_sac' => $mau[$que],
			'mau_code' => $mau_code[$que],
			'tot' => $chunk[0],
			'xau' => $chunk[1],
		);

		return $final_rs;
	}
}
