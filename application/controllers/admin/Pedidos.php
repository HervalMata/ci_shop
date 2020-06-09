<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}
		$this->load->library('form_validation');
		$this->load->model('pedidos_model');
	}

	public function index()
	{
		$data['titulo'] = 'Lista de Pedidos';
		$data['view'] = 'admin/pedidos/listar';
		$data['pedidos'] = $this->pedidos_model->getPedidos();
		$this->load->view('admin/template/index', $data);
	}

	public function getPedido($id = NULL)
	{
		if (!$id)
		{
			$retorno['erro'] = 58;
			$retorno['msg'] = 'Erro você deve informar um ID válida';
			echo json_encode($retorno);
			exit;
		}
		$query = $this->pedidos_model->getPedidoId($id);
		if (!$query)
		{
			$retorno['erro'] = 59;
			$retorno['msg'] = 'Erro não foi encontrado nemhum pedido com o ID informado';
			echo json_encode($retorno);
			exit;
		}
		switch ($query->status) {
			case 1:
				$status = 'Aguardando Pagamento';
				break;
			case 2:
				$status = 'Aguardando Confirmado';
				break;
			case 3:
				$status = 'Pedido Enviado';
				break;
			default:
				$status = 'Cancelado';
				break;
		}
		$retorno['id_pedido'] = $query->id;
		$retorno['status'] = $status;
		$retorno['erro'] = 0;
		echo json_encode($retorno);
		exit;
	}

	public function mudarStatus()
	{
		if ($this->input->post('input_status'))
		{
			$id_pedido = $this->input->post('input_id');
			$pedido['status'] = $this->input->post('input_status');
			$pedido['ultima_atualizacao'] = dataDiaDB();
			$this->pedidos_model->doUpdate($pedido, $id_pedido);
			$retorno['erro'] = 0;
			$retorno['msg'] = 'Pedido atualizado com sucesso';
			echo json_encode($retorno);
			exit;
		}
		else
		{
			$retorno['erro'] = 60;
			$retorno['msg'] = 'O campo status é obrigatório';
			echo json_encode($retorno);
			exit;
		}
	}

	public function imprimir($id_pedido = NULL)
	{
		if (!$id_pedido)
		{
			echo 'Erro vocè deve informar um ID válido.';
			exit;
		}
		$query = $this->pedidos_model->getPedidoId($id_pedido);
		if (!$query)
		{
			echo 'Erro não foi encontrado nemhum pedido com o ID informado';
			exit;
		}
		$data['titulo'] = 'Imprimir pedido [ #' . $query->id . ']';
		$data['pedido'] = $query;
		$data['loja'] = $this->pedidos_model->getDadosLoja();
		$data['itens'] = $this->pedidos_model->getItens($query->id);
		$this->load->view('admin/template/pedido_imprimir', $data);
	}
}
