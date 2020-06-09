<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $titulo ?>></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url('public/css/adminlte.css') ?>"/>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1><?= $loja->empresa ?></h1>
			<h3><?= $loja->email ?> - <?= $loja->telefone ?></h3>
		</div>
	</div>
	<hr>
	<h2>Dados do Comprador</h2>
	<div class="row">
		<div class="col-md-12 text-center">
			<table class="table table-striped table-bordered">
				<tr>
					<td class="text-left">Nome: </td>
					<td class="text-left"><?= $pedido->nome ?></td>
				</tr>
				<tr>
					<td class="text-left">Telefone: </td>
					<td class="text-left"><?= $pedido->telefone ?></td>
				</tr>
				<tr>
					<td class="text-left">Email: </td>
					<td class="text-left"><?= $pedido->email ?></td>
				</tr>
				<tr>
					<td class="text-left">Forma de Envio: </td>
					<td class="text-left"><?= ($pedido->forma_envio == 1 ? 'CORREIOS SEDEX' : 'CORREIOS PAC') ?></td>
				</tr>
			</table>
		</div>
	</div>
	<hr>
	<h2>Dados de Envio</h2>
	<div class="row">
		<div class="col-md-12 text-center">
			<table class="table table-striped table-bordered">
				<tr>
					<td>CEP</td>
					<td>Endereço</td>
					<td>Número</td>
					<td>Complemento</td>
					<td>Bairro</td>
					<td>Cidade</td>
					<td>Estado</td>
				</tr>
				<tr>
					<td><?= $pedido->cep ?></td>
					<td><?= $pedido->endereco ?></td>
					<td><?= $pedido->numero ?></td>
					<td><?= $pedido->complemento ?></td>
					<td><?= $pedido->bairro ?></td>
					<td><?= $pedido->cidade ?></td>
					<td><?= $pedido->estado ?></td>
				</tr>
			</table>
		</div>
	</div>
	<hr>
	<h2>Itens do Pedido</h2>
	<div class="row">
		<div class="col-md-12 text-center">
			<table class="table table-striped table-bordered">
				<tr>
					<td class="text-left">Item</td>
					<td>Quantidade</td>
					<td>Valor Unitário</td>
					<td>Valor Total</td>
				</tr>
				<?php foreach ($itens as $item) { ?>
					<tr>
						<td class="text-left"><?= $item->produto ?></td>
						<td><?= $item->quantidade ?></td>
						<td>R$ <?= formataMoedaReal($item->valor_unitario) ?></td>
						<td>R$ <?= formataMoedaReal($item->valor_total) ?></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<hr>
	<h3>Totais do Pedido</h3>
	<table class="table table-striped table-bordered">
		<tr>
			<td class="text-right">Total de Produtos....:</td>
			<td class="text-right">R$ <?= formataMoedaReal($pedido->total_produto) ?></td>
		</tr>
		<tr>
			<td class="text-right">Total Frete....:</td>
			<td class="text-right">R$ <?= formataMoedaReal($pedido->total_frete) ?></td>
		</tr>
		<tr>
			<td class="text-right">Total do Pedido....:</td>
			<td class="text-right">R$ <?= formataMoedaReal($pedido->total_pedido) ?></td>
		</tr>
	</table>
</div>
</body>
</html>
