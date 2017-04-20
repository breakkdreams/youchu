<?php 
	session_start();
	/**
	 * 订单失败
	 */
	require('plugins.php');
	
	if(!empty($_SESSION['_shop_login_id'])){
		$smarty = new Smarty;
		
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'订单失败'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);

		
		require('_session.php');
		$smarty->display('core/templates/order_fail.tpl',md5($_SERVER["REQUEST_URI"]));
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
	
?>
