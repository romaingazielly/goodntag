<?php get_header(); ?>

<section class="contenu historique">
	<h1><span>Historique</span></h1>

	<?php 
		$userId = get_current_user_id();
		if ($history = get_user_meta($userId, 'product_history', true)) {
			$products = explode(',', $history);
		}

	?>

	<article class="fav-product">
			<ul>
				<?php foreach ($products as $id) : ?>
				<li data-product-id="<?php echo $id ?>">

				<?php $product = get_post($id); ?>
					<figure class="clear">
						<?php
							$diaporama = get_field("image", $product->ID);
							$image = array_pop($diaporama);
							$productUrl = site_url('/produit/'.$product->post_name);
							$marqueUrl = site_url('/marque/'.get_post(get_post_meta($product->ID, 'brand', true))->post_title);
						?>
						<a href="<?php echo $productUrl; ?>"><img src="<?php echo $image["sizes"]["large"]; ?>" alt="" /></a>
						<figcaption>
							<section class="fav-infos">
								<h2><a href="<?php echo $marqueUrl ?>"><?php echo get_post(get_post_meta($product->ID, 'brand', true))->post_title; ?></a></h2>
								<h3><a href="<?php echo get_permalink(); ?>"><?php echo $product->post_title; ?></a></h3>
								<h4>25 €</h4>
							</section>
							<p class="last-view">Vu le : <?php echo get_user_meta($userId, 'product_seen_'.$id, true); ?></p>
						</figcaption>
					</figure>
				</li>
				<?php endforeach; ?>
			</ul>
		</article>
</section>

<?php get_footer(); ?>