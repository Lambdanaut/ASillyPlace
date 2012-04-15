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
		# If the author isn't set, put "Anonymous" in the db
		if ($this->input->post('author') === "" ) { $author = "Anonymous"; }
		else { $author = $this->input->post('author'); }
		# Insert Post into Database
		$data = array(
			'title'  => $this->input->post('title')
		,	'slug'   => $slug
		,	'author' => $author
		,	'text'   => $this->input->post('text')
		,	'date'   => date("Y-m-d")
		);
		return $this->db->insert('blog',$data);
	}
}

