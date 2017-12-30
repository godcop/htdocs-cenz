<?php
session_start();

if (empty($_SESSION['username'])){
	if (empty($_COOKIE['username']) || empty($_COOKIE['token'])){
		include 'none.php';
	}else{
		$username = $_COOKIE['username'];
		if (empty($username)){
			include 'none.php';
		}else{
			$_SESSION['username'] = $username;
			include 'home.php';
		}
	}
}else{
	include 'home.php';
}

?>