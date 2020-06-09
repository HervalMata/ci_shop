$(document).ready(function () {
	$('#file_uploader_fotos_produto').uploadFile({
		url: "http://localhost:8080/admin/produtos/upload",
		fileName: "foto_produto",
		returnType: 'json',
		onSuccess: function (file, data) {
			$('.ajax-file-upload-statusbar').hide();
			if (data.erro == 0) {
				$('.retorno_fotos_produto').append('<div class="col-sm-3 img_foto_produtos_view"><img src="http://localhost:8080/uploads/fotos_produtos/' + data.file_name + '"><input type="hidden" value="' + data.file_name + '" name="foto_produto[]" </div><a href="#" class="btn btn-danger btn-remover-foto"><i class="fa fa-trash-o"></i> Remover</a>');
			} else {
				alert(data.msg);
			}
		}
	})
	$(document).on('click', 'btn-remover-foto', function () {
		if (confirm("Deseja remover essa foto?")) {
			$(this).parent().remove();
		}
		else {
			return false;
		}
	})
	$(document).on('click', '.btn-mudar-status-pedido', function () {
		var id = $(this).attr('data-id-pedido');
		$.ajax({
			type: "GET",
			url: "http://localhost:8080/admin/pedidos/getPedido/" + id + "",
			dataType: "json",
			success: function (resposta) {
				if (resposta.erro === 0) {
					$('.modal_dinamico').append('<div class="modal fade" data-backdrop="static" id="modal_pedido' + id + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +
															'<div class="modal-dialog" role="document">' +
																'<div class="modal-content">' +
																	'<div class="modal-header">' +
																		'<h4 class="modal-title" id="myModalLabel">Mudar Status do Pedido [#' + resposta.id_pedido + ']</h4>' +
																		'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
																	'</div>'+
																	'<div class="modal-body">' +
																		'<p>Status atual: ' + resposta.status + '</p>'+
																		'<form method="post" action="http://localhost:8080/admin/pedidos/mudarStatus/">'+
																		'<div class="form-group">' +
																		'<label class="col-sm-3 control-label">Mudar Status</label>'+
																		'<div class="col-sm-7">'+
																			'<select name="status" class="form-control">'+
																				'<option value="1">Aguardando Pagamento</option>'+
																				'<option value="2">Pagamento Confirmado</option>'+
																				'<option value="3">Pedido Enviado</option>'+
																				'<option value="4">Pedido Cancelado</option>'+
																			'</select>'+
																		'</div>'+
																	'</div>' +
																	'</form>'+
																	'</div>'+
																	'<div class="modal-footer">' +
																		'<button type="button" class="btn btn-default" data-dimiss="modal">Fechar</button>'+
																		'<button type="button" class="btn btn-primary btn-atualizar-status-pedido" data-id-pedido="' + id + '">Atualizar</button>'+
																	'</div>'+
																'</div>' +
															'</div>' +
														'</div>');
					$('#modal_pedido' + id ).modal('show');
					$('#modal_pedido' + id ).on('hidden.bs.modal', function (e) {
						$(this).remove();
					})
				} else {
					alert(resposta.msg);
				}
			},
			error: function () {
				alert('Erro ao buscar pedido');
			}
		})

	})
	$(document).on('click', '.btn-atualizar-status-pedido', function () {
		var status = $('[name="status"]').val();
		var id_pedido = $(this).attr('data-id-pedido');
		$.ajax({
			type: "POST",
			url: "http://localhost:8080/admin/pedidos/mudarStatus",
			data: {input_status: status, input_id: id_pedido},
			dataType: "json",
			success: function (resposta) {
				if (resposta.erro === 0) {
					alert('Status atualizado com sucesso!');
				} else {
					alert('Erro ao mudar o status');
				}
			},
			error: function () {
				alert('Erro ao salvar o status');
			}
			});
	})
	$('.btn-remover-registro').on('click', function () {
		if (confirm("Deseja remover esse registro?")) {
			return true;
		}
		else {
			return false;
		}
	})
	$('.input_data').mask('00/00/0000');
	$('.input_cep').mask('00000-000');
	$('.input_cpf').mask('000.000.000-00');
	$('.input_moeda').mask('000.000.000.000.000,00', {reverse: true});
	var SPMaskBehavior = function(val) {
		return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 00000-0009';
	},
	spOptions = {
		onkeypress: function (val, e, field, options) {
			field.mask(SPMaskBehavior.apply({}, arguments), options);
		}
	};
	$('.input_telefone').mask(SPMaskBehavior, spOptions);
	$('#table_listar_data-table').DataTable({
		"language": {
			"sEmptyTable": "Nenhum registro encontrado",
			"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
			"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
			"sInfoFiltered": "(Filtrados de _MAX_ registros)",
			"sInfoPostFix": "",
			"sInfoThousands": ".",
			"sLengthMenu": "_MENU_ Resultados por página",
			"sLoadingRecords": "Carregando...",
			"sProcessing": "Processando...",
			"sZeroRecords": "Nenhum registro encontrado",
			"sSearch": "Pesquisar",
			"oPaginate": {
				"sNext": "Próximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "Último"
			},
			"oAria": {
				"sSortAscending": ": Ordenar colunas de forma ascendente",
				"sSortDescending": ": Ordenar colunas de forma descendente"
			},
			"select": {
				"rows": {
					"_": "Selecionado %d linhas",
					"0": "Nenhuma linha selecionada",
					"1": "Selecionado 1 linha"
				}
			},
			"buttons": {
				"copy": "Copiar para a área de transferência",
				"copyTitle": "Cópia bem sucedida",
				"copySuccess": {
					"1": "Uma linha copiada com sucesso",
					"_": "%d linhas copiadas com sucesso"
				}
			}
		}
	})
})
