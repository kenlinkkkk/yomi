<?php


class Admin extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
		$this->load->model('Blog_model', 'blog');
		$this->load->helper('_helper');
	}

	function index() {
		$segment1 = $this->uri->segment(1);
		$segment2 = $this->uri->segment(2);
		$segment3 = $this->uri->segment(3);

		if ($segment2 == 'login') {
			return $this->_login();
		}

		if (!$this->_check_login()) {
			redirect( 'admin/login');
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
		$segment3 = $this->uri->segment(3);

		switch ($segment3) {
			case 'add':
			case 'edit':
				return $this->_blog_add();
				break;
			case 'delete':
				return $this->_blog_delete();
				break;
			default:
				return $this->_blog_list();
				break;
		}
	}

	public function _blog_list() {
		$data = array(
			'blog' => $this->blog->getAll(),
		);
		return $this->load->view('admin/admin_blogs', $data, TRUE);
	}

	public function _blog_add()
	{
		$segment3 = $this->uri->segment(3);

		if ($segment3 == 'edit') {
			$segment4 = intval($this->uri->segment(4));
		}

		$blog_title = trim(htmlspecialchars($this->input->post('title')));
		$blog_content = trim(htmlspecialchars($this->input->post('content')));
		$blog_author = trim(htmlspecialchars($this->input->post('author')));
		$blog = array(
			'title' => null,
			'author' => null,
			'content' => null,
			'users' => $this->user->getAllUser(),
		);
		if (empty($blog_thumbnail)) {
			$upload_path = 'uploads';
			$img = '';
			$url = '';

			if (!empty($_FILES['thumbnail']['name'])) {
				$config['upload_path'] = $upload_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '1000000';
				$config['file_name'] = $_FILES['thumbnail']['name'];

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('thumbnail')) {
					$image_data = $this->upload->data();
					$url = $image_data['file_name'];
				} else {
					$error = array('error' => $this->upload->display_errors());
				}

				if (!empty($url)) {
					$img = 'uploads/'.$url;
				}

			}
		}
		if ($this->input->post('isPost')) {
			$blog = array(
				'id' => $this->uri->segment(4),
				'title' => $blog_title,
				'url' => convertText($blog_title),
				'content' =>  $blog_content,
				'thumbnail' => $img,
				'author' => $blog_author,
				'status' => 1,
				'users' => $this->user->getAllUser(),
			);

			if ($segment3 == 'edit') {
				$result = $this->blog->editBlog($blog);
				if (!empty($result)) {
					redirect('admin/blog');
				}
			} else {
				$result =$this->blog->addBlog($blog);
				if (!empty($result)) {
					redirect('admin/blog');
				}
			}
		} elseif ($segment3 =='edit') {
			$row = $this->blog->getBlogById($segment4);

			$blog = array(
				'id' => $row->id,
				'title' => $row->title,
				'url' => $row->url,
				'content' =>  $row->content,
				'thumbnail' => $row->thumbnail,
				'author' => $blog_author,
				'status' => 1,
				'users' => $this->user->getAllUser(),
			);
		}
		return $this->load->view('admin/admin_blog_add', $blog, TRUE);
	}

	public function _blog_delete()
	{
		$id = intval($this->uri->segment(4));

		$result = $this->blog->deleteBlog($id);

		redirect('admin/blog');
	}
}
