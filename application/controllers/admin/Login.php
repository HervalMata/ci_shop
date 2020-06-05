<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('password', 'senha', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');

		if ($this->form_validation->run() == TRUE) {
			$identity = $this->input->post('email');
			$password = $this->input->post('password');
			$remember = ($this->input->post('remember') != NULL ? TRUE : False);
			if ($this->ion_auth->login($identity, $password, $remember)) {
				redirect('admin/principal', 'refresh');
			} else {
				redirect('admin/login', 'refresh');
			}
		} else {
			$this->load->view('admin/template/login');
		}
	}

	public function logout()
	{
		$this->ion_auth->logout();
		$this->load->view('admin/template/login');
	}

}
