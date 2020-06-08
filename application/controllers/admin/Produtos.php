<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->library('form_validation');
		$this->load->model('produtos_model');
	}

	public function index()
	{
		$data['titulo'] = 'Lista de Produtos';
		$data['view'] = 'admin/produtos/listar';
		$data['produtos'] = $this->produtos_model->getProdutos();
		$this->load->view('admin/template/index', $data);
	}

	/**
	 * @param null $id_produto
	 */
	public function modulo($id_produto = NULL)
	{
		$dados = NULL;
		$fotos = NULL;
		if ($id_produto)
		{
			$data['titulo'] = 'Atualizar produto';
			$query = $this->produtos_model->getProdutoId($id_produto);
			if ($query) {
				$dados = $query;
				$fotos = $this->produtos_model->getFotosProduto($query->id);
			}
			if (!$dados)
			{
				setMsg('msgCadastro', 'Produto não encontrada', 'erro');
				redirect('admin/produtos', 'refresh');
			}
		}
		else
		{
			$data['titulo'] = 'Nova produto';
		}
		$data['dados'] = $dados;
		$data['view'] = 'admin/produtos/modulo';
		$data['marcas'] = $this->produtos_model->getMarcas();
		$data['categorias'] = $this->produtos_model->getCategorias();
		$data['fotos'] = $fotos;
		$data['navegacao'] = array('titulo' => 'Lista produtos', 'link' => 'admin/produtos');
		$this->load->view('admin/template/index', $data, FALSE);
	}

	/**
	 *
	 */
	public function core()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('valor', 'Valor', 'trim|required|min_length[5]');
		if ($this->form_validation->run() == TRUE){
			$data['codigo'] = $this->input->post('codigo');
			$data['nome'] = $this->input->post('nome');
			$data['valor'] = formataDecimal($this->input->post('valor'));
			$data['peso'] = $this->input->post('peso');
			$data['altura'] = $this->input->post('altura');
			$data['largura'] = $this->input->post('largura');
			$data['comprimento'] = $this->input->post('comprimento');
			$data['descricao'] = $this->input->post('descricao');
			$data['controlar_estoque'] = $this->input->post('controlar_estoque');
			$data['estoque'] = $this->input->post('estoque');
			if ($this->input->post('id_marca'))
			{
				$data['id_marca'] = $this->input->post('id_marca');
			}
			else
			{
				$data['id_marca'] = NULL;
			}
			if ($this->input->post('id_categoria'))
			{
				$data['id_categoria'] = $this->input->post('id_categoria');
			}
			else
			{
				$data['id_categoria'] = NULL;
			}
			$data['ativo'] = $this->input->post('ativo');
			$data['destaque'] = $this->input->post('destaque');
			if ($this->input->post('id_produto'))
			{
				$id_produto = $this->input->post('id_produto');
				$data['ultima_atualizacao'] = dataDiaDB();
				$this->produtos_model->doUpdate($data, $id_produto);
				$this->produtos_model->doDeleteFotoProduto($id_produto);
			}
			else
			{
				$data['data_cadastro'] = dataDiaDB();
				$this->produtos_model->doInsert($data);

			}
			$id_produto = $this->session->user_data('last_id');
			$foto_produto = $this->input->post('foto_produto');
			$t_foto = count($foto_produto);
			for ($i = 0; $t_foto; $i++)
			{
				$foto['id_produto'] = $id_produto;
				$foto['foto'] = $foto_produto[$i];
				$this->produtos_model->doInsertFoto($foto);
			}
			if ($this->input->post('id_produto'))
			{
				redirect('admin/produtos/', 'refresh');
			}
			else
			{
				redirect('admin/produtos/modulo', 'refresh');
			}
		} else {
			$this->modulo();
		}
	}

	public function upload()
	{
		$pasta = 'D:/Projetos/ci_shop/uploads/fotos_produtos/';
		$config['upload_path'] = $pasta;
		$config['allowed_types'] = 'jpg|png|gif';
		$config['max_size'] = 2048;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('foto_produto'))
		{
			$retorno['file_name'] = $this->upload->data('file_name');
			$retorno['msg'] = 'Foto enviada com sucesso';
			$retorno['erro'] = 0;
		}
		else
		{
			$retorno['msg'] = $this->upload->display_errors();
			$retorno['erro'] = 25;
		}
		echo json_encode($retorno);
	}

	/**
	 * @param null $id_produto
	 */
	public function del($id_produto = NULL)
	{
		if ($id_produto)
		{
			$this->produtos_model->doDelete($id_produto);
			setMsg('msgCadastro', 'Produto removido com sucesso', 'sucesso');
			redirect('admin/produtos', 'refresh');
		}
		else
		{
			setMsg('msgCadastro', 'Você precisa selecionar um produto', 'erro');
			redirect('admin/produtos', 'refresh');
		}
	}
}
