<?php
	session_start();
	require_once "config/DB.php";
	unset($_SESSION['u_id']);
	
	/* require_once "config/google_config.php";
	unset($_SESSION['access_token']);
	$gClient->revokeToken(); */
	
	session_destroy();
	header("location:login.php");
	
	

?>