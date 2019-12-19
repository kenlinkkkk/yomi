<?php


class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function checkLoginAdmin($param) {
		$this->db->where('username', $param['username']);
		$this->db->where('password', $param['password']);
		$this->db->where('status', 1);

		$data = $this->db->get('admin')->result();

		if (!empty($data)) {
			return $data[0];
		} else {
			return 'empty';
		}
	}

	function getAllUser() {
		$data = $this->db->get('users')->result();

		if (!empty($data)) {
			return $data;
		} else {
			return 'empty';
		}
	}

	public function getUserById($id)
	{
		$this->db->where('id', $id);

		$data = $this->db->get('users')->result();

		if (!empty($data)) {
			return $data[0];
		} else {
			return 'empty';
		}
	}

	public function getUserByPhone($phone) {
		$this->db->where('phone', $phone);

		$data = $this->db->get('users')->result();

		if (!empty($data)) {
			return $data[0];
		} else {
			return 'empty';
		}
	}
}
