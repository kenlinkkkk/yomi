<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 08/27/2019
 * Time: 01:29 PM
 */

class Test extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('_helper');
		$this->load->helper('url');
	}

	public function index()
	{
		$str = "hello";

		echo 'Mcrypt: '.aes128Encrypt(YOMI_KEY_MOBI, $str);
		echo '<br>';
		echo 'Openssl: '. base64_encode(openssl_encrypt($str, 'aes-128-ecb', YOMI_KEY_MOBI, OPENSSL_RAW_DATA));
		echo '<br>';
		echo 'Decrypt: '. openssl_decrypt(base64_decode('DwCD9YrzrM0vIQ0vSLXSzg=='), 'aes-128-ecb', YOMI_KEY_MOBI, OPENSSL_RAW_DATA);
		echo '<br>';
	}
}
