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
	}

	public function index()
	{
		$segment2 = $this->uri->segment(2);
		$segment1 = $this->uri->segment(1);
		$phone = $this->session->msisdn;

		if ($phone != 'empty') {
			$phone = substr($phone, 2, strlen($phone) - 2);
			if ($segment1 == 'chiem-tinh') {
				switch ($segment2) {
					case 'boi-sim':
						$main = $this->boi_sim($phone);
						break;
					case 'tong-quan-cung-hoang-dao';
						$main = $this->tq_cunghoangdao();
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
		} else {
			header('Location: '. base_url('sach-kham-pha'));
		}

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
		} elseif ($dien_giai[0]['hung_cat'] == 'cat' || $dien_giai[0]['hung_cat'] == 'cat') {
			$que = $hung_cat[$dien_giai[0]['hung_cat']];
			$kq = 'SIM số này rất hợp với bạn!';
		} else {
			$que = $hung_cat[$dien_giai[0]['hung_cat']];
			$kq = 'SIM số này có thể giữ cũng có thể bỏ, quyết định là tùy ở bạn!';
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
}
