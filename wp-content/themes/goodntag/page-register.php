<?php get_header(); ?>
<section class="contenu inscription">
	<h1><span>Inscription</span></h1>

	<form method="post" action="<?php bloginfo('url') ?>/wp-login.php?action=register" >
		<p>
			<label>Nom d'utilisateur</label>
			<input type="text" name="user_login" id="user_login" />
		</p>
		<p>
			<label>Adresse e-mail</label>
			<input type="text" name="user_email" id="user_email" />
		</p>

		<p>
		<input type="submit" />
		</p>
	</form>
</section>
<?php get_footer(); ?>