<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->library('form_validation');
		$this->load->model('categorias_model');
	}

	public function index()
	{
		$data['titulo'] = 'Lista de Categorias';
		$data['view'] = 'admin/categorias/listar';
		$data['categorias'] = $this->categorias_model->getCategorias();
		$this->load->view('admin/template/index', $data);
	}

	/**
	 * @param null $id
	 */
	public function modulo($id_categoria = NULL)
	{
		$dados = NULL;
		if ($id_categoria)
		{
			$data['titulo'] = 'Atualizar categoria';
			$dados = $this->categorias_model->getCategoriaId($id_categoria);
			if (!$dados)
			{
				setMsg('msgCadastro', 'Categoria não encontrada', 'erro');
				redirect('admin/categorias', 'refresh');
			}
		}
		else
		{
			$data['titulo'] = 'Nova categoria';
		}
		$data['dados'] = $dados;
		$data['view'] = 'admin/categorias/modulo';
		$data['categoria_pai'] = $this->categorias_model->getCategoriaPai();
		$data['navegacao'] = array('titulo' => 'Lista categorias', 'link' => 'admin/categorias');
		$this->load->view('admin/template/index', $data, FALSE);
	}

	/**
	 *
	 */
	public function core()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[5]');
		if ($this->form_validation->run() == TRUE){
			$data['nome'] = $this->input->post('nome');
			$data['ativo'] = $this->input->post('ativo');
			if ($this->input->post('id_categoriapai'))
			{
				$data['id_categoriaspai'] = $this->input->post('id_categoriapai');
			}
			else
			{
				$data['id_categoriaspai'] = NULL;
			}
			if ($this->input->post('id_categoria'))
			{
				$id_categoria = $this->input->post('id_categoria');
				$data['ultima_atualizacao'] = dataDiaDB();
				$this->categorias_model->doUpdate($data, $id_categoria);
				redirect('admin/categorias', 'refresh');
			}
			else
			{
				$this->categorias_model->doInsert($data);
				redirect('admin/categorias/modulo', 'refresh');
			}
		} else {
			$this->modulo();
		}
	}

	/**
	 * @param null $id_categoria
	 */
	public function del($id_categoria = NULL)
	{
		if ($id_categoria)
		{
			$this->categorias_model->doDelete($id_categoria);
			setMsg('msgCadastro', 'Categoria removida com sucesso', 'sucesso');
			redirect('admin/categorias', 'refresh');
		}
		else
		{
			setMsg('msgCadastro', 'Você precisa selecionar uma categoria', 'erro');
			redirect('admin/categorias', 'refresh');
		}
	}
}
