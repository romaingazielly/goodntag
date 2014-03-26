<?php get_header(); ?>

<?php

	// get product infos
	$id = get_the_ID();
	$userId = get_current_user_id();

	// vote of current user
	$voteUser = get_user_meta($userId, 'product_votes', true);

	if (in_array($id, explode(',', $voteUser))) { // there's a vote
		$vote = get_user_meta($userId, 'product_vote_'.$id, true);
	} else {
		$vote = '';
	}


	// get vote percents
	$votesBad = get_post_meta($id, 'votes_bad', true) ?: 0;
	$votesNeutral = get_post_meta($id, 'votes_neutral', true) ?: 0;
	$votesGood = get_post_meta($id, 'votes_good', true) ?: 0;

	$votesTotal = $votesGood + $votesNeutral + $votesBad;

	if ($votesTotal > 0) {
		$percentBad = (int) $votesBad / $votesTotal * 100;
		$percentNeutral = (int) $votesNeutral / $votesTotal * 100;
		$percentGood = (int) $votesGood / $votesTotal * 100;
	} else {
		$percentBad = $percentGood = $percentNeutral = 0;
	}

	// Le produit est il déjà aux favoris ?
	$favString = get_user_meta($userId, 'product_fav', true);

	if($favString != '') {
		$favs = explode(',', $favString); 
		$isFav = in_array($id, $favs);
	} 
		

