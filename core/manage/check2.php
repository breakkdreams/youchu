<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if(empty($_SESSION["_username"])){
	echo "<script>alert('登陆超时，请从新登陆');window.parent.location='login.php'</script>";
}
require_once('../../plugins.php');
?>