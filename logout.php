<?php
	session_start();

	$_SESSION["_shop_login_id"]= null;
	$_SESSION["_shop_login_name"]= null;
	$_SESSION["_shop_login_username"]= null;
	
	echo '<script>';
	echo "window.location='index.php';";
	echo '</script>';
?>