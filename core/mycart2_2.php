<?php
	/**
	 * 首页
	 */
	require('../plugins.php');
	
	$smarty = new Smarty;

	$smarty->debugging = _debugging;
	$smarty->caching = _caching;
	$smarty->cache_lifetime = _cache_lifetime;
	
	$smarty->assign("dir",WEB_PATH);
	$smarty->assign("head_title",'首页');

    $smarty->assign("index",'here');
	
	$smarty->display('templates/mycart2_2.tpl',md5($_SERVER["REQUEST_URI"]));
?>
