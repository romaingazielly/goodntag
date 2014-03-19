<?php get_header(); ?>

<main role="main">
		<!-- section -->
		<section>

			<h1>Mes favoris</h1>

			<?php
				$userId = get_current_user_id();
				$favString = get_user_meta($userId, 'product_fav', true);

				$favs = explode(',', $favString);
			?>

			<!-- fav loop -->
			<?php foreach($favs as $fav) :

				$product = get_post($fav);
				?>

				<div class="fav-product">
					<h4><?php echo $product->post_title; ?></h4>

					<?php
						$diaporama = get_field("image", $product->ID); 
						$image = array_pop($diaporama);
					?>
						 <img src="<?php echo $image["sizes"]["brand_slider"]; ?>" alt="" />
				
					<p>
						Marque : <?php echo get_post(get_post_meta($product->ID, 'brand', true))->post_title; ?>
					</p>
					<p>
						Prix : <?php echo get_field('prix', $product->ID); ?>
					</p>
				</div>
				
			<?php endforeach; ?>
		</section>

</main>

<?php get_footer(); ?>