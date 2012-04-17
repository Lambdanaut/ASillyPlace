<?php

class Comments_model extends CI_Model {
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	// Returns an array of comments that are all located at the post of the slug: $location
	public function get_comments_at($location)
	{
		$query = $this->db->get_where('comments', array('location' => $location) );
		return $query->result_array();
	}
	public function get_all_comments()
	{
		$query = $this->db->get('comments');
		return $query->result_array();		
	}
	// Insert Comment into Database
	public function create_comment($query)
	{
		return $this->db->insert('comments', $query);
	}
}