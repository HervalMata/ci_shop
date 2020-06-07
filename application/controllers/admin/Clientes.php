<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->library('form_validation');
		$this->load->model('clientes_model');
	}

	public function index()
	{
		$data['titulo'] = 'Lista de Clientes';
		$data['view'] = 'admin/clientes/listar';
		$data['clientes'] = $this->clientes_model->getClientes();
		$this->load->view('admin/template/index', $data);
	}

	/**
	 * @param null $id
	 */
	public function modulo($id_cliente = NULL)
	{
		$dados = NULL;
		if ($id_cliente)
		{
			$data['titulo'] = 'Atualizar cliente';
			$dados = $this->clientes_model->getClienteId($id_cliente);
			if (!$dados)
			{
				setMsg('msgCadastro', 'Cliente não encontrado', 'erro');
				redirect('admin/clientes', 'refresh');
			}
		}
		else
		{
			$data['titulo'] = 'Novo cliente';
		}
		$data['dados'] = $dados;
		$data['view'] = 'admin/clientes/modulo';
		$data['navegacao'] = array('titulo' => 'Lista clientes', 'link' => 'admin/clientes');
		$this->load->view('admin/template/index', $data, FALSE);
	}

	/**
	 *
	 */
	public function core()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
		$this->form_validation->set_rules('data_nascimento', 'Data Nascimento', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == TRUE){
			$data['nome'] = $this->input->post('nome');
			$data['cpf'] = $this->input->post('cpf');
			$data['data_nascimento'] = formataDataDb($this->input->post('data_nascimento'));
			$data['telefone'] = $this->input->post('telefone');
			$data['cep'] = $this->input->post('cep');
			$data['endereco'] = $this->input->post('endereco');
			$data['numero'] = $this->input->post('numero');
			$data['complemento'] = $this->input->post('complemento');
			$data['bairro'] = $this->input->post('bairro');
			$data['cidade'] = $this->input->post('cidade');
			$data['estado'] = $this->input->post('estado');
			$data['email'] = $this->input->post('email');
			$data['senha'] = $this->input->post('senha');
			$data['ativo'] = $this->input->post('ativo');
			if ($this->input->post('id_cliente'))
			{
				$id_cliente = $this->input->post('id_cliente');
				$data['ultima_atualizacao'] = dataDiaDB();
				$this->clientes_model->doUpdate($data, $id_cliente);
				redirect('admin/clientes', 'refresh');
			}
			else
			{
				$data['data_cadastro'] = dataDiaDB();
				$this->clientes_model->doInsert($data);
				redirect('admin/clientes/modulo', 'refresh');
			}
		} else {
			$this->modulo();
		}
	}

	/**
	 * @param null $id_usuario
	 */
	public function del($id_cliente = NULL)
	{
		if ($id_cliente)
		{
			$this->clientes_model->doDelete($id_cliente);
			setMsg('msgCadastro', 'Cliente removido com sucesso', 'sucesso');
			redirect('admin/clientes', 'refresh');
		}
		else
		{
			setMsg('msgCadastro', 'Você precisa selecionar um cliente', 'erro');
			redirect('admin/clientes', 'refresh');
		}
	}
}
