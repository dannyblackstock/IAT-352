<?php

session_start();

$_SESSION['callback_URL'] = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . 
	$_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];

if (!isset($_SESSION['valid_user'])) {
	//use proper https URL with a full path
	header("Location: authenticate.php");
	exit;
}

?>
