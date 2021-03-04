<?php require_once '../core/init.php'; 

	$_SESSION = array();
		session_destroy();
		header("Location: login.php");
