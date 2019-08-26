<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 08/26/2019
 * Time: 02:35 PM
 */

class Header extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$datas = $this->input->request_headers();
		foreach ($datas as $data => $value) {
			echo $data . ' : ' . $value . '<br>';
		}
	}
}
