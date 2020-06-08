<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo $titulo ?></h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="breadcrumb-item active"><?php echo $titulo ?></li>
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
					<a href="<?php echo base_url('admin/usuarios/modulo') ?>" title="Novo Usuario" class="btn btn-success"><i class="fa fa-plus-circle"></i> Novo
						Usuário </a>
				</div>
			</div>
			<?php getMsg('msgCadastro'); ?>
			<table id="table_listar_data-table" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th class="text-center">Status</th>
					<th class="text-right">Ações</th>
				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($usuarios as $user) {
					echo '<tr>';
					echo '<td>' . $user->username . '</td>';
					echo '<td>' . $user->email . '</td>';
					echo '<td class="text-center">' . ($user->active == 1 ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Inativo</span>') . '</td>';
					echo '<td class="text-right">';

					echo '<a href="' . base_url('admin/usuarios/modulo/' . $user->id) . '" title="Editar" class="btn btn-warning"><i class="fa fa-edit"></i></a>';
					echo '<a href="' . base_url('admin/usuarios/del/' . $user->id) . '" title="Remover" class="btn btn-danger btn-remover-registro"><i class="fa fa-trash-alt"></i></a>';
					echo '</td>';
					echo '</tr>';
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</section>
