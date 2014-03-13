<?php

$root = get_template_directory_uri();
define(ROOT, $root);
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/produit.css" />  
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/normalize.css" />  
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/jquery.bxslider.css" />
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/icons.css" /> -->
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/component.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/demo.css" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="description" content="<?php bloginfo('description'); ?>">

			

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
        <script src="<?php echo ROOT; ?>/js/jquery.bxslider.min.js"></script>  
        <script src="<?php echo ROOT; ?>/js/classie.js"></script> 
        <script src="<?php echo ROOT; ?>/js/mlpushmenu.js"></script>
        <script src="<?php echo ROOT; ?>/js/produit.js"></script> 
        <script src="<?php echo ROOT; ?>/js/dtap.js"></script>
        <script src="<?php echo ROOT; ?>/js/scripts.js"></script>

	</head>
	<body>

		<div class="wrapper container">
			<div class="mp-pusher" id="mp-pusher">
				<header class="header " role="banner">

						<div class="logo">
							<a id="link_logo" href="<?php echo home_url(); ?>">LOGO
								<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
								<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img"> -->
							</a>
						</div>

						<!-- mp-menu -->
						<nav id="mp-menu" class="mp-menu">
							<div class="mp-level">
								<ul>
									<li class="icon icon-arrow-left">
										<a class="icon icon-display" href="#">Mes Infos</a>
										<div class="mp-level">
											<h2 class="icon icon-display">Mes Infos</h2>
											<a class="mp-back" href="#">Retour</a>
											<ul>
												<li class="icon icon-arrow-right"><a class="icon" href="#">Mobile Phones</a></li>
												<li class="icon icon-arrow-right"><a class="icon" href="#">Televisions</a></li>
												<li class="icon icon-arrow-right"><a class="icon" href="#">Cameras</a></li>
											</ul>
										</div>
									</li>
									<li class="icon"><a class="icon icon-news" href="#">Favoris</a></li>
									<li class="icon"><a class="icon icon-shop" href="#">Badge</a></li>
									<li><a class="icon icon-photo" href="#">Historique</a></li>
									<li><a class="icon icon-wallet" href="#">Tenues</a></li>
								</ul>
									
							</div>
						</nav>
						<!-- /mp-menu -->


				</header>
				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
		            <div class="scroller-inner">
		                <div class="nav" id="trigger"></div>

		            

