<?php
	$logTest = 1;
	$log = $_GET['login'];

	if($log == 'failed'){
		$logTest = 0;
	}else{
		$logTest = 1;
	}
	
if(is_user_logged_in()) {
	echo '<nav class="menu logged">';
}else{
	echo '<nav class="menu notlog">';
}

?>
	<ul>
		<li id="infos_compte">
			<div class="flip" data-log="<?php echo $logTest; ?>">
				<!-- <a id="acc-connect" href="#">Se connecter</a> -->
				<?php 
				if(is_user_logged_in()) {
					global $current_user;
					get_currentuserinfo();
					// var_dump($current_user);
					
					echo get_avatar($current_user->ID, 64);
					echo '<img class="profil-pic" src="" alt="" title="" />';
					// var_dump($current_user);
					if(!empty($current_user->user_firstname) || !empty($current_user->user_lastname)){
						echo '<div class="infos_user"><span class="user_firstname">'.$current_user->user_firstname . '</span><br/><span class="user_lastname">'.$current_user->user_lastname . '</span></div>';
					}else if(!empty($current_user->display_name)){
						echo '<div class="infos_user"><span class="user_firstname">'.$current_user->display_name . '</span></div>';
					}else{
						echo '<div class="infos_user"><span class="user_firstname">'.$current_user->user_login . '</span></div>';
					}
					
				?>
					<div class="clear"></div>
					<a class="logout" href="<?php echo wp_logout_url( $_SERVER['REQUEST_URI'] ); ?>" title="Logout">Logout</a>
				<?php }else{
					wp_login_form();
					// $register = site_url("/register?redirect=" . $_SERVER['REQUEST_URI']); 
					// echo '<a id="acc-register" href="'.$register.'">S\'enregistrer</a>';
					do_action('social_connect_form'); ?>
					

					<a id="acc-register" href="<?php echo wp_registration_url(); ?>" title="Register">S'enregistrer</a>

					
				<?php }
					
				?>
			</div>

		</li>
		<!-- <li><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Précèdent</a></li> -->
		<!-- <li class="menu-link"><a href="<?php bloginfo('url') ?>/mon-profil">Mon profil</a></li> -->
		<li class="menu-link"><a href="<?php bloginfo('url') ?>/favoris">Mes favoris</a></li>
		<li class="menu-link"><a href="<?php bloginfo('url') ?>/historique">Historique</a></li>
		<!-- <li><a href="#">Mes badges</a></li> -->
	</ul>

</nav>
