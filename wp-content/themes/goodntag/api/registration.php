<?php 

/*
 * Registration custom funcs
 */

function registration_errors_handler($errors, $sanitized_user_login = null, $user_email = null) {

	$password = $_POST['user_pass'];
	$passwordConfirm = $_POST['user_pass_confirm'];

	if (!isset($_POST['user_tos'])) { // temrs of service
		$errors->add('user_tos_error', __('Vous devez accepter les conditions du service.'));
	}

	if ($password != $passwordConfirm) {
		$errors->add('user_pass_error', __('Les deux mots de passe ne sont pas identiques.'));
	}

	return $errors;
}

function user_register_handler($id) {
	wp_set_password($_POST['user_pass'], $id);

	wp_redirect(get_bloginfo('url').'/register?result=success');
	exit;
}

add_action('registration_errors', 'registration_errors_handler');

add_action('user_register', 'user_register_handler');