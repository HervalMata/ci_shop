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
			<form class="form-horizontal" action="<?php echo base_url('admin/config/core') ?>" method="post">
				<?php
				erroValidacao();
				getMsg('msgCadastro');
				?>
				<div class="form-group">
					<label for="titulo" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
						<input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulo" required value="<?= $query->titulo ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="empresa" class="col-sm-2 control-label">Nome da Empresa</label>
					<div class="col-sm-10">
						<input type="text" name="empresa" id="empresa" class="form-control" placeholder="Nome da Empresa" required value="<?= $query->empresa ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="cep" class="col-sm-2 control-label">CEP</label>
					<div class="col-sm-10">
						<input type="text" name="cep" id="cep" class="form-control" placeholder="CEP" required value="<?= $query->cep ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="endereco" class="col-sm-2 control-label">Endereço</label>
					<div class="col-sm-10">
						<input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço" required value="<?= $query->endereco ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="complemento" class="col-sm-2 control-label">Complemento</label>
					<div class="col-sm-10">
						<input type="text" name="complemento" id="complemento" class="form-control" placeholder="Complemento" required value="<?= $query->complemento ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="bairro" class="col-sm-2 control-label">Bairro</label>
					<div class="col-sm-10">
						<input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" required value="<?= $query->bairro ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="cidade" class="col-sm-2 control-label">Cidade</label>
					<div class="col-sm-10">
						<input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" required value="<?= $query->cidade ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="estado" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<input type="text" name="estado" id="estado" class="form-control" placeholder="Estado" required value="<?= $query->estado ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="telefone" class="col-sm-2 control-label">Telefone</label>
					<div class="col-sm-10">
						<input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone" required value="<?= $query->telefone ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" name="email" id="email" class="form-control" placeholder="Email" required value="<?= $query->email ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="p_destaque" class="col-sm-2 control-label">Produtos Em Destaque</label>
					<div class="col-sm-10">
						<input type="text" name="p_destaque" id="p_destaque" class="form-control" placeholder="Produtos Em Destaque" required value="<?= $query->p_destaque ?>">
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
