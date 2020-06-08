<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model
{
	public function getClientes()
	{
		return $this->db->get('clientes')->result();
	}

	public function doInsert($dados = NULL)
	{
		if (is_array($dados))
		{
			$this->db->insert('clientes', $dados);
			if ($this->db->affected_rows() > 0)
			{
				setMsg('msgCadastro', 'Cliente cadastrado com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao cadastrar cliente', 'erro');
			}
		}
	}

	public function getClienteId($id_cliente = NULL)
	{
		if ($id_cliente)
		{
			$this->db->where('id', $id_cliente);
			$this->db->limit(1);
			$query = $this->db->get('clientes');
			return $query->row();
		}
	}

	public function doUpdate($dados = NULL, $id_cliente = NULL)
	{
		if (is_array($dados) && $id_cliente)
		{
			$this->db->update('clientes', $dados, array('id' => $id_cliente));
			if ($this->db->affected_rows() > 0)
			{
				setMsg('msgCadastro', 'Cliente atualizado com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao atualizar cliente', 'erro');
			}
		}
	}

	public function doDelete($id_cliente = NULL)
	{
		if ($id_cliente)
		{
			$this->db->delete('clientes', array('id' => $id_cliente));
			if ($this->db->affected_rows() > 0)
			{
				setMsg('msgCadastro', 'Cliente removido com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao remover cliente', 'erro');
			}
		}
	}
}
