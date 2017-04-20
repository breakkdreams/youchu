<?php 
	session_start();
	/**
	 * 首页
	 */
	require('plugins.php');
	
	$_ismobile = isMobile();
	
	if($_ismobile){
	    require('mobile_do.php');
	}else{
		$smarty = new Smarty;
		
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'首页 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		
		//2.所有商品分类
	$menu = getProductMenuList();
	$smarty->assign("menu",$menu);
		require('_session.php');
		$smarty->display('core/templates/tickets.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
?>
