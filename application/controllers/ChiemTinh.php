<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 08/29/2019
 * Time: 09:27 AM
 */

class ChiemTinh extends MX_Controller
{

	#region CONTRUCTOR & INDEX
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('_helper');
		$this->load->model('query');
		$this->load->library('convert');
		date_default_timezone_set('UTC');

	}

	public function index()
	{
		$segment2 = $this->uri->segment(2);
		$segment1 = $this->uri->segment(1);
		$phone = $this->session->msisdn;

		$phone = substr($phone, 2, strlen($phone) - 2);

		if ($segment1 == 'chiem-tinh') {
			switch ($segment2) {
				case 'xem-sim':
					$main = $this->view_boisim();
					break;
				case 'tong-quan-cung-hoang-dao';
					$main = $this->view_tq_cunghoangdao();
					break;
				case 'tao-sach':
					$main = $this->sachkhampha();
					break;
				case 'phong-thuy':
					$main = $this->view_phongthuy();
					break;
				case 'horo-detail':
					$main = $this->view_horo();
					break;
				case 'check-info':
					$main = $this->checkInfo();
					break;
				case 'add-info':
					$main = $this->addUser();
					break;
				case 'daily':
					$main = $this->view_daily();
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

	public function checkInfo()
	{
		$phone = $this->session->msisdn;

		$phone = '0'.substr($phone, 2, strlen($phone) - 2);

		$results = $this->query->getUser($phone);

		$tag = $_POST['tag'];

		if ($tag == 'tong-quan-cung-hoang-dao' || $tag == 'ket-hop-cung-hoang-dao' || $tag == 'boi-sim') {
			echo $tag;
			die();
		} else {
			if ($results == 'empty') {
				echo 0;
				die();
			} else {
				echo $tag;
				die();
			}
		}
	}

	public function addUser() {
		if ($this->session->msisdn != 'empty') {
			$data = array(
				'phone' => '0'. substr($this->session->msisdn, 2, strlen($this->session->msisdn) - 2),
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'gender' => $_POST['gioitinh'],
				'birth_hour' => $_POST['giosinh'],
				'birth_day' => $_POST['ngaysinh'],
				'birth_month' => $_POST['thangsinh'],
				'birth_year' => $_POST['namsinh'],
			);

			$add_status = $this->query->addUser($data);

			echo $add_status;
			die();
		}
	}
	#endregion

	#region FUNCTION BOI SIM
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

		return $results;
	}

	public function view_boisim() {
		try{
			$phone = $this->session->msisdn;
			if ($phone != 'empty') {
				$phone = substr($phone, 2, strlen($phone) - 2);

				$results = $this->boi_sim($phone);

				$data = array(
					'view' => $this->load->view('child_views/front_boisim', $results,TRUE),
					'title' => 'Bói SIM',
				);

				return $data;
			} else {
				redirect($this->uri->segment(0));
			}
		} catch (Exception $exception) {
			redirect($this->uri->segment(0));
		};
	}

	#endregion

	#region FUNCTION BOI TEN
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

	public function view_boiten()
	{
		return null;
	}
	#endregion

	#region FUNCTION TONG QUAN CUNG HOANG DAO
	public function view_tq_cunghoangdao() {
		$data = array(
			'view' => $this->load->view('child_views/front_tqchd', '', TRUE),
			'title' => 'Tổng quan cung hoàng đạo',
		);

		return $data;
	}
	#endregion

	#region FUNCTION SACH KHAM PHA
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
					'phone' => '0'. substr($this->session->msisdn, 2, strlen($this->session->msisdn) - 2),
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
	#endregion

	#region FUNCTION PHONG THUY CA NHAN

	public function phongthuy()
	{
		if ($this->session->msisdn == 'empty' || empty($this->session->msisdn)) {
			redirect($this->uri->segment(0));
		}

		$phone = $phone = '0'. substr($this->session->msisdn, 2, strlen($this->session->msisdn) - 2);

		$data = $this->query->getUser($phone);

		$user_info = $data[0];
		$info = $user_info['name'].' ('.$user_info['birth_day'].'/'.$user_info['birth_month'].'/'.$user_info['birth_year'].')';
		$cung_menh = array( 'Sinh Khí', 'Thiên Y', 'Diên Niên', 'Phục Vị', 'Tuyệt Mệnh',
			'Ngũ Quỷ', 'Lục Sát', 'Họa Hại' );

		$huong = array( 'Chính Bắc', 'Đông Bắc', 'Chính Đông', 'Đông Nam', 'Chính Nam',
			'Tây Nam', 'Chính Tây', 'Tây Bắc' );

		$goc = array( '337.5° - 22.4°', '22.5° - 67.4°', '67.5° - 112.4°', '112.5° - 157.4°',
			'157.5° - 202.4°', '202.5° - 247.4°', '247.5° - 292.4°', '292.5° - 337.4°' );

		$que_data = array(
			0 => array( 2, 7, 0, 1, 3, 6, 5, 4 ),
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
		);
		$mau = array(
			1 => 'Màu Đen (xanh lam nhạt)',
			2 => 'Màu Vàng (Vàng marông)',
			3 => 'Màu Xanh (Xanh lục nhạt)',
			4 => 'Màu Xanh (Xanh lục nhạt)',
			5 => 'Màu Vàng (Vàng marông)',
			6 => 'Màu Trắng (Trắng sữa)',
			7 => 'Màu Trắng (Trắng sữa)',
			8 => 'Màu Màu  Vàng (Vàng marông)',
			9 => 'Màu Hồng (Hồng nhạt)'
		);

		$mau_code = array(
			1 => array('#000000', '#17a2b8'),
			2 => array('#ffff00', '#dec600'),
			3 => array('#066037', '#00ff8a'),
			4 => array('#066037', '#00ff8a'),
			5 => array('#ffff00', '#e6a817'),
			6 => array('#ffffff', '#f9f8e4'),
			7 => array('#ffffff', '#f9f8e4'),
			8 => array('#ffff00', '#dec600'),
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
			'info' => $info,
			'mau_sac' => $mau[$que],
			'mau_code' => $mau_code[$que],
			'tot' => $chunk[0],
			'xau' => $chunk[1],
		);

		return $final_rs;
	}

	public function view_phongthuy()
	{
		try{
			$results = $this->phongthuy();

			$data = array(
				'view' => $this->load->view('child_views/front_phongthuy', $results, TRUE),
				'title' => 'Xem phong thủy',
			);

			return $data;
		} catch (Exception $exception) {
			redirect($this->uri->segment(0));
		};
	}

	#endregion

	#region FUNCTION CHI TIET CUNG HOANG DAO
	public function chitiet_chd() {
		if ($this->session->msisdn == 'empty' || empty($this->session->msisdn)) {
			redirect($this->uri->segment(0));
		}

		$phone = '0'. substr($this->session->msisdn, 2, strlen($this->session->msisdn) - 2);

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

		$dien_giai = $this->query->getHoroDetail($data_horo['key']);

		$data_horo['dien_giai'] = $dien_giai[0];

		return $data_horo;
	}

	public function view_horo(){
		try{
			$detail = $this->chitiet_chd();

			$data = array(
				'view' => $this->load->view('child_views/front_ctchd', $detail, TRUE),
				'title' => 'Chi tiết cung hoàng đạo',
			);

			return $data;
		} catch (Exception $exception) {
			redirect($this->uri->segment(0));
		};
	}

	#endregion

	#region FUNCTION TU VI HANG NGAY
	public function tuvihangngay()
	{
		if (empty($this->session->msisdn) || $this->session->msisdn == 'empty') {
			header('Location:' .base_url());
		}

		$phone = '0'. substr($this->session->msisdn, 2, strlen($this->session->msisdn) - 2);
		$data = $this->query->getUser($phone);

		$user_info = $data[0];
		$info = $user_info['name'].' ('.$user_info['birth_day'].'/'.$user_info['birth_month'].'/'.$user_info['birth_year'].')';
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
					'info' => $info,
					'key' => $key,
					'value' => $value,
				);
			} elseif ($birth >= $startDate || $birth <= $endDate) {
				$data_horo = array(
					'info' => $info,
					'key' => 10,
					'value' => $cung_hoang_dao[10],
				);
			} else {
				$data_horo = array(
					'info' => $info,
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

		if ($data_sk[0]['detail'] == 'e') {
			$data_sk[0]['detail']['detail'] = '';
		}

		if ($data_tc[0]['detail'] == 'e') {
			$data_tc[0]['detail']['detail'] = '';
		}

		if ($data_tt[0]['detail'] == 'e') {
			$data_tt[0]['detail']['detail'] = '';
		}

		$data_tq = array(
			'suc_khoe' => array(
				'value' => $suc_khoe,
				'detail' => $data_sk[0],
			),
			'tinh_cam' => array(
				'value' => $tinh_cam,
				'detail' => $data_tc[0],
			),
			'tri_tue' => array(
				'value' => $tri_tue,
				'detail' => $data_tt[0],
			),
		);

		$results = array_merge($data_horo, $data_tq);

		return $results;
	}

	public function view_daily()
	{
		try{
			$detail = $this->tuvihangngay();

			$data = array(
				'view' => $this->load->view('child_views/front_tvhn', $detail, TRUE),
				'title' => 'Tử vi hằng ngày',
			);

			return $data;
		} catch (Exception $exception) {
			redirect($this->uri->segment(0));
		};
	}
	#endregion


}
