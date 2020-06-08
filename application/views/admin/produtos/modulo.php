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
					<a href="<?php echo base_url('admin/produtos') ?>" title="Voltar" class="btn btn-success"><i class="fa fa-arrow-alt-circle-left"></i> Voltar
						 </a>
				</div>
			</div>
			<form action="<?php echo base_url('admin/produtos/core') ?>" class="form-horizontal" method="post" accept-charset="utf-8">

				<?php
					erroValidacao();
					getMsg('msgCadastro');
				?>

				<div class="form-group">
					<label class="col-sm-4 control-label">Código</label>
					<div class="col-sm-4">
						<input type="text" name="codigo" class="form-control" placeholder="Código" value="<?php echo ( $dados != NULL ? $dados->codigo: set_value('codigo')) ?>">
					</div>
				</div>

				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<label class="col-sm-4 control-label">Nome</label>
							<div class="col-sm-12">
								<input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo ( $dados != NULL ? $dados->nome: set_value('nome')) ?>">
							</div>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label class="col-sm-4 control-label">Valor</label>
							<div class="col-sm-12">
								<input type="text" name="valor" class="form-control input_moeda" placeholder="Valor" value="<?php echo ( $dados != NULL ? $dados->valor: set_value('valor')) ?>">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label class="col-sm-4 control-label">Peso</label>
							<div class="col-sm-12">
								<input type="number" name="peso" class="form-control" placeholder="Peso" value="<?php echo ( $dados != NULL ? $dados->peso: set_value('peso')) ?>">
							</div>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label class="col-sm-4 control-label">Altura</label>
							<div class="col-sm-12">
								<input type="number" name="altura" class="form-control" placeholder="Altura" value="<?php echo ( $dados != NULL ? $dados->altura: set_value('altura')) ?>">
							</div>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label class="col-sm-4 control-label">Largura</label>
							<div class="col-sm-12">
								<input type="number" name="largura" class="form-control" placeholder="Largura" value="<?php echo ( $dados != NULL ? $dados->largura: set_value('largura')) ?>">
							</div>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label class="col-sm-4 control-label">Comprimento</label>
							<div class="col-sm-12">
								<input type="number" name="comprimento" class="form-control" placeholder="Comprimento" value="<?php echo ( $dados != NULL ? $dados->comprimento: set_value('comprimento')) ?>">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label">Descrição</label>
					<div class="col-sm-12">
						<textarea  name="descricao" rows="5" cols="10" class="form-control"><?php echo ( $dados != NULL ? $dados->valor: set_value('valor')) ?></textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-4 control-label">Controlar Estoque</label>
							<div class="col-sm-2">
								<select name="controlar_estoque" class="form-control">
									<?php if ($dados) { ?>
										<option value="0" <?= ($dados->controlar_estoque == 0 ? 'selected=""' : '') ?>>Não</option>
										<option value="1" <?= ($dados->controlar_estoque == 1 ? 'selected=""' : '') ?>>Sim</option>
									<?php } else { ?>
										<option value="0">Não</option>
										<option value="1" selected>Sim</option>
									<?php }?>

								</select>
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-4 control-label">Estoque</label>
							<div class="col-sm-12">
								<input type="number" name="estoque" class="form-control" placeholder="Estoque" value="<?php echo ( $dados != NULL ? $dados->estoque: set_value('estoque')) ?>">
							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class="col-sm-2 control-label">Marca</label>
							<div class="col-sm-10">
								<select name="id_marca" class="form-control">
									<option selected=""></option>
									<?php foreach ($marcas as $marca) { ?>
										<?php if ($dados) { ?>
											<option value="<?= $marca->id ?>"<?= ($marca->id == $dados->id_marca ? 'selected=""' : '') ?>>
												<?= $marca->nome_marca ?></option>
										<?php } else { ?>
											<option value="<?= $marca->id ?>"><?= $marca->nome_marca ?>></option>
										<?php }?>
									<?php }?>
								</select>
							</div>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label class="col-sm-2 control-label">Categoria</label>
							<div class="col-sm-10">
								<select name="id_categoria" class="form-control">
									<option selected=""></option>
									<?php foreach ($categorias as $cat) { ?>
										<?php if ($dados) { ?>
											<option value="<?= $cat->id ?>"<?= ($cat->id == $dados->id_categoria ? 'selected=""' : '') ?>>
												<?= $cat->nome_categoria ?></option>
										<?php } else { ?>
											<option value="<?= $cat->id ?>"><?= $cat->nome_categoria ?>></option>
										<?php }?>
									<?php }?>
								</select>
							</div>
						</div>
					</div>

					<div class="col-sm-2">
						<div class="form-group">
							<label class="col-sm-2 control-label">Destaque?</label>
							<div class="col-sm-8">
								<select name="destaque" class="form-control">
									<?php if ($dados) { ?>
										<option value="0" <?= ($dados->destaque == 0 ? 'selected=""' : '') ?>>Não</option>
										<option value="1" <?= ($dados->destaque == 1 ? 'selected=""' : '') ?>>Sim</option>
									<?php } else { ?>
										<option value="0">Não</option>
										<option value="1" selected>Sim</option>
									<?php }?>

								</select>
							</div>
						</div>
					</div>

					<div class="col-sm-2">
						<div class="form-group">
							<label class="col-sm-2 control-label">Status</label>
							<div class="col-sm-8">
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
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Fotos do Produto</label>
					<div class="col-sm-4">
						<div id="file_uploader_fotos_produto">Upload</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-10 retorno_fotos_produto">
						<div class="col-sm-3 img_foto_produtos_view">
							<?php if ($fotos) { ?>
								<?php foreach ($fotos as $f) { ?>
									<img src="<?= base_url('uploads/fotos_produtos/' . $f->foto) ?>">
									<input type="hidden" name="foto_produto[]" value="<?= $f->foto ?>">
									<a href="#" class="btn btn-danger btn-remover-foto"><i class="fa fa-trash-o"></i> Remover</a>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>

				<?php if ($dados) { ?>
					<input type="hidden" name="id_produto" value="<?= $dados->id ?>">
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
