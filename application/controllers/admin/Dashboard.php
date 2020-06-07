<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		$data['view'] = 'admin/template/dashboard';
		$this->load->view('admin/template/index', $data, FALSE);
	}
}
