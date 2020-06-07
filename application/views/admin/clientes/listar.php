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
				<div class="col-md-12 text-right">
					<a href="<?php echo base_url('admin/clientes/modulo') ?>" title="Novo Cliente" class="btn btn-success"><i class="fa fa-plus-circle"></i> Novo
						Cliente </a>
				</div>
			</div>
			<?php getMsg('msgCadastro'); ?>
			<table id="table_listar_data-table" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Telefone</th>
					<th class="text-center">Status</th>
					<th class="text-right">Ações</th>
				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($clientes as $cliente) {?>
					<tr>
						<td><?= $cliente->nome ?></td>
						<td><?= $cliente->email ?></td>
						<td><?= $cliente->telefone ?></td>
						<td class="text-center"><?= ($cliente->ativo == 1 ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Inativo</span>') ?></td>
						<td class="text-right">

							<a href="<?= base_url('admin/clientes/modulo/' . $cliente->id) ?>" title="Editar" class="btn btn-warning"><i class="fa fa-edit"></i></a>
							<a href="<?= base_url('admin/clientes/del/' . $cliente->id) ?>" title="Remover" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
						</td>
					</tr>
				<?php }
				?>
				</tbody>
			</table>
		</div>
	</div>
</section>
