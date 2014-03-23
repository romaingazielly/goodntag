<nav class="menu">
	<ul>
		<li id="infos_compte">
			<?php 
				wp_login_form(array());
				do_action( 'wordpress_social_login' );
			?>
		</li>
		<?php wp_register(); ?>
		<li><a href="<?php bloginfo('url') ?>/mon-profil">Mon profil</a></li>
		<li><a href="<?php bloginfo('url') ?>/favoris">Mes favoris</a></li>
		<li><a href="<?php bloginfo('url') ?>/historique">Historique</a></li>
		<!-- <li><a href="#">Mes badges</a></li> -->
	</ul>
</nav>