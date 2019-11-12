<?php


class Blog_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAll() {
		$this->db->where('status', 1);
		$data = $this->db->get('blog')->result();
		if (!empty($data)) {
			return $data;
		} else {
			return 'empty';
		}
	}

	public function addBlog($param) {
		$this->db->set('thumbnail', $param['thumbnail']);
		$this->db->set('url', $param['url']);
		$this->db->set('title', $param['title']);
		$this->db->set('content', $param['content']);
		$this->db->set('status', $param['status']);

		$query = $this->db->insert('blog');

		return $query;
	}

	public function editBlog($param)
	{
		$this->db->set('title', $param['title']);
		$this->db->set('url', $param['url']);
		$this->db->set('content', $param['content']);
		$this->db->where('id', $param['id']);

		$query = $this->db->update('blog');

		return $query;
	}

	public function getBlogById($id)
	{
		$this->db->where('id', $id);
		$data = $this->db->get('blog')->result();
		if (!empty($data)) {
			return $data[0];
		} else {
			return 'empty';
		}
	}

	public function deleteBlog($id)
	{
		$this->db->where('id', $id);

		$data = $this->db->delete('blog');

		return $this->db->affected_rows();
	}
}
