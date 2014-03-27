<?php get_header(); ?>
<section class="contenu inscription">
	<h1><span>Inscription</span></h1>
	<img src="<?php echo ROOT ?>/img/goodntag.png" alt="Good n Tag">

		<form id="registration_form" method="post" >
			<p>
				<label>Nom d'utilisateur</label>
				<input type="text" name="user_login" id="user_login_form" required />
			</p>
			<p>
				<label>Adresse e-mail</label>
				<input type="email" name="user_email" id="user_email_form" required />
			</p>

			<p>
				<label>Mot de passe</label>
				<input type="password" name="user_pass" id="user_pass_form" required />
			</p>

			<p>
				<label>Confirmation</label>
				<input type="password" name="user_pass_confirm" id="user_pass_confirm_form" required />
			</p>

			<p>
				<input class="checklabel" type="checkbox" required name="user_tos" id="cgu"/>
				<label  for="cgu">J'accepte les conditions d'utilisation du service</label>
			</p>
			<p class="result"></p>
			<!-- <input type="hidden" name="redirection" id="redirection" value="<?php echo $url ?>" /> -->
			<input class="validate_register" type="submit" value="Valider"/>
		</form>

		<script>

		function validateEmail(email) { 
		    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		    return re.test(email);
		} 
		$('.checklabel').on('click', function(){
			if( $(this).hasClass('checked') ){
				$(this).removeAttr('checked');
			}else{
				$(this).attr('checked');
			}
		});
		$('.validate_register').on('click', function(e) {
			e.preventDefault();
			
			var login = $('#user_login_form').val();
			var email = $('#user_email_form').val();
			var password = $('#user_pass_form').val();
			if ( !validateEmail(email) ){
				$('#registration_form').find('.result').text("Votre email n'est pas valide");
			}else{
				$('#registration_form').find('.result').text("Vous avez bien été enregistré.").delay(2000);
				$.ajax({
			        type: "post",
			        url: "<?php echo ROOT; ?>/registration_form.php",
			        data: { login: login, email: email, password: password },
			        success: function(data) {
			        	setTimeout(function() {
			        		window.location.href=document.referrer;
			        	}, 2000);
			        	
			        }
			    });
			}
			
		});

		</script>

</section>
<?php get_footer(); ?>