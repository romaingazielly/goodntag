<?php
require_once($_SERVER['DOCUMENT_ROOT']."/wp-blog-header.php"); 
$login = $_POST['login'];
$mail = $_POST['email'];
$password = $_POST['password'];

$userdata = array( 
	'user_login' => $login, 
	'user_email' => $mail, 
	'user_pass' => $password );
	
// Create a new user
$user_id = wp_insert_user( $userdata );
auto_login( $login );
if( !is_wp_error($user_id) ) {
	// $result = true;
	// echo $result;
	echo "User created : ". $user_id;
}else{
	// $result=false;
	// echo $result;
	echo 'error';
}