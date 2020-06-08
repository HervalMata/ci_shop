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
					<a href="<?php echo base_url('admin/categorias/modulo') ?>" title="Novo Categoria" class="btn btn-success"><i class="fa fa-plus-circle"></i> Novo
						Categoria </a>
				</div>
			</div>
			<?php getMsg('msgCadastro'); ?>
			<table id="table_listar_data-table" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>Nome</th>
					<th>Categoria Pai</th>
					<th class="text-center">Status</th>
					<th class="text-right">Ações</th>
				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($categorias as $cat) {?>
					<tr>
						<td><?= $cat->nome ?></td>
						<td><?= $this->categorias_model->getCategoriaPaiNome($cat->id_categoriaspai) ?></td>
						<td class="text-center"><?= ($cat->ativo == 1 ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Inativo</span>') ?></td>
						<td class="text-right">

							<a href="<?= base_url('admin/categorias/modulo/' . $cat->id) ?>" title="Editar" class="btn btn-warning"><i class="fa fa-edit"></i></a>
							<a href="<?= base_url('admin/categorias/del/' . $cat->id) ?>" title="Remover" class="btn btn-danger btn-remover-registro"><i class="fa fa-trash-alt"></i></a>
						</td>
					</tr>
				<?php }
				?>
				</tbody>
			</table>
		</div>
	</div>
</section>
