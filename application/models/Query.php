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

	public function addUser($data) {
		$results = $this->db->where('phone', $data['phone'])
							->get('users')
							->result_array();

		if (empty($results)) {
			return $this->db->insert('users', $data);
		} else {
			return $this->db->where('phone', $data['phone'])
							->update('users', $data);
		}
	}

	public function getUser($data)
	{
		$results = $this->db->where('phone', $data)
							->get('users')
							->result_array();
		if (empty($results)) {
			return 'empty';
		} else {
			return $results;
		}
	}

}
