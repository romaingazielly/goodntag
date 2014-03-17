<?php

// init wordpress core to load wp functions
require 'init.php';

if (isset($_POST['id'])) {
	$id = (int) $_POST['id'];
	$userId = get_current_user_id();

	$favs = get_user_meta($userId, 'product_fav', true);

	// check if product is not already fav
	if ($favs && false !== in_array($id, explode(',', $favs))) {
		echo json_encode(array(
			'code' => 1
		));
		exit;
	}

	if (null == $favs) {
		$favs = $id;
	} else {
		$favs .= ','.$id;
	}

	update_user_meta($userId, 'product_fav', $favs);

	echo json_encode(array(
		'code' => 0
	));
	exit;
}
