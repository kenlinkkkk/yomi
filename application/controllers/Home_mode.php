<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 08/23/2019
 * Time: 03:17 PM
 */

class Home_mode extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('_helper');
		date_default_timezone_set('UTC');

		$back_url = base_url('backurl');

		$url = MOBIFONE_ISDN .'?sp=5899&link='.aes128Encrypt(YOMI_KEY_MOBI, $back_url);

		if (empty($this->session->msisdn)) {
			header('Location: '. $url);
		}
	}

	public function index()
	{
		$segment1 = $this->uri->segment(1);

		switch ($segment1) {
			case 'huong-dan-dang-ky':
				$main = $this->_hddk();
				break;
			case 'chuong-trinh-khuyen-mai':
				$main = $this->_ctkm();
				break;
			case 'lien-he':
				$main = $this->_lienhe();
				break;
			case 'gioi-thieu':
				$main = $this->_gioithieu();
				break;
			case 'sach-kham-pha':
				$main = $this->_sachkhampha();
				break;
			case 'dang-ky':
				$main = $this->_dangky();
				break;
			case 'tu-vi':
				$main = $this->_tuviphongthuy();
				break;
			case 'hoang-dao':
				$main = $this->_hoangdao();
				break;
			case 'lich-van-su':
				$main = $this->_lichvansu();
				break;
			case 'dieu-le':
				$main = $this->_dieule();
				break;
			case 'ket-hop-hoang-dao':
				$main = $this->_kethophoangdao();
				break;
			case 'minigame':
				$main = $this->_minigame();
				break;
			case 'danh-sach-trung-thuong':
				$main = $this->_dstt();
				break;
			default:
				$main = $this->_home();
				break;
		}

		if ($this->session->msisdn != 'empty') {
			$phone = $this->session->msisdn;

			$phone_rewrite = rewitePhoneNumb($phone, 1);

			$array = array(
				'phone' => $phone_rewrite,
			);

			$this->session->set_userdata($array);
		} else {
			$array = array(
				'phone' => ''
			);

			$this->session->set_userdata($array);
		}

		$footer = $this->_footer();
		$promotion = $this->_promotion();

		$data = array(
			'main' => $main,
			'footer' => $footer,
			'promotion' => $promotion,
		);

		return $this->load->view('front_layout', $data, FALSE);
	}

	public function _hddk()
	{
		$data = array(
			'view' => $this->load->view('front_huongdan', '', TRUE),
			'title' => 'Hướng dẫn đăng ký'
		);

		return $data;
	}

	public function _ctkm()
	{
		$data = array(
			'view' => $this->load->view('front_CTKM', '', TRUE),
			'title' => "Chương trình khuyến mại",
		);
		
		return $data;
	}

	public function _lienhe()
	{
		$data = array(
			'view' => $this->load->view('front_Lienhe', '', TRUE),
			'title' => 'Liên hệ',
		);

		return $data;
	}

	public function _footer()
	{
		return $this->load->view('front_footer', '', TRUE);
	}

	public function _promotion()
	{
		return $this->load->view('front_promotion', '', TRUE);
	}

	public function _gioithieu()
	{
		$data = array(
			'view' => $this->load->view('front_gioithieu', '', TRUE),
			'title' => 'Giới thiệu',
		);
		
		return $data;
	}

	public function _sachkhampha()
	{
		$data = array(
			'view' => $this->load->view('front_sachkhampha', '', TRUE),
			'title' => 'Sách khám phá bản thân',
		);

		return $data;
	}

	public function _tuviphongthuy()
	{
		$data = array(
			'view' => $this->load->view('front_tuviphongthuy', '', TRUE),
			'title' => 'Tử vi phong thủy',
		);
		
		return $data;
	}

	public function _hoangdao()
	{
		$data = array(
			'view' => $this->load->view('front_hoangdao', '', TRUE),
			'title' => 'Cung hoàng đạo',
		);

		return $data;
	}

	public function _lichvansu()
	{
		$data = array(
			'view' => $this->load->view('front_lichvansu', '', TRUE),
			'title' => 'Lịch vạn sự',
		);

		return $data;
	}

	public function _dieule()
	{
		$data = array(
			'view' => $this->load->view('front_dieule', '', TRUE),
			'title' => 'Điều lệ sử dụng',
		);

		return $data;
	}

	public function _kethophoangdao()
	{
		$data = array(
			'view' => $this->load->view('front_kethophoangdao', '', TRUE),
			'title' => 'Kết hợp cung hoàng đạo',
		);

		return $data;
	}

	public function _minigame()
	{
		$data = array(
			'view' => $this->load->view('front_minigame', '', TRUE),
			'title' => 'Minigame',
		);

		return $data;
	}

	public function _dstt()
	{
		$data = array(
			'view' => $this->load->view('front_dstt', '', TRUE),
			'title' => 'Danh sách trúng thưởng',
		);

		return $data;
	}

	public function _dangky()
	{
		$data = array(
			'view' => $this->load->view('front_dangky', '', TRUE),
			'title' => 'Đăng ký dịch vụ',
		);

		return $data;
	}

	public function _home()
	{
		$data = array(
			'view' => $this->load->view('front_home', '', TRUE),
			'title' => 'Trang chủ',
		);

		return $data;
	}

}
