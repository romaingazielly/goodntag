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
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/normalize.min.css" /> 
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/common.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/marque.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/produit.css" />   

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

        var SITE_URL = "<?php bloginfo('url') ?>";
        </script>

        <script src="<?php echo ROOT; ?>/js/jquery.bxslider.min.js"></script>
        <script src="<?php echo ROOT; ?>/js/marque.js"></script>
        <script src="<?php echo ROOT; ?>/js/produit.js"></script> 
        <script src="<?php echo ROOT; ?>/js/dtap.js"></script>
        <script src="<?php echo ROOT; ?>/js/scripts.js"></script>

        <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-49219337-1', 'goodntag.com');
		  ga('send', 'pageview');

		  
		</script>
	</head>
	<body>

		<div class="wrapper container">
			<header class="header " role="banner">
				<a href="#" class="smart_menu"></a>
				<div class="logo">
					<a id="link_logo" href="<?php echo home_url(); ?>">
						<?php if (get_field("logo") ) {
							$logo = get_field("logo");
							echo '<img src='.$logo["url"].'>';
						}
						else {
							
						}
						?>
					</a>
				</div>

				<?php get_template_part('mobile-menu') ?>
			</header>

		            

