<nav class="menu">
	<ul>
		<li id="infos_compte">
			<div class="flip">
				<!-- <a id="acc-connect" href="#">Se connecter</a> -->
				<?php 
				if(is_user_logged_in()){
					global $current_user;
					get_currentuserinfo();
					echo '<p>Bonjour</p>';
					echo '<p class="user_firstname"></p>'.$current_user->user_firstname . "</p>";
					echo '<p class="user_lastname">'.$current_user->user_lastname . "</p>";
					
				?>
					<a class="logout" href="<?php echo wp_logout_url( $_SERVER['REQUEST_URI'] ); ?>" title="Logout">Logout</a>
				<?php }else{
					wp_login_form();
					
					// $register = site_url("/register?redirect=" . $_SERVER['REQUEST_URI']); 
					// echo '<a id="acc-register" href="'.$register.'">S\'enregistrer</a>';
					do_action( 'social_connect_form' ); ?>
					

					<a id="acc-register" href="<?php echo wp_registration_url(); ?>" title="Register">S'enregistrer</a>

					
				<?php }
					
				?>
			</div>
<!-- 			<div class="flap">
				<?php 
					wp_login_form(array());
					do_action( 'wordpress_social_login' );
				?>
			</div> -->
		</li>
		<li><a href="<?php bloginfo('url') ?>/mon-profil">Mon profil</a></li>
		<li><a href="<?php bloginfo('url') ?>/favoris">Mes favoris</a></li>
		<li><a href="<?php bloginfo('url') ?>/historique">Historique</a></li>
		<!-- <li><a href="#">Mes badges</a></li> -->
	</ul>
</nav>
