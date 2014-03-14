<?php get_header(); ?>

<?php $id = get_the_ID();?>
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

	<!-- Description -->
	<article class="description clear">
		<?php $logo = get_field("logo"); echo '<img src='.$logo["url"].'>'; ?>
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
  			</div>
  		<?php }	?>
  		</div>
	</article>
	<!-- Derniers produits ajoutés End -->

	<!-- Liens Externes -->
	<article class="brand_cat">
		<?php $rubriques = get_field("rubrique");
		foreach ($rubriques as $rubrique) { ?>
		<div class="brand_rubrique">
			<a href="<?php echo $rubrique['lien']; ?>" target="_blank"></a>
			<img src="<?php echo $rubrique['image']['sizes']['brand_rubrique'];?>" alt="" />
			<span class="black_rectangle"></span>
			<p><?php echo $rubrique['title']; ?></p>
		</div>
		<?php } ?>
	</article>
	<!-- Liens Externes End -->

	<!-- Points de vente -->
	<article class="map">
		<img src="<?php echo ROOT; ?>/img/map.jpg" alt="" />
	</article>
	<!-- Points de vente End -->

	<!-- Liens Réseaux sociaux -->
	<?php $bg_social = get_field('bg_social'); ?>
	<article class="social" style="background:url('<?php echo $bg_social['url']; ?>') center center no-repeat;">
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
			pause: 6000
		});
		$('.product_slider').bxSlider({
			infiniteLoop: false,
		    slideWidth: 150,
		    minSlides: 2,
		    maxSlides: 2,
		    controls:false,
		    touchEnabled: true
		  });
	});
</script>

<?php get_footer(); ?>
