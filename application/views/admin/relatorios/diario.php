<h2 class="text-center">Relatório de Pedidos <?= formataDataView(dataDb()) ?></h2>
<div class="row">
	<div class="col-md-12 text-center">
		<?php if($dados) { ?>
		<table class="table table-striped table-bordered">
			<tr>
				<td>Número Pedido</td>
				<td>Cliente</td>
				<td>Tipo Frete</td>
				<td>Total de Produtos</td>
				<td>Valor Frete</td>
				<td>Total</td>
			</tr>
			<?php
			$t_frete = 0;
			$t_pedido = 0;
			?>

			<?php foreach ($dados as $dado) { ?>
				<tr>
					<td><?= $dado->id ?></td>
					<td><?= $dado->nome ?></td>
					<td><?= ($dado->forma_envio = 1 ? 'SEDEX' : 'PAC') ?></td>
					<td><?= $dado->total_produto ?></td>
					<td>R$ <?= formataMoedaReal($dado->total_frete) ?></td>
					<td>R$ <?= formataMoedaReal($dado->total_pedido) ?></td>
				</tr>
				<?php
				$t_frete = $t_frete + $dado->total_frete;
				$t_pedido = $t_pedido + $dado->total_pedido;
				?>
			<?php } ?>
			<tr>
				<td colspan="5" class="text-right">Total Frete</td>
				<td>R$ <?= formataMoedaReal($t_frete) ?></td>
			</tr>
			<tr>
				<td colspan="5" class="text-right">Total Pedido</td>
				<td>R$ <?= formataMoedaReal($t_pedido) ?></td>
			</tr>
			<tr>
				<td colspan="5" class="text-right">Total Pago</td>
				<td>R$ <?= formataMoedaReal($t_pedido + $t_frete) ?></td>
			</tr>
		</table>
		<?php } else { ?>
			<p class="text-center">Não existem pedidos para esta data.</p>
		<?php } ?>
	</div>
</div>
