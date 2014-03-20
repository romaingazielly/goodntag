<?php get_header(); ?>

<section class="contenu favoris">
	<h1><span>Favoris</span></h1>

	<?php
		$userId = get_current_user_id();
		$favString = get_user_meta($userId, 'product_fav', true);

		if ('' == $favString) :
	?>
		<p class="no-fav">Vous n'avez pas de favoris</p>
	<?php else: $favs = explode(',', $favString); ?>

		<article class="fav-product">
			<ul>
			<!-- fav loop -->
				<?php foreach($favs as $fav) : $product = get_post($fav); ?>
				<li data-product-id="<?php echo $product->ID; ?>">
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
				<?php endforeach; ?>
			</ul>
		</article>

	<?php endif; ?>
</section>

<?php get_footer(); ?>