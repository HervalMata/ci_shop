<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model
{
	public function getProdutos()
	{
		$this->db->select('produtos.*, marcas.nome_marca, categorias.nome_categoria');
		$this->db->from('produtos');
		$this->db->join('marcas', 'marcas.id = produtos.id_marca', 'left');
		$this->db->join('categorias', 'categorias.id = produtos.id_categoria', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function getMarcas()
	{
		$this->db->where('ativo', 1);
		return $this->db->get('marcas')->result();
	}

	public function getCategorias()
	{
		$this->db->where('ativo', 1);
		return $this->db->get('categorias')->result();
	}

	public function doInsert($dados = NULL)
	{
		if (is_array($dados))
		{
			$this->db->insert('produtos', $dados);
			if ($this->db->affected_rows() > 0)
			{
				$last_id = $this->db->insert_id();
				$this->session->set_userdata('last_id', $last_id);
				setMsg('msgCadastro', 'Marca cadastrada com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao cadastrar marca', 'erro');
			}
		}
	}

	public function doInsertFoto($dados = NULL)
	{
		if (is_array($dados))
		{
			$this->db->insert('produto_fotos', $dados);
		}
	}

	public function getProdutoId($id_produto = NULL)
	{
		if ($id_produto)
		{
			$this->db->where('id', $id_produto);
			$this->db->limit(1);
			$query = $this->db->get('produtos');
			return $query->row();
		}
	}

	public function getFotosProduto($id_produto = NULL)
	{
		if ($id_produto)
		{
			$this->db->where('id_produto', $id_produto);
			return $this->db->get('produto_fotos')->result();
		}
	}

	public function doUpdate($dados = NULL, $id_produto = NULL)
	{
		if (is_array($dados) && $id_produto)
		{
			$this->db->update('produtos', $dados, array('id' => $id_produto));
			if ($this->db->affected_rows() > 0)
			{
				setMsg('msgCadastro', 'Produto atualizado com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao atualizar produto', 'erro');
			}
		}
	}

	public function doDeleteFotoProduto($id_produto = NULL)
	{
		if ($id_produto)
		{
			$this->db->delete('produto_fotos', ['id_produto' => $id_produto]);
		}
	}

	public function doDelete($id_produto = NULL)
	{
		if ($id_produto)
		{
			$this->db->delete('produtos', array('id' => $id_produto));
			if ($this->db->affected_rows() > 0)
			{
				setMsg('msgCadastro', 'Produto removido com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao remover produto', 'erro');
			}
		}
	}
}
