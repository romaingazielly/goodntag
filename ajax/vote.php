<?php

// init wordpress core to load wp functions
require 'init.php';

if (isset($_POST['id']) && isset($_POST['vote'])) {
	$id = (int) $_POST['id'];
	$vote = $_POST['vote'];

	// Update de l'user pour ce vote

	$userId = get_current_user_id();

	$voteUser = get_user_meta($userId, 'product_votes', true);

	if (null == $voteUser) {
		$voteUser = $id;
	} else {
		$voteUser .= ','.$id;
	}

	update_user_meta($userId, 'product_votes', $voteUser);
	update_user_meta($userId, 'product_vote_'.$id, $vote);


	// Update du produit
	
	$voteCounter = (int) get_post_meta($id, 'votes_'.$vote, true);

	if (!$voteCounter) {
		$voteCounter = 0;
	}

	$voteCounter++;
	update_post_meta($id, 'votes_'.$vote, $voteCounter);


	
	echo json_encode(array(
		'code' => 0
	));
	exit;
}
