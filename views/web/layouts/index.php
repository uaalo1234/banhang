<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="<?php echo asset('assets/web/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo asset('assets/web/css/font-awesome.min.css')?>" rel="stylesheet">
    <link href="<?php echo asset('assets/web/css/prettyPhoto.css') ?>" rel="stylesheet">
    <link href="<?php echo asset('assets/web/css/price-range.css') ?>" rel="stylesheet">
    <link href="<?php echo asset('assets/web/css/animate.css') ?>" rel="stylesheet">
	<link href="<?php echo asset('assets/web/css/main.css') ?>" rel="stylesheet">
	<link href="<?php echo asset('assets/web/css/responsive.css') ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo asset('assets/web/images/ico/favicon.ico') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <?php defineblock('styles')?>
</head><!--/head-->

<body>
	<?php include('views/web/layouts/includes/header.php') ?>
	
    <?php defineblock('slider'); ?>
    <div class="container">
        <div class="row">
            <?php defineblock('content'); ?>
        </div>
    </div>

	<?php include('views/web/layouts/includes/footer.php') ?>

    <script src="<?php echo asset('assets/web/js/jquery.js')?>"></script>
	<script src="<?php echo asset('assets/web/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo asset('assets/web/js/jquery.scrollUp.min.js')?>"></script>
	<script src="<?php echo asset('assets/web/js/price-range.js')?>"></script>
    <script src="<?php echo asset('assets/web/js/jquery.prettyPhoto.js')?>"></script>
    <script src="<?php echo asset('assets/web/js/main.js')?>"></script>

    <?php defineblock('scripts'); ?>
</body>
</html>