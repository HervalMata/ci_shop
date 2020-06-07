<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function setMsg($id, $msg, $tipo)
{
	$CI =& get_instance();
	switch ($tipo) {
		case 'erro':
			$CI->session->set_flashdata($id, '<div class="alert alert-danger" role="alert">' . $msg . '</div>' );
		case 'sucesso':
			$CI->session->set_flashdata($id, '<div class="alert alert-success" role="alert">' . $msg . '</div>' );
	}
	return FALSE;
}

function getMsg($id)
{
	$CI =& get_instance();
	if ($CI->session->flashdata($id)) {
		echo $CI->session->flashdata($id);
	}
}

function erroValidacao()
{
	if (validation_errors())
	{
		echo '<div class="alert alert-danger" role="alert">' . validation_errors() .'</div>';
	}
}

function dataDiaDB()
{
	date_default_timezone_get('America/Sao_paulo');
	$formato = 'DATE_W3C';
	$hora = time();
	return standard_date($formato, $hora);
}
