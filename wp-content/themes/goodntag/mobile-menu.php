<nav class="menu">
	<ul>
		<li class="infos_compte">
			<?php 
				$userId = get_current_user_id();
				echo $userId;
				if($userId != 0){
					wp_login_form(array()); 
				}
			?>
		</li>
		<li class="profil"><a href="<?php bloginfo('url') ?>/mon-profil">Mon profil</a></li>
		<li class="favoris"><a href="<?php bloginfo('url') ?>/favoris">Mes favoris</a></li>
		<li class="historique"><a href="<?php bloginfo('url') ?>/historique">Historique</a></li>
		<!-- <li class="badges"><a href="#">Mes badges</a></li> -->
	</ul>
</nav>