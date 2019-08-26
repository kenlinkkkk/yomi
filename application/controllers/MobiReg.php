<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 08/26/2019
 * Time: 01:45 PM
 */

class MobiReg extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('helper');
		date_default_timezone_set('UTC');
	}

	public function index()
	{
		$package_code = $_POST['package_code'];

		$back_url = base_url();

		$trans_id = date('ymdhis');

		$msisdn = $this->session->userdata('msisdn');

		$command_code = 'DK' . $package_code;

		if (!empty($package_code) && !empty($msisdn)) {
			$data = $trans_id . '&' . $command_code . '&' .$package_code . '&' . $back_url;
			$url_none = MOBIFONE_CONFIRM .'?sp=5899&link='.$data;
			log_message('ERROR','msisdn='. $msisdn .'|link-none='. $url_none);

			$url_encrypt = MOBIFONE_CONFIRM . '?sp=5899&link='.aes128Encrypt(YOMI_KEY_MOBI, $data);

			$url = str_replace(' ', '+', $url_encrypt);
			log_message('ERROR', 'msisdn='. $msisdn .'|link='.$url);

			echo $url;
		} else {
			echo base_url();
		}
	}
}
