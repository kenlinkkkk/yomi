<?php


class Blog extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Blog_model', 'blog');
	}

	public function index() {
		$segment2 = $this->uri->segment(2);

		if (empty($segment2)) {
			$main = $this->_blog_list();
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
		$blog = array(
			'blog' => $this->blog->getAll(),
		);

		return $data = array(
			'title' => 'Blog',
			'view' => $this->load->view('blog/blog_list', $blog, TRUE),
		);
	}

	public function _blog_detail() {
		$segment2 = intval($this->uri->segment(2));
		$blog = array(
			'blog' => $this->blog->getBlogById($segment2),
		);

		return $data = array(
			'title' => $blog->title,
			'view' => $this->load->view('blog/blog_detail', $blog, TRUE),
		);
	}
}
