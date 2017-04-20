<?php 
	session_start();
	/**
	 * 系统设置-热门搜索
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
		$smarty->assign("head_title",'系统设置-热门搜索'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open12','');
		$smarty->assign('left_class12',' in');
	
				
		require('_session.php');
		
		$smarty->display('templates/sys_search.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
	
	
?>
