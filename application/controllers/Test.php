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
	}

	public function index()
	{
		var_dump($this->phongthuy());

//		$this->phongthuy();
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
}
