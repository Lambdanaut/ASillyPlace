<?php

class Blog_model extends CI_Model {
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_blog($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('blog');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('blog', array('slug' => $slug));
		return $query->row_array();
	}
	public function set_blog($slug)
	{
		$data = array(
			'title' => $this->input->post('title'),
			'slug'  => $slug,
			'text'  => $this->input->post('text')
		);
		return $this->db->insert('blog',$data);
	}
}

