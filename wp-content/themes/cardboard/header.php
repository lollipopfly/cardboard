<!doctype html>
<html>
<head>
	<title><?=wp_title();?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php bloginfo('template_url'); ?>/images/favicon-32.png" rel="shortcut icon" type="image/x-icon">
	<!-- OPEN SANS FONT -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/bootstrap.min.css">

	<!-- BXSLIDER -->
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/jquery.bxslider.css">

	<!-- FONT-AWESOME -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/style.css" >

	<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_url'); ?>/js/libs/html5shiv.min.js"></script>
	<![endif]-->
	<?  wp_head() ?>
</head>
<body>
	<!-- begin wrap  -->
	<div class="wrap">
		<div class="container">
			<header class="header">
				<!-- begin row  -->
				<div class="row header-top">
					<div class="col-lg-8 col-md-9 col-sm-12 col-xs-12">
						<a href="/" class="logo"></a>
						<a href="/" class="logo-mini"></a>
					</div>

					<div class="col-lg-4 col-md-5 hidden-sm hidden-xs">
						<h1 class="main-title">Очки виртуальной реальности в Пензе</h1>
					</div>

					<div class="header-info col-lg-10 col-md-10 col-sm-12 col-xs-12 pull-right">
						<a href="tel:+79374008319" class="header-info__phone">+7 (937) <span>400-83-19</span></a>
						<a href="#" class="callback btn header-info__callback" data-toggle="modal" data-target="#callback-form">Заказать звонок</a>
						     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
					</div>
				</div>
				<!-- end row -->

				<!-- begin row  -->
				<div class="row">
					<div class="col-md-24">
						<nav class="navbar navbar-default">
						    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						      <?php wp_nav_menu('menu=main'); ?>
						    </div><!-- /.navbar-collapse -->
						  </div>
					</nav>
				</div>
				<!-- end row -->
			</header>
		</div>
		<!-- /.container -->
		<!-- begin container main  -->
		<div class="container main">
			<?if(!is_home()):?>
				<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
				    <? if(function_exists('bcn_display')) bcn_display();?>
				</div>
				<h1 class="page-title"><?=wp_title();?></h1>
			<?endif;?>
