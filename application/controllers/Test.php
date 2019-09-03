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
		$this->load->model('query');
	}

	public function index()
	{

		$data = $this->getHanTu('tung');


//		var_dump($data);


//		echo decbin(ord('tùng')).'<br>';
//		echo decbin(ord($data[1]['text'])).'- '.$data[1]['text'].'<br>';

		foreach ($data as $item) {
			if ($item['text'] == 'tùng') {
				echo $item['text']. ' - 1 <br>';
			} else {
				echo $item['text']. ' - 2 <br>';
			}
		}

	}

	public function abc()
	{
		$data = array(
			'que' => 'HUNG',
			'kq' => 'ádjhákjdh',
			'dien_giai' => 'ákdjhạkdh',
		);

		return $this->load->view('front_boi', $data, TRUE);
	}

	public function getHanTu($word) {
		$results = $this->db->where("text=" , $word)
			->get('han_tu')
			->result_array();
		if (empty($results)) {
			return 'empty';
		} else {
			return $results;
		}
	}
}
