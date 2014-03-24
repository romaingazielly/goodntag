<?php 
	$url = $_GET['redirect'];
	$result = $_GET['result'];
	$redirection = $_GET['redirection'];

	if (isset($_GET['result']) && $_GET['result'] == $result) : header ("Refresh: 3;URL=$redirection"); endif;
?>

<?php get_header(); ?>
<section class="contenu inscription">
	<h1><span>Inscription</span></h1>
	<img src="<?php echo ROOT ?>/img/goodntag.png" alt="Good n Tag">
	<?php if (isset($_GET['result']) && $_GET['result'] == $result) : ?>
		<div class="alert alert-success">
			Inscription réussie !
		</div>
	<?php else : ?>

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

	<?php endif; ?>
</section>
<?php get_footer(); ?>