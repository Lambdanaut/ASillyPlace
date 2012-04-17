<?php

class Blog_model extends CI_Model {
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	// Returns a single post with the slug of $slug
	public function get_post($slug)
	{		
		$query = $this->db->get_where('blog', array('slug' => $slug));
		return $query->row_array();
	}
	public function get_all_posts()
	{
		$query = $this->db->get('blog');
		return $query->result_array();
	}
	// Insert Post into Database
	public function create_post($query)
	{
		return $this->db->insert('blog', $query);
	}
}