<?php 
	session_start();
	/**
	 * 广告位置-列表
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
		$smarty->assign("head_title",'广告位置-列表 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open8','');
		$smarty->assign('left_class8',' in');
	
		$list = getADSiteList();		
		$smarty->assign("list",$list);
		
		require('_session.php');
		
		$smarty->display('templates/ad_place.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
	
	
?>
