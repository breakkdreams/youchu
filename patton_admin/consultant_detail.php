<?php 
	session_start();
	/**
	 * 商品咨询详细信息
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
		$smarty->assign("head_title",'商品咨询详细信息 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open6','');
		$smarty->assign('left_class6',' in');
	
				
		require('_session.php');
		
		$smarty->display('templates/consultant_detail.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
	
	
?>
