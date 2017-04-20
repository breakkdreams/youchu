<?php
	session_start();
	/**
	 * 首页
	 */
	require('plugins.php');
	
	$smarty = new Smarty;

	$smarty->debugging = _debugging;
	$smarty->caching = _caching;
	$smarty->cache_lifetime = _cache_lifetime;
	
	$smarty->assign("dir",WEB_PATH);
	$smarty->assign("head_title",'会员登录 '.WEB_NAME);
	$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
	$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
	//用户注册
	if("login"==$_REQUEST['act'] && !empty($_REQUEST['mobile']) && !empty($_REQUEST['password'])){

		//1.接受参数
		$member = array();
		//1.1.手机号 
		$member['member_login'] = $_REQUEST['mobile']; 
		//1.2.密码
		$member['member_password'] = md5($_REQUEST['password']);
		print_r($member);
		
		$map = loginMember($member['member_login'],$member['member_password']);
				
		if(!empty($map)){
		    $_SESSION["_shop_login_id"]= $map['member_id'];
		    $_SESSION["_shop_login_name"]= $map['member_login'];
		    $_SESSION["_shop_login_username"]= $map['member_name'];
		    $_SESSION["_shop_login_map"] = $map;

			echo '<script>';
			echo "window.location='index.php';";
			echo '</script>';
			return;
		}
		else{
			$smarty->assign('error',1);
			$smarty->display('core/templates/login.tpl',md5($_SERVER["REQUEST_URI"]));
		}
	}else{
		require('_session.php');
		$smarty->display('core/templates/login.tpl',md5($_SERVER["REQUEST_URI"]));
	}
?>
