<?php

/* Controller for the about page and other future meta pages */
class Meta extends CI_Controller {
	public function about()
	{
		$data['title'] = "About A Silly Place";

		$this->load->view('templates/header', $data);
		$this->load->view('meta/about');
		$this->load->view('templates/footer');
	}
}