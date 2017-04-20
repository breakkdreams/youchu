<?php 
	session_start();
	/**
	 * 报表-区域统计
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
		$smarty->assign("head_title",'报表-区域统计 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open10','');
		$smarty->assign('left_class10',' in');
	
				
		require('_session.php');
		
		$smarty->display('templates/count_area.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
	
	
?>
