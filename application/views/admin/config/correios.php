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
					<a href="<?php echo base_url('admin/dashboard') ?>" title="Voltar" class="btn btn-success"><i class="fa fa-arrow-alt-circle-left"></i> Voltar
					</a>
				</div>
			</div>
			<form class="form-horizontal" action="<?php echo base_url('admin/config/correios') ?>" method="post">
				<?php
				erroValidacao();
				getMsg('msgCadastro');
				?>
				<div class="form-group">
					<label for="cep_origem" class="col-sm-2 control-label">CEP da Origem</label>
					<div class="col-sm-10">
						<input type="text" name="cep_origem" id="cep_origem" class="form-control input_cep" placeholder="CEP da Origem" required value="<?= $query->cep_origem ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="frete" class="col-sm-2 control-label">Frete</label>
					<div class="col-sm-10">
						<input type="text" name="frete" id="frete" class="form-control input_moeda" placeholder="0,00" required value="<?= $query->frete ?>">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success"><i class="fa fa-check-circle-o"></i> Salvar </button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
