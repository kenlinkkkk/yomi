<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 08/28/2019
 * Time: 04:44 PM
 */

class Query extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getSimData($num)
	{
		$results = $this->db->where('gia_tri', $num)
							->get('sim_dien_giai')
							->result_array();
		if (empty($results)) {
			return 'empty';
		} else {
			return $results;
		}
	}

	public function getHanTu($word) {
		$results = $this->db->where('text REGEXP', '^'. $word .'$')
							->get('han_tu')
							->result_array();
		if (empty($results)) {
			return 'empty';
		} else {
			return $results;
		}
	}

}
