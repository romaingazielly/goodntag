<?php get_header(); ?>

<?php $id = get_the_ID();?>

<?php 
	
	// geolocation
	$stores = get_posts('post_type=store');
	$lats = $lons = $addresses = $names = array();

	foreach ($stores as $k => $store) {
		if ($id == get_post_meta($store->ID, 'brand', true)[0]) {
			$coordinates = getCoordinatesFromAddress(get_post_meta($store->ID, 'address', true));
			$lats[] = $coordinates['lat'];
			$lons[] = $coordinates['lng'];
			$addresses[] = get_post_meta($store->ID, 'address', true);
			$names[] = $store->post_title;
		}
	}
	

?>
<section class="contenu page_marque" id="post-<?php the_ID(); ?>">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
	<!-- Slider -->
	<article class="slider_marque">
		<?php $diaporama = get_field("images"); 
        if(!empty($diaporama)){ ?>
            <ul class="brand_slider">
                <?php foreach ($diaporama as $image){ ?>
                    <li><img src="<?php echo $image["sizes"]["brand_slider"]; ?>" alt="" /></li>
                <?php }   ?>
            </ul>
    	<?php } ?>
    	<h1 class="brand_subtitle"><strong>COLLECTION PRINTEMPS</strong> 2013</h1>
    </article>
    <!-- Slider End -->

    <!-- Logo -->
    <article class="logo_marque">
    <?php $logo = get_field("logo"); ?>
		<div class="logo-container" style="height:<?php echo $logo['sizes']['small-height']; ?>px; max-height:<?php echo $logo['sizes']['small-height']; ?>px;">
			<?php echo '<img id="logo-big" height="100%" src="' . $logo["url"] . '" style="margin-left:' . ($logo["sizes"]["small-width"])/-2 . 'px;">'; ?>
		</div>
	</article>
	<!-- Logo End -->

	<!-- Description -->
	<article class="description clear">
		<h1>Description</h1>
		<div class="text-container">
			<p><?php echo get_field("description"); ?></p>
		</div>
		<a class="btn_suite description_off" href="#">Lire la suite <span class="arrow"></span></a>
	</article>
	<!-- Description End -->

	<!-- Derniers produits ajoutés -->
	<article class="latest_product clear">
		<h1>Derniers produits ajoutés</h1>
		<div class="product_slider">
		<?php
		$products = get_posts(array('post_type' => "produit", 'posts_per_page'=>6,'meta_key' => 'marque','order' => 'DESC', 'meta_value' => get_the_ID() ));
		foreach ($products as $product){
  			$image = get_field("image", $product->ID);
  			$prix = get_field("prix", $product->ID);?>
  			<div>
  				<a href="<?php echo $product->guid?>">
	      			<div class="last_product">
	      				<div class="last_product_img">
	      					<img src="<?php echo $image[0]['sizes']['brand_product']; ?>" alt="" />
	      				</div>
	      				<div class="last_product_infos">
	      					<p id="product_brand"><?php echo the_title(); ?></p>
	      					<p id="product_name"><?php echo $product->post_title; ?></p>
	      					<p id="product_price"><?php echo $prix; ?> €</p>
	      				</div>
	      			</div>
      			</a>
  			</div>
  		<?php }	?>
  		</div>
	</article>
	<!-- Derniers produits ajoutés End -->

	<!-- Liens Externes -->
	<article class="external_link">
		<ul>
		<?php $rubriques = get_field("rubrique");
		foreach ($rubriques as $rubrique) { ?>
		<li style="background:url('<?php echo $rubrique['image']['sizes']['brand_rubrique'];?> ') no-repeat; background-size:cover;">
			<a href="#"><span><?php echo $rubrique['title']; ?></span></a>
		</li>
		<?php }	?>
	</article>
	<!-- Liens Externes End -->

	<!-- Points de vente -->
	<article class="pts_vente">
		<h1><span>Point(s) de vente</span></h1>
		<div class="map">
			<?php echo generate_map_all($lats, $lons, $addresses, $names); ?>

			<script type="text/javascript">

			var getLocation = function () {
				navigator.geolocation.getCurrentPosition(function (position) {
					var lat = position.coords.latitude;
					var lon = position.coords.longitude;
					console.log(lat, lon);
					var myLatlng = new google.maps.LatLng(lat, lon);
					var marker = new google.maps.Marker({
					      position: myLatlng,
					      map: mapmap,
					      title: 'Ma position'
					  });

					mapmap.setCenter(myLatlng);
				});
			};

			getLocation();

			</script>
		</div>
	</article>
	<!-- Points de vente End -->

	<!-- Liens Réseaux sociaux -->
	<?php $bg_social = get_field('bg_social'); ?>
	<article class="social" style="background:url('<?php echo $bg_social['url']; ?>') center center no-repeat; background-size:cover;">
		<div class="block_share"><a class="google" href="<?php echo get_field('google') ?>" target="_blank">Google +</a></div>
		<div class="block_share"><a class="fb" href="<?php echo get_field('facebook') ?>" target="_blank">Facebook</a></div>
		<div class="block_share"><a class="twitter" href="<?php echo get_field('twitter') ?>" target="_blank">Twitter</a></div>
		<div class="block_share"><a class="insta" href="<?php echo get_field('insta') ?>" target="_blank">Instagram</a></div>
	</article>
	<!-- Liens Réseaux sociaux -->
<?php endwhile; ?>

<?php else: ?>
	<article>
		<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
	</article>
<?php endif; ?>
</section>

<script>
	$(document).ready(function(){
		var id = "<?php echo $id;?>";
		$('.brand_slider').bxSlider({
			auto: true,
			controls:false,
			touchEnabled: true,
			swipeThreshold: 100,
			pause: 6000
		});
		$('.product_slider').bxSlider({
			infiniteLoop: false,
		    slideWidth: 150,
		    minSlides: 2,
		    maxSlides: 2,
		    controls:false,
		    swipeThreshold: 100,
		    touchEnabled: true
		  });
	});
</script>

<?php get_footer(); ?>
