<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 08/26/2019
 * Time: 01:47 PM
 */

class BackUrl extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('_helper');
		$this->load->library('session');
		date_default_timezone_set('UTC');
	}

	public function index()
	{
		$header = $this->input->request_headers();

		if (empty($header['Msisdn'])) {
			if (empty($_GET['link'])) {
				$array = array(
					'msisdn' => 'empty',
				);

				$this->session->set_userdata($array);

				header('Location: '. base_url());
			} else {
				$split_data = $_GET['link'];

				$data = aes128Decrypt(YOMI_KEY_MOBI, $split_data);

				$array = array(
					'msisdn' => $data,
				);

				$this->session->set_userdata($array);

				header('Location: '. base_url());
			}
		} else {
			$data = $header['Msisdn'];

			$array = array(
				'msisdn' => $data
			);

			$this->session->set_userdata($array);

			header('Location: '. base_url());
		}
	}
}
