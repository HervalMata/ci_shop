<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?= $titulo ?></h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<?php
					if (isset($navegacao))
					{
						echo '<li class="breadcrumb-item active"><a href="' . base_url($navegacao['link']) . '" title="' . $navegacao['titulo'] . '">' . $navegacao['titulo'] . '</a></li>';
					}
					?>
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
					<a href="<?php echo base_url('admin/clientes') ?>" title="Voltar" class="btn btn-success"><i class="fa fa-arrow-alt-circle-left"></i> Voltar
						 </a>
				</div>
			</div>
			<form action="<?php echo base_url('admin/clientes/core') ?>" class="form-horizontal" method="post" accept-charset="utf-8">

				<?php
					erroValidacao();
					getMsg('msgCadastro');
				?>

				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<label class="col-sm-4 control-label">Nome</label>
							<div class="col-sm-12">
								<input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo ( $dados != NULL ? $dados->nome : set_value('nome')) ?>">
							</div>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label class="col-sm-2 control-label">CPF</label>
							<div class="col-sm-6">
								<input type="text" name="cpf" class="form-control input_cpf" placeholder="CPF" value="<?php echo ( $dados != NULL ? $dados->cpf : set_value('cpf')) ?>">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-4 control-label">Data de Nascimento</label>
							<div class="col-sm-8">
								<input type="text" name="data_nascimento" class="form-control input_data" data-inputmask="'alias' : 'dd/mm/yyyy' " data-nask placeholder="Data de Nascimento" value="<?php echo ( $dados != NULL ? formataDataView($dados->data_nascimento) : set_value('data_nascimento')) ?>">
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-2 control-label">Telefone</label>
							<div class="col-sm-8">
								<input type="text" name="telefone" class="form-control input_telefone" placeholder="Telefone" value="<?php echo ( $dados != NULL ? $dados->telefone : set_value('telefone')) ?>">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<label class="col-sm-2 control-label">Endereço</label>
							<div class="col-sm-10">
								<input type="text" name="endereco" class="form-control" placeholder="Endereço" value="<?php echo ( $dados != NULL ? $dados->endereco : set_value('endereco')) ?>">
							</div>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label class="col-sm-2 control-label">CEP</label>
							<div class="col-sm-4">
								<input type="text" name="cep" class="form-control input_cep" placeholder="CEP" value="<?php echo ( $dados != NULL ? $dados->cep : set_value('cep')) ?>">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class="col-sm-2 control-label">Número</label>
							<div class="col-sm-6">
								<input type="text" name="numero" class="form-control" placeholder="Número" value="<?php echo ( $dados != NULL ? $dados->numero : set_value('numero')) ?>">
							</div>
						</div>
					</div>

					<div class="col-sm-8">
						<div class="form-group">
							<label class="col-sm-2 control-label">Complemento</label>
							<div class="col-sm-9">
								<input type="text" name="complemento" class="form-control" placeholder="Complemento" value="<?php echo ( $dados != NULL ? $dados->complemento : set_value('complemento')) ?>">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class="col-sm-2 control-label">Bairro</label>
							<div class="col-sm-8">
								<input type="text" name="bairro" class="form-control" placeholder="Bairro" value="<?php echo ( $dados != NULL ? $dados->bairro : set_value('bairro')) ?>">
							</div>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label class="col-sm-2 control-label">Cidade</label>
							<div class="col-sm-8">
								<input type="text" name="cidade" class="form-control" placeholder="Cidade" value="<?php echo ( $dados != NULL ? $dados->cidade : set_value('cidade')) ?>">
							</div>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label class="col-sm-2 control-label">Estado</label>
							<div class="col-sm-6">
								<input type="text" name="estado" class="form-control" placeholder="Estado" value="<?php echo ( $dados != NULL ? $dados->estado : set_value('estado')) ?>">
							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo ( $dados != NULL ? $dados->email : set_value('email')) ?>">
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-2 control-label">Senha</label>
							<div class="col-sm-8">
								<input type="password" name="senha" class="form-control" placeholder="Senha" value="<?php echo set_value('senha') ?>">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Status</label>
					<div class="col-sm-2">
					<select name="ativo" class="form-control">
						<?php if ($dados) { ?>
							<option value="0" <?= ($dados->ativo == 0 ? 'selected=""' : '') ?>>Não</option>
							<option value="1" <?= ($dados->ativo == 1 ? 'selected=""' : '') ?>>Sim</option>
						<?php } else { ?>
							<option value="0">Não</option>
							<option value="1" selected>Sim</option>
						<?php }?>

					</select>
					</div>
				</div>

				<?php if ($dados) { ?>
					<input type="hidden" name="id_cliente" value="<?= $dados->id ?>">
				<?php } ?>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success"><i class="fa fa-check-circle-o"></i> Salvar </button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
