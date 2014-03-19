<?php

// init wordpress core to load wp functions
require 'init.php';

if (isset($_POST['id'])) {
	$id = (int) $_POST['id'];
	$userId = get_current_user_id();

	$favs = get_user_meta($userId, 'product_fav', true);

	$favArray = explode(',', $favs);
	$newFavArray = array();

	foreach($favArray as $fav) {
		if ($fav == $id) continue;
		$newFavArray[] = $fav;
	}

	$favs = implode(',', $newFavArray);

	update_user_meta($userId, 'product_fav', $favs);

	echo json_encode(array(
		'code' => 0
	));
	
	exit;
}
