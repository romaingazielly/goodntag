<nav class="menu">
	<ul>
		<li id="infos_compte">
			<div class="flip">
				<a id="acc-connect" href="#">Se connecter</a>
				<?php 
					$register = site_url("/register?redirect=" . get_permalink()); 
					echo '<a id="acc-register" href="'.$register.'">S\'enregistrer</a>';
				?>
			</div>
			<div class="flap">
				<?php 
					wp_login_form(array());
				?>
			</div>
		</li>
		<li><a href="<?php bloginfo('url') ?>/mon-profil">Mon profil</a></li>
		<li><a href="<?php bloginfo('url') ?>/favoris">Mes favoris</a></li>
		<li><a href="<?php bloginfo('url') ?>/historique">Historique</a></li>
		<!-- <li><a href="#">Mes badges</a></li> -->
	</ul>
</nav>
