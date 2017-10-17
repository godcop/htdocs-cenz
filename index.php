<?php
session_start();
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    include 'home.php';
}else{
	include 'none.php';
}
?>