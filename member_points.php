<?php 
	session_start();
	/**
	 * 我的账户-我的积分
	 */
	require('plugins.php');
	
	
	
	if(!empty($_SESSION['_shop_login_id'])){
		$smarty = new Smarty;
		
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'我的账户-我的积分-生鲜网 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign("member_left_class4",'class="account_feature feature_choose"');
		
		require('_session.php');
		$smarty->display('core/templates/member_points.tpl',md5($_SERVER["REQUEST_URI"]));
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
	
?>
