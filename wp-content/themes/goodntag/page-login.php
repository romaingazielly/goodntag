<?php get_header(); ?>
<section class="contenu inscription">
	<h1><span>Connexion</span></h1>
	<img src="<?php echo ROOT ?>/img/goodntag.png" alt="Good n Tag">

	<form method="post" action="<?php bloginfo('url') ?>/wp-login.php?action=register" >
		<p>
			<label>Nom d'utilisateur</label>
			<input type="text" name="user_login" id="user_login" required />
		</p>
		<p>
			<label>Adresse e-mail</label>
			<input type="email" name="user_email" id="user_email" required />
		</p>

		<p>
			<label>Mot de passe</label>
			<input type="password" name="user_pass" id="user_pass" required />
		</p>

		<p>
			<label>Confirmation</label>
			<input type="password" name="user_pass_confirm" id="user_pass_confirm" required />
		</p>

		<p>
			<input type="checkbox" required name="user_tos" id="cgu"/>
			<label class="checklabel" for="cgu">J'accepte les conditions d'utilisation du service</label>
		</p>
		<input type="hidden" name="redirection" id="redirection" value="<?php echo $url ?>" />
		<input type="submit" value="Valider"/>
	</form>

</section>
<?php get_footer(); ?>