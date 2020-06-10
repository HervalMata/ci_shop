<h2 class="text-center">Relatório de Produtos Mais Vendidos</h2>
<div class="row">
	<div class="col-md-12 text-center">
		<?php if($produtos) { ?>
		<table class="table table-striped table-bordered">
			<tr>
				<td>Código Produto</td>
				<td class="text-left">Nome do Produto</td>
				<td>Quantidade Vendida</td>
			</tr>
			<?php foreach ($produtos as $produto) { ?>
				<tr>
					<td><?= $produto->codigo ?></td>
					<td><?= $produto->nome ?></td>
					<td><?= $produto->quantidade ?></td>
				</tr>
			<?php } ?>
		</table>
		<?php } else { ?>
			<p class="text-center">Não existem produtos vendidos.</p>
		<?php } ?>
	</div>
</div>
