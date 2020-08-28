<?php


class Blog extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Blog_model', 'blog');
		$this->load->model('User_model', 'user');
	}

	public function index() {
		$segment2 = $this->uri->segment(2);

		if (empty($segment2)) {
			$main = $this->_blog_list();
		} elseif ($segment2 == 'add') {
			if ($this->session->msisdn) {
				$main = $this->_blog_add();
			} else {
				redirect(base_url('sach-kham-pha'));
			}
		} else {
			$main = $this->_blog_detail();
		}

		$promotion = $this->load->view('front_promotion', '', TRUE);
		$footer = $this->load->view('front_footer', '', TRUE);

		$data = array(
			'main' => $main,
			'promotion' => $promotion,
			'footer' => $footer,
		);
		var_dump($main);
		return $this->load->view('front_layout', $data, TRUE);
	}

	public function _blog_list()
	{
		$blogs = $this->blog->getAll();

		foreach ($blogs as $blog) {
			$user = $this->user->getUserById($blog->author);
			$blog->author_name = $user;
		}

		$blog = array(
			'blogs' => $blogs,
		);

		return $data = array(
			'title' => 'Blog',
			'view' => $this->load->view('blog/blog_list', $blog, TRUE),
		);
	}

	public function _blog_detail() {
		$segment2 = intval($this->uri->segment(2));
		$blog = $this->blog->getBlogById($segment2);
		$blog = array(
			'blog' => $blog,
			'user' => $this->user->getUserById($blog->author),
		);

		return $data = array(
			'title' => $blog->title,
			'view' => $this->load->view('blog/blog_detail', $blog, TRUE),
		);
	}

	public function _blog_add() {
		return $data = array(
			'title' => 'Thêm mới blog',
			'view' => $this->load->view('blog/add_blog', '', TRUE),
		);
	}
}
