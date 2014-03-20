<?php get_header(); ?>

<section class="contenu favoris">
	<h1><span>Favoris</span></h1>

	<?php
		$userId = get_current_user_id();
		$favString = get_user_meta($userId, 'product_fav', true);

		$favs = explode(',', $favString);
	?>

	<!-- fav loop -->
	<?php foreach($favs as $fav) : $product = get_post($fav); ?>

		<article class="fav-product">
			<ul>
				<li>
					<figure class="clear">
						<?php
							$diaporama = get_field("image", $product->ID); 
							$image = array_pop($diaporama);
						?>
						<img src="<?php echo $image["sizes"]["brand_slider"]; ?>" alt="" />
						<figcaption>
							<section class="fav-infos">
								<h2><?php echo get_post(get_post_meta($product->ID, 'brand', true))->post_title; ?></h2>
								<h3><?php echo $product->post_title; ?></h3>
								<h4><?php echo get_field('prix', $product->ID); ?> €</h4>
							</section>
							<a href="#" class="remove-fav"></a>
						</figcaption>
					</figure>
				</li>
			</ul>
		</article>
		
	<?php endforeach; ?>
</section>

<?php get_footer(); ?>