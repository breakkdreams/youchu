<?php 
	header("Content-Type: text/html; charset=utf-8");
	session_start();
	require_once('../../plugins.php');
	
	$_username = ""; //登陆账号
	if(!empty($_REQUEST["username"])){
		$_username = $_REQUEST["username"];
	}
	
	$_password = ""; //登陆密码
	if(!empty($_REQUEST["password"])){
		$_password = $_REQUEST["password"];
		$_password = md5($_password);
	}

	//验证码
	if(!empty($_REQUEST["verifycode"]))
	{
	    $_checknum = $_REQUEST["verifycode"];
	}
	
	if(!empty($_username) && !empty($_password) && !empty($_checknum) && $_SESSION['VCODE']==md5($_checknum)){
		
		$result = manage_login($_username,$_password);
		
		if(count($result)==1){
		       
			$_SESSION["_id"]=$result[0]['u_id'];
			$_SESSION["_name"]=$result[0]['u_name'];
			$_SESSION["_username"]=$result[0]['u_username'];
			
			manage_loginupdate($result[0]['u_id'],GetIP());
			
			//echo "<script>window.location='main.php'</script>";
		}else{
			echo "<script>alert('登录信息错误');window.location='login.php'</script>";
		}
		
	}else if(null==$_SESSION["_username"] || !$_SESSION["_username"]){
		echo "<script>alert('登陆超时，请从新登陆');window.location='login.php'</script>";
	}
?>