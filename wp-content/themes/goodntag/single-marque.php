<?php get_header(); ?>

	<main role="main">

	<section>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>


		<article id="post-<?php the_ID(); ?>">

			

			<?php $diaporama = get_field("images"); 
	        if(!empty($diaporama)){ ?>
	            <ul class="brand_slider">

	                <?php foreach ($diaporama as $image){ ?>
	                    <li><img src="<?php echo $image["sizes"]["brand_slider"]; ?>" alt="" /></li>
	                <?php }   ?>
	            </ul>
	    	<?php } ?>

	    	<div class="brand_subtitle">
	    		<h1>COLLECTION PRINTEMPS 2013</h1>
	    	</div>

	    	<h1 id="brand_name">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>

			<div class="separator"></div>

			<div class="brand_description">
				<div id="btn_descr">Description</div>
				<div id="text_descr">
					<?php $descr = get_field("description");
					echo $descr; ?>
				</div>
			</div>

			<div class="latest_product">
				<h1>Derniers produits ajoutés:</h1>
				<?php
				$products = get_posts(array('post_type' => "produit", 'posts_per_page'=>2,'meta_key' => 'marque','order' => 'DESC', 'meta_value' => get_the_ID() ));
        		foreach ($products as $product){
          			$image = get_field("image", $product->ID);
          			$prix = get_field("prix", $product->ID);?>
          			
          			<div class="last_product">
          				<img src="<?php echo $image[0]['sizes']['brand_product']; ?>" alt="" />
          				<div class="last_product_infos">
          					<p id="product_brand"><?php echo the_title(); ?></p>
          					<p id="product_name"><?php echo $product->post_title;; ?></p>
          					<p id="product_price"><?php echo $prix; ?> €</p>
          				</div>
          			</div>
          		<?php }	?>
			</div>

			<div class="brand_cat">
				<?php $rubriques = get_field("rubrique");
				foreach ($rubriques as $rubrique) { ?>
				<div class="brand_rubrique">
					<a href="<?php echo $rubrique['lien']; ?>" target="_blank"></a>
					<img src="<?php echo $rubrique['image']['sizes']['brand_rubrique'];?>" alt="" />
					<p><?php echo $rubrique['title']; ?></p>
				</div>
				<?php } ?>
			</div>

			<div class="map">
				<img src="<?php echo ROOT; ?>/img/map.jpg" alt="" />
			</div>
			<?php $bg_social = get_field('bg_social'); ?>
			<div class="social" style="background:url('<?php echo $bg_social['url']; ?>') center center no-repeat;">
				<div class="block_share"><a class="google" href="<?php echo get_field('google') ?>" target="_blank">Google +</a></div>
				<div class="block_share"><a class="fb" href="<?php echo get_field('facebook') ?>" target="_blank">Facebook</a></div>
				<div class="block_share"><a class="twitter" href="<?php echo get_field('twitter') ?>" target="_blank">Twitter</a></div>
				<div class="block_share"><a class="insta" href="<?php echo get_field('insta') ?>" target="_blank">Instagram</a></div>
			</div>

		</article>


	<?php endwhile; ?>

	<?php else: ?>
		<article>
			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
		</article>
	<?php endif; ?>

	</section>

	</main>

	<script>
		$(document).ready(function(){
			$('.brand_slider').bxSlider({
				controls:false
			});
		});

	</script>
<?php get_footer(); ?>
