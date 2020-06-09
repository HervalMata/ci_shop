<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->library('form_validation');
		$this->load->model('config_model');
	}

	public function index()
	{
		$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|min_length[5]');
		if ($this->form_validation->run() == TRUE)
		{
			$dados['titulo'] = $this->input->post('titulo');
			$dados['empresa'] = $this->input->post('empresa');
			$dados['cep'] = $this->input->post('cep');
			$dados['endereco'] = $this->input->post('endereco');
			$dados['bairro'] = $this->input->post('bairro');
			$dados['complemento'] = $this->input->post('complemento');
			$dados['cidade'] = $this->input->post('cidade');
			$dados['estado'] = $this->input->post('estado');
			$dados['telefone'] = $this->input->post('telefone');
			$dados['email'] = $this->input->post('email');
			$dados['p_destaque'] = $this->input->post('p_destaque');
			$dados['data_atualizacao'] = dataDiaDB();
			$this->config_model->doUpdate($dados);
			redirect('admin/template/index', 'refresh');
		}
		else
		{
			$data['titulo'] = 'Configuração da Loja';
			$data['view'] = 'admin/config/index';
			$data['query'] = $this->config_model->getConfig();
			$this->load->view('admin/template/index', $data);
		}
	}

	public function pagseguro()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('token', 'Token', 'trim|required');
		if ($this->form_validation->run() == TRUE)
		{
			$dadosPagseguro['email'] = $this->input->post('email');
			$dadosPagseguro['token'] = $this->input->post('token');
			$dadosPagseguro['boleto'] = $this->input->post('boleto');
			$dadosPagseguro['cartao'] = $this->input->post('cartao');
			$dadosPagseguro['debito'] = $this->input->post('debito');
			$dados['data_atualizacao'] = dataDiaDB();
			$this->config_model->doUpdatePagseguro($dadosPagseguro);
			redirect('admin/config/pagseguro', 'refresh');
		}
		else
		{
			$data['titulo'] = 'Configuração do PagSeguro';
			$data['view'] = 'admin/config/pagseguro';
			$data['query'] = $this->config_model->getConfigPagseguro();
			$this->load->view('admin/template/index', $data);
		}
	}

	public function correios()
	{
		$this->form_validation->set_rules('cep_origem', 'CEP Origem', 'trim|required');
		if ($this->form_validation->run() == TRUE)
		{
			$dadosCorreios['cep_origem'] = $this->input->post('cep_origem');
			$dadosCorreios['frete'] = $this->input->post('frete');
			$dados['data_atualizacao'] = dataDiaDB();
			$this->config_model->doUpdateCorreios($dadosCorreios);
			redirect('admin/config/correios', 'refresh');
		}
		else
		{
			$data['titulo'] = 'Configuração dos Correios';
			$data['view'] = 'admin/config/correios';
			$data['query'] = $this->config_model->getConfigCorreios();
			$this->load->view('admin/template/index', $data);
		}
	}
}
