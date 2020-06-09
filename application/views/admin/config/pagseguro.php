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
			<form class="form-horizontal" action="<?php echo base_url('admin/config/pagseguro') ?>" method="post">
				<?php
				erroValidacao();
				getMsg('msgCadastro');
				?>
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="text" name="email" id="email" class="form-control" placeholder="Email" required value="<?= $query->email ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="token" class="col-sm-2 control-label">Token</label>
					<div class="col-sm-10">
						<input type="text" name="token" id="token" class="form-control" placeholder="Token" required value="<?= $query->token ?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Cartão</label>
					<div class="col-sm-2">
						<select name="cartao" class="form-control">
							<?php if ($query) { ?>
								<option value="0" <?= ($query->cartao == 0 ? 'selected=""' : '') ?>>Não</option>
								<option value="1" <?= ($query->cartao == 1 ? 'selected=""' : '') ?>>Sim</option>
							<?php } else { ?>
								<option value="0">Não</option>
								<option value="1" selected>Sim</option>
							<?php }?>

						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Débito</label>
					<div class="col-sm-2">
						<select name="debito" class="form-control">
							<?php if ($query) { ?>
								<option value="0" <?= ($query->debito == 0 ? 'selected=""' : '') ?>>Não</option>
								<option value="1" <?= ($query->debito == 1 ? 'selected=""' : '') ?>>Sim</option>
							<?php } else { ?>
								<option value="0">Não</option>
								<option value="1" selected>Sim</option>
							<?php }?>

						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Boleto</label>
					<div class="col-sm-2">
						<select name="boleto" class="form-control">
							<?php if ($query) { ?>
								<option value="0" <?= ($query->boleto == 0 ? 'selected=""' : '') ?>>Não</option>
								<option value="1" <?= ($query->boleto == 1 ? 'selected=""' : '') ?>>Sim</option>
							<?php } else { ?>
								<option value="0">Não</option>
								<option value="1" selected>Sim</option>
							<?php }?>

						</select>
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
