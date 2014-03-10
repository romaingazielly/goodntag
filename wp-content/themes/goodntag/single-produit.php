<?php get_header(); ?>

<section class="content_product">

	<!-- Slider -->
	<article id="slider_product">
		<div class="slider_img">
			<p id="product_price">25,00€</p>
			<a href="#" id="btn_vote"></a>
		</div>
		<h1 id="product_name">T-shirt Bear SFA</h1>

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
						<li id="vote_bad_results">0%</li>
						<li id="vote_neutral_results">0%</li>
						<li id="vote_good_results">100%</li>
					</ul>
				</aside>
			</article>
		</section>
		<!-- Popin Rating End -->
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
	<article class="promotion">
		<img src="<?php echo ROOT;?>/img/promo.jpg">
	</article>
	<!-- Promotion End -->

	
<h1>Produit : <?php echo $post->post_title ?></h1>

Prix : <?php echo get_post_meta($post->ID, 'product_price', true) ?>
</section>
