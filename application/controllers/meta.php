<?php

/* Controller for the about pages and other future meta pages */
class Meta extends CI_Controller {
	public function about_sp()
	{
		$data['title'] = "About A Silly Place";

		$this->load->view('templates/header', $data);
		$this->load->view('meta/about');
		$this->load->view('templates/footer');
	}
	public function about_me()
	{
		$data['title'] = "About Josh";

		$this->load->view('templates/header', $data);
		$this->load->view('meta/me');
		$this->load->view('templates/footer');
	}
}