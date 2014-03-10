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

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
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
        <script src="<?php echo ROOT; ?>/js/produit.js"></script>  

	</head>
	<body>

		<div class="wrapper">

			<header class="header clear" role="banner">

					<div class="logo">
						<a id="link_logo" href="<?php echo home_url(); ?>">LOGO
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img"> -->
						</a>
					</div>

					<nav class="nav" role="navigation">

					</nav>


			</header>

