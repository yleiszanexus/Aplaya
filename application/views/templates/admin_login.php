<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon.png') ?>">
	<title><?= $title ?></title>
	<link href="<?= base_url('assets/node_modules/morrisjs/morris.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/node_modules/toast-master/css/jquery.toast.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style/style.min.css') ?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-confirm/jquery-confirm.min.css') ?>">
	<?php if(isset($css)){
		foreach ($css as $key => $cssextra) {
			echo '<link rel="stylesheet" type="text/css" href="'. base_url('assets/') . $cssextra . '.css">';
		}
	}?>
</head>
<body class="horizontal-nav skin-default fixed-layout">
	<?= $content ?>

	<script src="<?= base_url('assets/node_modules/jquery/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/popper/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/perfect-scrollbar.jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/waves.js') ?>"></script>
    <script src="<?= base_url('assets/js/sidebarmenu.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom.min.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/raphael/raphael-min.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/morrisjs/morris.min.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/jquery-sparkline/jquery.sparkline.min.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/toast-master/js/jquery.toast.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/toast-master/js/jquery.toast.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/jquery-confirm/jquery-confirm.min.js') ?>"></script>

	<?php if(isset($js)){
		foreach($js as $key => $jsextra){
			echo '<script type="text/javascript" src="'. base_url('assets/') . $jsextra .'.js"></script>';
		}
	}?>
</body>
</html>