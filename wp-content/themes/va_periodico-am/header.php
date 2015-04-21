<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->	
	<?php wp_head(); ?> 
</head>
<body <?php body_class(); ?> >
	<div class="container">
		<div class="main">
		<header class="row">
			<div id="main-logo" class="col-sm-6">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
					<img src="<?php echo bloginfo('template_url') .'/images/logo-periodico-am.png' ?>" alt="Periódico Área Metropolitana">
				</a>
				<a href="http://www.metropol.gov.co" class="pull-right">
					<img src="<?php echo bloginfo('template_url') .'/images/logo-amva.png' ?>" alt="Área Metropolitana del Valle del Aburrá">
				</a>
			</div>
			<div class="col-sm-6">
				<div class="barra-util">
					<span><?php echo date_i18n('l j \d\e F \d\e Y', time()); ?></span>
					<form id="form-search" class="navbar-form navbar-right" role="search">
			        	<?php get_search_form(); ?>
			      	</form>
				</div>
				<div class="top-ads"> Este espacio esta pensado para usted. </div>
				<!-- Espacio publicitario -->
				<!-- <div class="top-ads"><?php //dynamic_sidebar( "widget-ads-horizontal" ); ?></div> -->
			</div>
		</header>
		<?php

		/**
		 * Menu Wordpress con Bootstrap tipo desplegables  
		 * bt_menu
		 * @return HTML
		 * @author Pablo Martinez
		**/

			bt_menu();

		?>
