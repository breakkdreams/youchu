<?php
	session_start();
	/**
	 * 首页
	 */
	require('../plugins.php');
	
	$smarty = new Smarty;
	
	$smarty->debugging = _debugging;
	$smarty->caching = _caching;
	$smarty->cache_lifetime = _cache_lifetime;
	
	$smarty->assign("dir",WEB_PATH);
	$smarty->assign("head_title",'管理员登录 '.WEB_NAME);
	$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
	$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
	
    //用户注册
	if(!empty($_REQUEST['act']) && "login"==$_REQUEST['act'] && !empty($_REQUEST['mobile']) && !empty($_REQUEST['password'])){
	
		//1.接受参数
		$member = array();
		//1.1.手机号 
		$member['_login'] = $_REQUEST['mobile']; 
		//1.2.密码
		$member['_password'] = md5($_REQUEST['password']);
		//1.3.验证码
		//验证码
		if(!empty($_REQUEST["verifycode"]))
		{
		    $_checknum = $_REQUEST["verifycode"];
		}
		
    	if($_SESSION['VCODE']==md5($_checknum)){
    		
    		$result = manage_login($member['_login'],$member['_password']);
    		
    		if(count($result)==1){
    		       
    			$_SESSION["_id"]=$result[0]['u_id'];
    			$_SESSION["_name"]=$result[0]['u_name'];
    			$_SESSION["_username"]=$result[0]['u_username'];
    			
    			//1.登录信息更新
    			manage_loginupdate($result[0]['u_id'],GetIP());
    			
    			//2.调取权限
    			$manage_right = getManagerRight($result[0]['u_id']);
    			
    			if(is_array($manage_right) && count($manage_right)==1){
    				$_right = $manage_right[0];
    				
    				$_SESSION["manage_right"] = $_right[2];
    				$_SESSION["product_right"] = $_right[3];
    			}
    			
    			echo "<script>window.location='index.php'</script>";
    		}else{
    			$smarty->assign('error',1);
			    $smarty->display('templates/login.tpl',md5($_SERVER["REQUEST_URI"]));
    		}
    	}
	}else{
		require('_session.php');
		$smarty->display('templates/login.tpl',md5($_SERVER["REQUEST_URI"]));
	}
?>
