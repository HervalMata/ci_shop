<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->library('form_validation');
		$this->load->model('relatorios_model');
	}

	public function index()
	{
		redirect('admin/relatorios/diario', 'refresh');
	}

	public function diario()
	{
		$data['titulo'] = 'Imprimir relatório dem vendas diárias';
		$data['view'] = 'admin/relatorios/diario';
		$data['loja'] = $this->relatorios_model->getDadosLoja();
		$data['dados'] = $this->relatorios_model->getPedido();
		$this->load->view('admin/template/pedido_imprimir', $data, FALSE);
	}

	public function periodo()
	{
		$this->form_validation->set_rules('data_inicial', 'Data Inicial', 'trim|required');
		$this->form_validation->set_rules('data_final', 'Data Final', 'trim|required');
		if ($this->form_validation->run() == TRUE)
		{
			$data_inicial = formataDataDb($this->input->post('data_inicial'));
			$data_final = formataDataDb($this->input->post('data_final'));
			$query = $this->relatorios_model->getRelatorioPeriodo([
				'data_cadastro >=' => $data_inicial,
				'data_cadastro <=' => $data_final,
			]);
			$this->view_relatorio($query);
		}
		else{
			$data['titulo'] = 'Relatório de vendas por periodo';
			$data['view'] = 'admin/relatorios/view';
			$this->load->view('admin/template/index', $data, FALSE);
		}
	}

	public function view_relatorio($dados = NULL)
	{
		$data['titulo'] = 'Relatório de vendas por periodo';
		$data['view'] = 'admin/relatorios/view';
		$data['pedidos'] = $dados;
		$this->load->view('admin/template/index', $data, FALSE);
	}

	public function mais_vendidos()
	{
		$data['titulo'] = 'Imprimir relatório dos produtos mais vendidos';
		$data['view'] = 'admin/relatorios/mais_vendidos';
		$data['produtos'] = $this->relatorios_model->getProdutosMaisVendidos();
		$data['loja'] = $this->relatorios_model->getDadosLoja();
		$this->load->view('admin/template/pedido_imprimir', $data, FALSE);
	}
}
