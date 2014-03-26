<?php 

date_default_timezone_set('Europe/Paris');

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

// function user_register_handler($id) {
// 	wp_set_password($_POST['user_pass'], $id);
// 	$redirection = $_POST['redirection'];

// 	wp_redirect(get_bloginfo('url').'/register?result=success'.'&redirection='.$redirection);
// 	exit;
// }

function site_router() {
	$root =  str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
	$url = str_replace($root, '', $_SERVER["REQUEST_URI"]);
	$url = explode('/', $url);
	if(count($url) == 1 && $url[0] == 'login'){
		require('../page-login.php');
	}
}

function register_history_product($productId) {
	$userId = get_current_user_id();
	$history = $favs = get_user_meta($userId, 'product_history', true);

	if ($history) {
		$ids = explode(',', $history);
		if (!in_array($productId, $ids)) {
			$history .= ','.$productId;
		}
	} else {
		$history = $productId; 
	}

	update_user_meta($userId, 'product_seen_'.$productId, date('d/m/Y H:i'));

	return update_user_meta($userId, 'product_history', $history);
}

add_action('send_headers', 'site_router');

add_action('registration_errors', 'registration_errors_handler');

// add_action('user_register', 'user_register_handler');