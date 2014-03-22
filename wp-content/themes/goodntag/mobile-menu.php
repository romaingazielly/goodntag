<nav class="menu">
	<ul>
		<li class="infos_compte">
			<?php 
				wp_login_form(array());
				do_action( 'wordpress_social_login' );
			?>
		</li>
		<?php wp_register(); ?>
		<li class="profil"><a href="<?php bloginfo('url') ?>/mon-profil">Mon profil</a></li>
		<li class="favoris"><a href="<?php bloginfo('url') ?>/favoris">Mes favoris</a></li>
		<li class="historique"><a href="<?php bloginfo('url') ?>/historique">Historique</a></li>
		<!-- <li class="badges"><a href="#">Mes badges</a></li> -->
	</ul>
</nav>