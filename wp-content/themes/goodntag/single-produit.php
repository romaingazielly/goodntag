<?php get_header(); ?>

<section class="content_product">

	<!-- Slider -->
	<article id="slider_product">
		<?php 
			$attachment_id = get_field('image');
			$image = ($attachment_id[0][url]); 
		?>
		<div class="slider_img" style="background:url('<?php echo $image?>') no-repeat; background-size:cover;">
			<p id="product_price"><?php echo get_field("prix", $product->ID); ?> €</p>
			<a href="#" id="btn_vote"></a>
		</div>
		<h1 id="product_name"><?php echo $post->post_title ?></h1>

		<!-- Popin Rating -->
		<section class="product_vote">
			<article class="vote">
				<ul class="smiley">
					<li class="active" id="vote_bad"><a href="#" title="Bad"></a></li>
					<li id="vote_neutral"><a href="#" title="Neutre"></a></li>
					<li id="vote_good"><a href="#" title="Good"></a></li>
				</ul>
				<aside class="resultats_vote">
					<ul>
						<li id="vote_bad_results"><span>0%</span></li>
						<li id="vote_neutral_results"><span>0%</span></li>
						<li id="vote_good_results"><span>100%</span></li>
					</ul>
				</aside>
			</article>
		</section>
		<!-- Popin Rating End -->

		<!-- Popin Favoris -->
		<section class="favoris">
			<img src="<?php echo ROOT?>/img/fav.png">
		</section>
		<!-- Popin Favoris End -->

	</article>
	<!-- Slider End -->

	<hr>

	<!-- Infos Lavage -->
	<article class="infos_lavage">
		<ul>
			<li id="picto1"><a href="#"></a></li>
			<li id="picto2"><a href="#"></a></li>
			<li id="picto3"><a href="#"></a></li>
			<li id="picto4"><a href="#"></a></li>
			<li id="picto5"><a href="#"></a></li>
		</ul>
	</article>
	<!-- Infos Lavage End -->

	<!-- Promotion -->
	<article class="promotion clear">
		<div class="button">
			<div class="cadenas lock"></div>
			<div class="zone_promo">promo</div>
			<div class="montant_promo">15%</div>
		</div>
	</article>
	<!-- Promotion End -->

	<!-- Description -->
	<article class="description">
		<a id="description" href="#" class="description_off"></a>
		<h1>M / BLANC / 100% COTON</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum id velit vitae faucibus. Nam elementum Nullam vitae mauris sapien Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum id velit vitae faucibus. Nam elementum Nullam vitae mauris sapien</p>
	</article>
	<!-- Description End -->

	<!-- Liens Externes -->
	<article class="external_links">
		<a href="#" target="_blank"><img src="<?php echo ROOT;?>/img/sfa_histoire.jpg"></a>
	</article>
	<!-- Liens Externes End -->

	<!-- Recommandations -->
	<article class="recommandations clear">
		<h1>Recommandations</h1>
		<figure>
			<img src="<?php echo ROOT;?>/img/otaku1.jpg" alt="Otaku - T-shirt Gameboy" title="Otaku - T-shirt Gameboy">
			<br>
			<figcaption>
				<h2>Otaku</h2>
				<h3>T-Shirt Gameboy</h3>
				<p class="reco_price">25,00 €</p>
			</figcaption>
		</figure>

		<figure>
			<img src="<?php echo ROOT;?>/img/otaku1.jpg" alt="Otaku - T-shirt Gameboy" title="Otaku - T-shirt Gameboy">
			<br>
			<figcaption>
				<h2>Otaku</h2>
				<h3>T-Shirt Gameboy</h3>
				<p class="reco_price">25,00 €</p>
			</figcaption>
		</figure>

		<figure>
			<img src="<?php echo ROOT;?>/img/otaku1.jpg" alt="Otaku - T-shirt Gameboy" title="Otaku - T-shirt Gameboy">
			<br>
			<figcaption>
				<h2>Otaku</h2>
				<h3>T-Shirt Gameboy</h3>
				<p class="reco_price">25,00 €</p>
			</figcaption>
		</figure>

		<figure>
			<img src="<?php echo ROOT;?>/img/otaku1.jpg" alt="Otaku - T-shirt Gameboy" title="Otaku - T-shirt Gameboy">
			<br>
			<figcaption>
				<h2>Otaku</h2>
				<h3>T-Shirt Gameboy</h3>
				<p class="reco_price">25,00 €</p>
			</figcaption>
		</figure>
	</article>
	<!-- Recommandations End -->

</section>
