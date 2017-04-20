<?php 
	session_start();
	/**
	 * 配送区域管理
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
		$smarty->assign("head_title",'配送区域管理'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open9','');
		$smarty->assign('left_class9',' in');

		$list = getAreaList();

		$smarty->assign("list",$list);
		
		require('_session.php');
		
		$smarty->display('templates/area_list.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
	
	
?>
