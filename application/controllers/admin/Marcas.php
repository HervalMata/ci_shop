<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->library('form_validation');
		$this->load->model('marcas_model');
	}

	public function index()
	{
		$data['titulo'] = 'Lista de Marcas';
		$data['view'] = 'admin/marcas/listar';
		$data['marcas'] = $this->marcas_model->getMarcas();
		$this->load->view('admin/template/index', $data);
	}

	/**
	 * @param null $id
	 */
	public function modulo($id_marca = NULL)
	{
		$dados = NULL;
		if ($id_marca)
		{
			$data['titulo'] = 'Atualizar marca';
			$dados = $this->marcas_model->getMarcaId($id_marca);
			if (!$dados)
			{
				setMsg('msgCadastro', 'Marca não encontrada', 'erro');
				redirect('admin/marcas', 'refresh');
			}
		}
		else
		{
			$data['titulo'] = 'Nova marca';
		}
		$data['dados'] = $dados;
		$data['view'] = 'admin/marcas/modulo';
		$data['navegacao'] = array('titulo' => 'Lista marcas', 'link' => 'admin/marcas');
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
			if ($this->input->post('id_marca'))
			{
				$id_marca = $this->input->post('id_marca');
				$data['ultima_atualizacao'] = dataDiaDB();
				$this->marcas_model->doUpdate($data, $id_marca);
				redirect('admin/marcas', 'refresh');
			}
			else
			{
				$this->marcas_model->doInsert($data);
				redirect('admin/marcas/modulo', 'refresh');
			}
		} else {
			$this->modulo();
		}
	}

	/**
	 * @param null $id_marca
	 */
	public function del($id_marca = NULL)
	{
		if ($id_marca)
		{
			$this->marcas_model->doDelete($id_marca);
			setMsg('msgCadastro', 'Marca removida com sucesso', 'sucesso');
			redirect('admin/marcas', 'refresh');
		}
		else
		{
			setMsg('msgCadastro', 'Você precisa selecionar uma marca', 'erro');
			redirect('admin/marcas', 'refresh');
		}
	}
}
