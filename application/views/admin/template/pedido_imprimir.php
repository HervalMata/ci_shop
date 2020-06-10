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
	<?php $this->load->view($view); ?>
</div>
</body>
</html>
