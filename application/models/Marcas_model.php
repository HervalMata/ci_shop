<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas_model extends CI_Model
{
	public function getMarcas()
	{
		return $this->db->get('marcas')->result();
	}

	public function doInsert($dados = NULL)
	{
		if (is_array($dados))
		{
			$this->db->insert('marcas', $dados);
			if ($this->db->affected_rows() > 0)
			{
				setMsg('msgCadastro', 'Marca cadastrada com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao cadastrar marca', 'erro');
			}
		}
	}

	public function getMarcaId($id_marca = NULL)
	{
		if ($id_marca)
		{
			$this->db->where('id', $id_marca);
			$this->db->limit(1);
			$query = $this->db->get('marcas');
			return $query->row();
		}
	}

	public function doUpdate($dados = NULL, $id_marca = NULL)
	{
		if (is_array($dados) && $id_marca)
		{
			$this->db->update('marcas', $dados, array('id' => $id_marca));
			if ($this->db->affected_rows() > 0)
			{
				setMsg('msgCadastro', 'Marca atualizada com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao atualizar marca', 'erro');
			}
		}
	}
}
