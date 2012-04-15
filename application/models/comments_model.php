<?php

class Comments_model extends CI_Model {
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_comment($location=False)
	{
		if ($location === FALSE)
		{
			$query = $this->db->get('comments');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('comments', array('location' => $location));
		return $query->row_array();
	}
	public function set_comment()
	{
		# If the author isn't set, put "Anonymous" in the db
		if ($this->input->post('author') === "" ) { $author = "Anonymous"; }
		else { $author = $this->input->post('author'); }
		# Insert Post into Database
		$data = array(
			'author'   => $author
		,	'text'     => $this->input->post('text')
		,	'location' => $this->input->post('location')
		);
		return $this->db->insert('comments',$data);
	}
}

