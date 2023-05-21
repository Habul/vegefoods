<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{

	public function index()
	{
		$this->load->view('frontend/v_header');
		$this->load->view('frontend/v_home');
		$this->load->view('frontend/v_footer');
	}
}
