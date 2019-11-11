<?php


class Admin extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
	}

	function index() {
		$segment1 = $this->uri->segment(1);
		$segment2 = $this->uri->segment(2);
		$segment3 = $this->uri->segment(3);

		if ($segment2 == 'login') {
			return $this->_login();
		}

		if (!$this->_check_login()) {
			redirect($this->uri->level(1). '/login');
		}

		if ($segment2 == 'logout') {
			return $this->_logout();
		}
		$main = '';

		if ($segment1 == 'admin'){
			switch ($segment2) {
				case 'blog':
					$main = $this->_blog();
					break;
			}
		}

		$data['main'] = $main;

		return $this->load->view('admin/admin_layout', $data, FALSE);
	}
//    function for login

	function _admin_login() {
		return $this->load->view('admin/admin_login');
	}

	function _check_login() {
		$username = $this->session->userdata('username');

		if ($username) {
			return true;
		} else {
			return false;
		}
	}

	function _login() {
		$errors = false;

		$this->session->unset_userdata('username');
		$this->session->unset_userdata('check_ss');
		if (isset($_SESSION['ss'])) {
			$_SESSION = null;
		}

		if ($this->input->post('isPost')) {
			$errors = true;
			$param = array(
				'username' => trim(htmlspecialchars($this->input->post('adminUsername'))),
				'password' => md5(trim($this->input->post('adminPass'))),
			);

			$row = $this->user->checkLoginAdmin($param);

			if ($row) {
				$array = array(
					'username'    => $row->username,
				);

				$this->session->set_userdata($array);

				@session_start();

				$_SESSION['username'] = $row->username;
				$_SESSION['ss'] = 'ss';

				redirect('admin/dashboard');
			} else {
				$errors = 'Đăng nhập thất bại';
			}
		}
		return $this->load->view('admin/admin_login', array('errors' => $errors), true);


	}

	function _logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('check_ss');
		redirect('admin/login');
	}

	public function _blog()
	{
		return $this->load->view('admin/admin_blogs', '', TRUE);
	}
}
