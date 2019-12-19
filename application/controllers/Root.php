<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 08/23/2019
 * Time: 02:51 PM
 */

class Root extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function _remap() {
		$html = '';

		$segment1 = $this->uri->segment(1);

		switch ($segment1) {
			case 'chiem-tinh':
				$html = modules::run('ChiemTinh');
				break;
			case 'backurl':
				$html = modules::run('BackUrl');
				break;
			case 'mobireg':
				$html = modules::run('MobiReg');
				break;
			case 'header':
				$html = modules::run('Header');
				break;
			case 'cvpt':
				$html = modules::run('CVPT');
				break;
			case 'blog':
				$html = modules::run('Blog');
				break;
			case 'admin':
				$html = modules::run('Admin');
				break;
			case 'test':
				$html = modules::run('Test');
				break;
			default:
				$html = modules::run('Home_mode');
		}

		$this->output->set_output($html);
	}
}
