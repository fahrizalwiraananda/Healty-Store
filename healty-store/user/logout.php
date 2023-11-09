<?php 
	session_start();
	$_SESSION = [];

	session_unset();
	session_destroy();

	//setcookie('id', '', time() - 3600);
	//setcookie('key', '', time() - 3600);

	setcookie('id', '', 0, '/');
	setcookie('key', '', 0, '/');

	header("Location: index.php");
	exit;

 ?>