<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model
{
	public function getConfig()
	{
		$this->db->where('id', 1);
		$this->db->limit(1);
		$query = $this->db->get('config');
		return $query->row();
	}

	public function doUpdate($dados = NULL, $condicao = NULL)
	{
		if (is_array($dados) && $condicao)
		{
			$this->db->update('config', $dados, array('id' => $condicao));
			if ($this->db->affected_rows() > 0)
			{
				setMsg('msgCadastro', 'Configuração atualizada com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao atualizar configuração', 'erro');
			}
		}
	}

	public function getConfigPagseguro()
	{
		$this->db->where('id', 1);
		$this->db->limit(1);
		$query = $this->db->get('config_pagseguro');
		return $query->row();
	}

	public function doUpdatePagseguro($dados = NULL)
	{
		if (is_array($dados))
		{
			$this->db->update('config_pagseguro', $dados, array('id' => 1));
			if ($this->db->affected_rows() > 0)
			{
				setMsg('msgCadastro', 'Configuração atualizada com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao atualizar configuração', 'erro');
			}
		}
	}

	public function getConfigCorreios()
	{
		$this->db->where('id', 1);
		$this->db->limit(1);
		$query = $this->db->get('config_correios');
		return $query->row();
	}

	public function doUpdateCorreios($dados = NULL)
	{
		if (is_array($dados))
		{
			$this->db->update('config_correios', $dados, array('id' => 1));
			if ($this->db->affected_rows() > 0)
			{
				setMsg('msgCadastro', 'Configuração atualizada com sucesso', 'sucesso');
			}
			else
			{
				setMsg('msgCadastro', 'Erro ao atualizar configuração', 'erro');
			}
		}
	}
}