?>
<section id="<?php echo $id; ?>" data-product-id="<?php echo $id; ?>" class="contenu page_produit">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
	<!-- Slider -->
	<article class="slider_product">
    	<?php $diaporama = get_field("image"); 
        if(!empty($diaporama)){ ?>
            <ul class="slider_img">
                <?php foreach ($diaporama as $image){ ?>
                    <li style="background:url('<?php echo $image["sizes"]["large"]; ?>') no-repeat center; background-size:cover;">
                    </li>
                <?php }   ?>
            </ul>
    	<?php } ?>
    	<p id="product_price"><?php echo get_field("prix"); ?> €</p>
		<a href="#" id="btn_vote"></a>
		<h1 id="product_name"><?php echo $post->post_title ?></h1>

		<!-- Popin Rating -->
		<section class="product_vote <?php if ($vote == '') : ?>can-vote<?php endif; ?>" <?php if(is_user_logged_in()) : ?>data-canvote="true" <?php else : ?>data-canvote="false"<?php endif; ?>>
			<div class="bg-vote"></div>
			<article class="vote">
				<ul class="smiley clear">
					<li <?php if('bad' == $vote) : ?>class="active"<?php endif; ?> id="vote_bad" data-vote="bad"><a href="#" title="Bad"></a></li>
					<li <?php if('neutral' == $vote) : ?>class="active"<?php endif; ?>id="vote_neutral" data-vote="neutral" ><a href="#" title="Neutre"></a></li>
					<li <?php if('good' == $vote) : ?>class="active"<?php endif; ?>id="vote_good" data-vote="good" ><a href="#" title="Good"></a></li>
				</ul>
				<aside class="resultats_vote clear">
					<ul class="clear">
						<li id="vote_bad_results"><span><?php echo (int) $percentBad; ?>%</span></li>
						<li id="vote_neutral_results"><span><?php echo (int) $percentNeutral; ?>%</span></li>
						<li id="vote_good_results"><span><?php echo (int) $percentGood; ?>%</span></li>
					</ul>
				</aside>
			</article>
		</section>
		<!-- Popin Rating End -->

		<!-- Popin Favoris -->
		<section class="favoris" <?php if(is_user_logged_in()) : ?>data-log="true" <?php else : ?>data-log="false"<?php endif; ?> <?php if($isFav) : ?>data-fav="true" <?php else : ?>date-fav="false" <?php endif; ?> >
			<div class="fav_img like"></div>
		</section>
		<!-- Popin Favoris End -->

	</article>
	<!-- Slider End -->

	<hr>

	<!-- Infos Lavage -->
	<article class="infos_lavage">
		<h1>S, M, L, XL / BLANC / 100% COTON</h1>
		<ul class="liste_pictos">
			<li id="picto1" rev="50"><a href="#"></a></li>
			<li id="picto2" rev="87"><a href="#"></a></li>
			<li id="picto3" rev="127"><a href="#"></a></li>
			<li id="picto4" rev="164"><a href="#"></a></li>
			<li id="picto5" rev="202"><a href="#"></a></li>
		</ul>
		<div class="infos_container">
			<div class="arr_lavage">
				<span></span>
			</div>
			<section class="bloc_infos">
				<ul>
					<li id="info-picto1">
						Lavage normal avec une température maximale de 30°C au programme spécial avec action mécanique très réduite.
					</li>
					<li id="info-picto2">
						Ne pas utiliser d'agent blanchissant
					</li>
					<li id="info-picto3">
						Ne convient pas au séchage en machine
					</li>
					<li id="info-picto4">
						Convient au séchage en machine, maximum 55°
					</li>
					<li id="info-picto5">
						Repasser à la main, à sec, ou à la vapeur. Maximum 150°
					</li>
				</ul>
			</section>
		</div>
	</article>
	<!-- Infos Lavage End -->

	<!-- Promotion -->
	<?php
	date_default_timezone_set("UTC"); 
	$date = new DateTime();
	
	$promos = get_posts(array('post_type' => "promotion", 'posts_per_page'=>-1,'meta_key' => 'produit', 'meta_value' => get_the_ID() ));
	foreach ($promos as $promo){
		$begin = get_field('coupon_begin', $promo->ID);
		$end = get_field('coupon_end', $promo->ID);
		$discount = get_field('discount', $promo->ID);
	}

	if ( (current_time( 'mysql' ) > $begin) && (current_time( 'mysql' ) < $end) ){ ?>
		<article class="promotion clear">
			<div class="button">
				<div class="cadenas lock"></div>
				<div class="zone_promo"><?php echo $promo->post_title; ?></div>
				<div class="montant_promo"><?php echo $discount; ?>%</div>
			</div>
		</article>
	<?php } ?>
	<!-- Promotion End -->

	<!-- Description -->
	<article class="description clear">
		<h1>Description</h1>
		<div class="text-container">
			<p><?php echo get_field("description"); ?></p>
		</div>
		<a class="btn_suite description_off" href="#">Lire la suite <span class="arrow"></span></a>
	</article>
	<!-- Description End -->

	<!-- Liens Externes -->
	<article class="external_link">
		<ul>
			<?php $rubriques = get_field("rubriques");
			foreach ($rubriques as $rubrique) { ?>
			<li style="background:url('<?php echo $rubrique['image']['sizes']['brand_rubrique'];?> ') no-repeat; background-size:cover;">
				<a href="#"><span><?php echo $rubrique['titre']; ?></span></a>
			</li>
		<?php }	?>
	</article>
	<!-- Liens Externes End -->

	<!-- Recommandations -->
	<article class="recommandations clear">
		<h1>Recommandations</h1>
		<?php
		$marque = get_field('brand');
		$author = get_the_author();

		$products = get_posts(array('post_type' => "produit", 'posts_per_page'=>4,'orderby' => 'rand','author_name' => $author ));

		foreach ($products as $product){
  			$image = get_field("image", $product->ID);
  			$prix = get_field("prix", $product->ID);
  			?>

		<figure>
			<a href="<?php echo $product->guid; ?>">
				<img src="<?php echo $image[0]['sizes']['large']; ?>" alt="<?php echo $product->post_title; ?>" title="<?php echo $product->post_title; ?>">
				<br>
				<figcaption>
					<h2><?php echo $marque->post_title; ?></h2>
					<h3><?php echo $product->post_title; ?></h3>
					<p class="reco_price"><?php echo $prix; ?> €</p>
				</figcaption>
			</a>
		</figure>
		<?php } ?>
	</article>
	<!-- Recommandations End -->

	<?php endwhile; ?>

	<?php else: ?>
		<article>
			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
		</article>
	<?php endif; ?>

	</section>

	<script>
		$(document).ready(function(){

			if($('.slider_img li').length > 1){
				$('.slider_img').bxSlider({
					auto: true,
					controls:false,
					touchEnabled: true,
					swipeThreshold: 100,
					pause: 6000
				});
			}
			
		});
	</script>
	<?php get_footer(); ?>