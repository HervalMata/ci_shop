<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?= $titulo ?></h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="breadcrumb-item active"><?= $titulo ?></li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<div class="row" style="margin-bottom: 20px">
				<div class="col-md-12">
					<div class="btn-group">
						<button type="button" class="btn btn-success"><i class="fa fa-file-text-o"></i> Relatórios</button>
						<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="<?= base_url('admin/relatorios/diario') ?>" target="_blank">Vendas Diárias</a> </li>
							<li><a href="<?= base_url('admin/relatorios/periodo') ?>" target="_blank">Vendas Por Periodo</a> </li>
							<li><a href="<?= base_url('admin/relatorios/mais_vendidos') ?>" target="_blank">Produtos Mais Vendidos</a> </li>
						</ul>
					</div>
				</div>
			</div>
			<?php getMsg('msgCadastro'); ?>
			<table id="table_listar_data-table" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>Número Pedido</th>
					<th>Cliente</th>
					<th>Total</th>
					<th class="text-center">Status</th>
					<th class="text-right">Ações</th>
				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($pedidos as $pedido) {?>
					<tr>
						<td><?= $pedido->id ?></td>
						<td><?= $pedido->nome ?></td>
						<td>R$ <?= formataMoedaReal($pedido->total_pedido) ?></td>
						<td class="text-center">
							<?php
								switch ($pedido->status) {
									case 1:
										echo 'Aguardando Pagamento';
										break;
									case 2:
										echo 'Pagamento Confirmado';
										break;
									case 3:
										echo 'Pedido Enviado';
										break;
									default:
										echo 'Cancelado';
										break;
								}
							?></td>
						<td class="text-right">
							<button title="Editar" class="btn btn-warning btn-mudar-status-pedido" data-toggle="modal" data-id-pedido="<?= $pedido->id ?>"><i class="fa fa-edit"></i> Mudar Status</button>
							<button href="<?= base_url('admin/pedidos/codigo_rastreio') ?>" title="Remover" class="btn btn-secondary btn-cod-rastreio-pedido"  data-id-pedido="<?= $pedido->id ?>"><i class="fa fa-truck"></i> Código Rastreio</button>
							<a href="<?= base_url('admin/pedidos/imprimir/' . $pedido->id) ?>" target="_blank" title="Imprimir" class="btn btn-primary"><i class="fa fa-print"> Imprimir</i></a>
						</td>
					</tr>
				<?php }
				?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<div class="modal_dinamico"></div>
