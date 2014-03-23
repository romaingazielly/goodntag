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
							$productUrl = site_url('/produit/'.$product->post_name);
							$marqueUrl = site_url('/marque/'.get_post(get_post_meta($product->ID, 'brand', true))->post_title);
						?>
						<a href="<?php echo $productUrl ?>"><img src="<?php echo $image["sizes"]["large"]; ?>" alt="" /></a>
						<figcaption>
							<section class="fav-infos">
								<h2><a href="<?php echo $marqueUrl ?>"><?php echo get_post(get_post_meta($product->ID, 'brand', true))->post_title; ?></a></h2>
								<h3><a href="<?php echo $productUrl ?>"><?php echo $product->post_title; ?></a></h3>
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