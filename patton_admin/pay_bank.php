<?php 
	session_start();
	/**
	 * 支付配置-支付宝
	 */
	
	if(empty($_SESSION['_id'])){
		echo '<script>window.location.href="login.php";</script>';
	}
	else{
		require('../plugins.php');
		
		$smarty = new Smarty;
	
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'支付配置-网银'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open11','');
		$smarty->assign('left_class11',' in');
	
				
		require('_session.php');
		
		$smarty->display('templates/pay_bank.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
	
	
?>
