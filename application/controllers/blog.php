<?php

class Blog extends CI_Controller {
	public function __construct ()
	{
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->model('comments_model');
	}
	public function index()
	{
		$data['blog'] = $this->blog_model->get_blog();
		$data['title'] = 'News archive';

		$this->load->view('templates/header', $data);
		$this->load->view('blog/index', $data);
		$this->load->view('templates/footer');
	}
	public function view($slug)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['blog_item'] = $this->blog_model->get_blog($slug);

		if (empty($data['blog_item']))
		{
			show_404();
		}

		$data['title'] = $data['blog_item']['title'];
		
		$data['comments'] = $this->comments_model->get_comment($slug);


		/* Check for reply input */
		$this->form_validation->set_rules('author','Author','optional');
		$this->form_validation->set_rules('text','Text','required');

		if ($this->form_validation->run() === TRUE) 
		{
			$this->load->helper('url');		
			$this->comments_model->set_comment($slug);
			redirect('/'.$slug, 'refresh');
		}
		else
		{
			$this->load->view('templates/header', $data);
			$this->load->view('blog/view', $data);
			$this->load->view('templates/footer');
		}

	}
	public function post()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Write a Silly Post';

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('author','Author','optional');
		$this->form_validation->set_rules('text','Text','required');

		if ($this->form_validation->run() === FALSE) 
		{
			$this->load->view('templates/header', $data);
			$this->load->view('blog/post');
			$this->load->view('templates/footer');
		}
		else
		{
			$this->load->helper('url');		
			$slug=rand_string() . "-" . url_title($this->input->post('title'), 'dash', TRUE);
			$this->blog_model->set_blog($slug);
			redirect('/'.$slug, 'refresh');
		}
	}
}
