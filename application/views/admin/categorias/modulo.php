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
					<a href="<?php echo base_url('admin/categorias') ?>" title="Voltar" class="btn btn-success"><i class="fa fa-arrow-alt-circle-left"></i> Voltar
						 </a>
				</div>
			</div>
			<form action="<?php echo base_url('admin/categorias/core') ?>" class="form-horizontal" method="post" accept-charset="utf-8">

				<?php
					erroValidacao();
					getMsg('msgCadastro');
				?>


				<div class="form-group">
					<label class="col-sm-4 control-label">Nome</label>
					<div class="col-sm-12">
						<input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo ( $dados != NULL ? $dados->nome : set_value('nome')) ?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label">Categoria Pai</label>
					<div class="col-sm-4">
						<select name="id_categoriapai" class="form-control">
							<option></option>
							<?php foreach ($categoria_pai as $cat) { ?>
									<?php if ($dados) { ?>
										<option value="<? $cat->id ?>" <?= ($dados->id_categoriasPai = $cat->id ? 'selected=""' : '') ?>><?= $cat->nome ?></option>
									<?php } else { ?>
										<option value="<?= $cat->id ?>"><?= $cat->nome ?></option>
									<?php } ?>
							<?php } ?>
						</select>
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
