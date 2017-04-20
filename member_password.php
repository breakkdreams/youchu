<?php 
	session_start();
	/**
	 * 我的账户-修改密码
	 */
	require('plugins.php');
	
	
	
	if(!empty($_SESSION['_shop_login_id'])){
		$smarty = new Smarty;
		
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'我的账户-修改密码-生鲜网 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign("member_left_class6",'class="account_feature feature_choose"');
		
		if("update"==$_REQUEST['cmd']){
			$old_password = $_REQUEST['old_password'];
			$password = $_REQUEST['new_password1'];
			
			$old_password = md5($old_password);
			$password = md5($password);
			
			$ret = updatePassword($_SESSION['_shop_login_id'],$old_password,$password);
			
			$smarty->assign("ret",$ret);
		}
		
		require('_session.php');
		$smarty->display('core/templates/member_password.tpl',md5($_SERVER["REQUEST_URI"]));
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
	
?>
