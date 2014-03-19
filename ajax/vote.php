<?php

// init wordpress core to load wp functions
require 'init.php';

if (isset($_POST['id']) && isset($_POST['vote'])) {
	$id = (int) $_POST['id'];
	$vote = $_POST['vote'];
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
