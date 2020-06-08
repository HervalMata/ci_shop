$(document).ready(function () {
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
