<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model
{
	public function getCategorias()
	{
		return $this->db->get('categorias')->result();
	}

	public function getCategoriaPai()
	{
		$this->db->where('id_categoriaspai', NULL);
		return $this->db->get('categorias')->result();
	}

	public function getCategoriaPaiNome($id_categoriaspai = NULL)
	{
		if ($id_categoriaspai)
		{
			$this->db->where('id', $id_categoriaspai);
			$this->db->limit(1);
			$query = $this->db->get('categorias')->row();
			return $query->name_categoria;
		}
	}

	public function doInsert($dados = NULL)
	{
		if (is_array($dados))
		{
			$this->db->insert('categorias', $dados);
			if ($this->db->affected_rows() > 0)
			{
				setMsg('msgCadastro', 'Categoria cadastrada com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao cadastrar categoria', 'erro');
			}
		}
	}

	public function getCategoriaId($id_categoria = NULL)
	{
		if ($id_categoria)
		{
			$this->db->where('id', $id_categoria);
			$this->db->limit(1);
			$query = $this->db->get('categorias');
			return $query->row();
		}
	}

	public function doUpdate($dados = NULL, $id_categoria = NULL)
	{
		if (is_array($dados) && $id_categoria)
		{
			$this->db->update('categorias', $dados, array('id' => $id_categoria));
			if ($this->db->affected_rows() > 0)
			{
				setMsg('msgCadastro', 'Categoria atualizada com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao atualizar categoria', 'erro');
			}
		}
	}

	public function doDelete($id_categoria = NULL)
	{
		if ($id_categoria)
		{
			$this->db->delete('categorias', array('id' => $id_categoria));
			if ($this->db->affected_rows() > 0)
			{
				setMsg('msgCadastro', 'Categoria removida com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao remover categoria', 'erro');
			}
		}
	}
}
