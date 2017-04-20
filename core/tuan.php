<?php 
	session_start();
	/**
	 * 团购页
	 */
	require('../plugins.php');
	
	$smarty = new Smarty;

	$smarty->debugging = _debugging;
	$smarty->caching = _caching;
	$smarty->cache_lifetime = _cache_lifetime;
	
	$smarty->assign("dir",WEB_PATH);
	
		//2.所有商品分类
	$menu = getProductMenuList();
	$smarty->assign("menu",$menu);
	echo '=>'.json_encode($menu);
	$smarty->display('templates/tuan.tpl',md5($_SERVER["REQUEST_URI"]));
	
?>
