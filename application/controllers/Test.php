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
	}

	public function index()
	{
		$data = checkPackageStatusAPI('795265287');

		var_dump($data);
	}
}
