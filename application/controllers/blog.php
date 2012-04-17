<?php

// Controls all posts & and replies
class Blog extends CI_Controller {
	public function __construct ()
	{
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->model('comments_model');
	}
	// The front page with a listing of all posts
	public function index()
	{
		$data['title'] = 'News archive';
		$data['blog'] = $this->blog_model->get_all_posts();

		$this->load->view('templates/header', $data);
		$this->load->view('blog/index');
		$this->load->view('templates/footer');
	}
	/**
	* Given a post's slug, tries to find the corresponding post in the database and display it and its comment replies.
	* If posted to, saves the posted comment reply to the database using $slug as its location. 
	*
	* @access public
	* @param string $slug
	*/
	public function view($slug)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['blog_item'] = $this->blog_model->get_post($slug);

		if (empty($data['blog_item']))
		{
			show_404();
		}

		$data['title'] = $data['blog_item']['title'];
		$data['comments'] = $this->comments_model->get_comments_at($slug);

		// Reply Validation
		$this->form_validation->set_rules('author', 'Author', 'optional');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if ($this->form_validation->run() === false) 
		{
			$this->load->view('templates/header', $data);
			$this->load->view('blog/view');
			$this->load->view('templates/footer');
		}
		else
		{
			$query = array(
					'author'   => $this->_author_to_anonymous($this->input->post('author'))
				,	'location' => $slug
				,	'text'     => $this->input->post('text')
			);
			
			$this->comments_model->create_comment($query);
			
			// Refresh the page
			$this->load->helper('url');
			redirect('/'.$slug, 'refresh');
		}

	}
	// Page for making posts
	public function post()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Write a Silly Post';

		// Form Validation
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('author', 'Author', 'optional');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if ($this->form_validation->run() === false) 
		{
			$this->load->view('templates/header', $data);
			$this->load->view('blog/post');
			$this->load->view('templates/footer');
		}
		else
		{	
			// Add some random stuff to the slug. 
			// (I'd probably add the primary key 'id' rather than some random string in a production environment, but this'll do for now.) 
			$this->load->helper('silly');	
			$this->load->helper('url');				
			$slug=rand_string() . "-" . url_title($this->input->post('title'), 'dash', true);
									
			// Load form inputs and send them to the model.
			$query = array(
					'title'  => $this->input->post('title')
				,	'slug'   => $slug
				,	'author' => $this->_author_to_anonymous($this->input->post('author'))
				,	'text'   => $this->input->post('text')
				,	'date'   => date('Y-m-d')
			);

			$this->blog_model->create_post($query);
			
			// Go to the new post
			redirect('/'.$slug, 'refresh');
		}
	}
	/**
	* Returns "Anonymous" if the given string is empty or consists only of spaces. 
	* Otherwise the function returns the given string. 
	*
	* @access private
	* @param string $given_author
	* @return string
	*/
	private function _author_to_anonymous($given_author) {
		if (trim($this->input->post('author')) === '' ) 
		{
			return 'Anonymous';
		}
		else 
		{
			return $given_author;
		}
	}
}
