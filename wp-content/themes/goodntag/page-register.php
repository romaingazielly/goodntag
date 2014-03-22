<?php get_header(); ?>
<section class="contenu inscription">
	<h1><span>Inscription</span></h1>

	<?php if (isset($_GET['result']) && 'success' == $_GET['result']) : ?>
		<div class="alert alert-success">
			Votre inscription a bien été prise en compte !
		</div>
	<?php endif; ?>

	<form method="post" action="<?php bloginfo('url') ?>/wp-login.php?action=register" >
		<p>
			<label>Nom d'utilisateur</label>
			<input type="text" name="user_login" id="user_login" required />
		</p>
		<p>
			<label>Adresse e-mail</label>
			<input type="text" name="user_email" id="user_email" required />
		</p>

		<p>
			<label>Mot de passe</label>
			<input type="password" name="user_pass" id="user_pass" required />
		</p>

		<p>
			<label>Confirme ton mot de passe</label>
			<input type="password" name="user_pass_confirm" id="user_pass_confirm" required />
		</p>

		<p>
		<input type="checkbox" required name="user_tos" />
		<label>J'accepte les conditions d'utilisation du service</label>
		</p>

		<p>
		<input type="submit" />
		</p>
	</form>
</section>
<?php get_footer(); ?>