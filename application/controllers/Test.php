<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 09/06/2019
 * Time: 06:38 PM
 */

class Test extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('_helper');
		$this->load->model('query');
		$this->load->library('convert');
		$this->load->library('session');
		date_default_timezone_set('UTC');
	}

	public function index()
	{
		echo "aksjdhakjdh";
	}


	public function phongthuy()
	{
//		$phone = $this->session->msisdn;

		$data = $this->query->getUser('0902178830');

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
			1 => 'Màu Đen (Xanh lam nhạt)',
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
			3 => array('#007bff', '#20c997'),
			4 => array('#007bff', '#20c997'),
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
				'text' => 'Hướng ' . $cung_menh[$cung] .' - '.$huong[$key],
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

	public function chitiet_chd() {
//		$phone = $this->session->msisdn;

		$data = $this->query->getUser('0902178830');
		$user_info = $data[0];

		$birthDay = $user_info['birth_month'].'/'.$user_info['birth_day'];
		$cung_hoang_dao = array(
			'1' => array('name' => 'Bạch Dương', 'fromdate' => '3/21', 'todate' => '4/19', 'image' => 'assets/images/zodiacs/20.png', 'time' => "21/03 - 19/04"),
			'2' => array('name' => 'Kim Ngưu', 'fromdate' => '4/20', 'todate' => '5/20', 'image' => 'assets/images/zodiacs/21.png', 'time' => "20/04 - 20/05"),
			'3' => array('name' => 'Song Tử', 'fromdate' => '5/21', 'todate' => '6/21', 'image' => 'assets/images/zodiacs/22.png', 'time' => "21/05 - 21/06"),
			'4' => array('name' => 'Cự Giải', 'fromdate' => '6/22', 'todate' => '7/22', 'image' => 'assets/images/zodiacs/23.png', 'time' => "22/06 - 22/07"),
			'5' => array('name' => 'Sư Tử', 'fromdate' => '7/23', 'todate' => '8/22', 'image' => 'assets/images/zodiacs/24.png', 'time' => "23/07 - 22/08"),
			'6' => array('name' => 'Xử Nữ', 'fromdate' => '8/23', 'todate' => '9/23', 'image' => 'assets/images/zodiacs/25.png', 'time' => "23/08 - 22/09"),
			'7' => array('name' => 'Thiên Bình', 'fromdate' => '9/24', 'todate' => '10/23', 'image' => 'assets/images/zodiacs/26.png', 'time' => "23/09 - 23/10"),
			'8' => array('name' => 'Bọ Cạp', 'fromdate' => '10/24', 'todate' => '11/22', 'image' => 'assets/images/zodiacs/27.png', 'time' => "24/10 - 21/11"),
			'9' => array('name' => 'Nhân Mã', 'fromdate' => '11/23', 'todate' => '12/21', 'image' => 'assets/images/zodiacs/28.png', 'time' => "22/11 - 21/12"),
			'10' => array('name' => 'Ma Kết', 'fromdate' => '12/22', 'todate' => '1/19', 'image' => 'assets/images/zodiacs/29.png', 'time' => "22/12 - 19/01"),
			'11' => array('name' => 'Bảo Bình', 'fromdate' => '1/20', 'todate' => '2/18', 'image' => 'assets/images/zodiacs/30.png', 'time' => "20/01 - 18/12"),
			'12' => array('name' => 'Song Ngư', 'fromdate' => '2/19', 'todate' => '3/20', 'image' => 'assets/images/zodiacs/31.png', 'time' => "19/02 - 20/03")
		);

		$birth = new DateTime($birthDay);
//		$birth = $birth->format('d/m');

		$data_horo = null;

		foreach ($cung_hoang_dao as $key => $value) {
			$startDate = new DateTime($value['fromdate']);
//			$start = $startDate->format('d/m');
			$endDate = new DateTime($value['todate']);
//			$end = $endDate->format('d/m');

//			echo 'Start: '. $start .'- End: '. $end .'-Birth: '. $birth.'<br>';

			if ($birth > $startDate && $birth < $endDate) {

				$data_horo = array(
					'key' => $key,
					'value' => $value,
				);
			}
		}

		$dien_giai = $this->query->getHoroDetail($data_horo['key']);

		$data_horo['dien_giai'] = $dien_giai[0];

		return $data_horo;
	}

	public function tuvihangngay()
	{
//		$phone = '0'. substr($this->session->msisdn, 2, strlen($this->session->msisdn) - 2);
		$phone = '0795265287';

		$data = $this->query->getUser($phone);

		$user_info = $data[0];

		$birthDay = $user_info['birth_month'].'/'.$user_info['birth_day'].'/'.$user_info['birth_year'];

		$cung_hoang_dao = array(
			'1' => array('name' => 'Bạch Dương', 'fromdate' => '3/21', 'todate' => '4/19', 'image' => 'assets/images/zodiacs/20.png', 'time' => "21/03 - 19/04"),
			'2' => array('name' => 'Kim Ngưu', 'fromdate' => '4/20', 'todate' => '5/20', 'image' => 'assets/images/zodiacs/21.png', 'time' => "20/04 - 20/05"),
			'3' => array('name' => 'Song Tử', 'fromdate' => '5/21', 'todate' => '6/21', 'image' => 'assets/images/zodiacs/22.png', 'time' => "21/05 - 21/06"),
			'4' => array('name' => 'Cự Giải', 'fromdate' => '6/22', 'todate' => '7/22', 'image' => 'assets/images/zodiacs/23.png', 'time' => "22/06 - 22/07"),
			'5' => array('name' => 'Sư Tử', 'fromdate' => '7/23', 'todate' => '8/22', 'image' => 'assets/images/zodiacs/24.png', 'time' => "23/07 - 22/08"),
			'6' => array('name' => 'Xử Nữ', 'fromdate' => '8/23', 'todate' => '9/23', 'image' => 'assets/images/zodiacs/25.png', 'time' => "23/08 - 22/09"),
			'7' => array('name' => 'Thiên Bình', 'fromdate' => '9/24', 'todate' => '10/23', 'image' => 'assets/images/zodiacs/26.png', 'time' => "23/09 - 23/10"),
			'8' => array('name' => 'Bọ Cạp', 'fromdate' => '10/24', 'todate' => '11/22', 'image' => 'assets/images/zodiacs/27.png', 'time' => "24/10 - 21/11"),
			'9' => array('name' => 'Nhân Mã', 'fromdate' => '11/23', 'todate' => '12/21', 'image' => 'assets/images/zodiacs/28.png', 'time' => "22/11 - 21/12"),
			'10' => array('name' => 'Ma Kết', 'fromdate' => '12/22', 'todate' => '1/19', 'image' => 'assets/images/zodiacs/29.png', 'time' => "22/12 - 19/01"),
			'11' => array('name' => 'Bảo Bình', 'fromdate' => '1/20', 'todate' => '2/18', 'image' => 'assets/images/zodiacs/30.png', 'time' => "20/01 - 18/12"),
			'12' => array('name' => 'Song Ngư', 'fromdate' => '2/19', 'todate' => '3/20', 'image' => 'assets/images/zodiacs/31.png', 'time' => "19/02 - 20/03")
		);

		$birth = new DateTime($birthDay);

		$data_horo = null;

		foreach ($cung_hoang_dao as $key => $value) {
			$startDate = new DateTime($value['fromdate'] .'/'. $user_info['birth_year']);

			$endDate = new DateTime($value['todate'] .'/'. $user_info['birth_year']);

			if ($birth >= $startDate && $birth <= $endDate) {
				$data_horo = array(
					'key' => $key,
					'value' => $value,
				);
			} elseif ($birth >= $startDate || $birth <= $endDate) {
				$data_horo = array(
					'key' => 10,
					'value' => $cung_hoang_dao[10],
				);
			} else {
				$data_horo = array(
					'key' => 5,
					'value' => $cung_hoang_dao[5],
				);
			}
		}

		$today = date('m/d/Y');

		$number_date = strtotime($today) - strtotime($birthDay);
		$number_date = (int) $number_date / 86400;

		$suc_khoe = 50 + round(sin(2*pi()*$number_date/23)*50, 2);
		$tinh_cam = 50 + round(sin(2*pi()*$number_date/28)*50, 2);
		$tri_tue = 50 + round(sin(2*pi()*$number_date/33)*50, 2);
		$trung_binh = round(($suc_khoe + $tinh_cam + $tri_tue)/3, 2);

		$data_sk = $this->query->getDaily($data_horo['key'], 1, $suc_khoe);
		$data_tc = $this->query->getDaily($data_horo['key'], 2, $tinh_cam);
		$data_tt = $this->query->getDaily($data_horo['key'], 3, $tri_tue);

		if (!empty($data_sk)) {
			$sk = array(
				'value' => $suc_khoe,
				'detail' => $data_sk[0],
			);
		} else {
			$sk = array(
				'value' => '',
				'detail' => '',
			);
		}

		if (!empty($data_tc)) {
			$tc = array(
				'value' => $tinh_cam,
				'detail' => $data_tc[0],
			);
		} else {
			$tc = array(
				'value' => '',
				'detail' => '',
			);
		}

		if (!empty($data_tt)) {
			$tt = array(
				'value' => $tri_tue,
				'detail' => $data_tt[0],
			);
		} else {
			$tt = array(
				'value' => '',
				'detail' => '',
			);
		}

		$data_tq = array(
			'suc_khoe' => $sk,
			'tinh_cam' => $tc,
			'tri_tue' => $tt
		);

		$results = array_merge($data_horo, $data_tq);

		return $results;
	}
}
