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
	$smarty->assign("head_title",'国产水果 进口水果 '.WEB_NAME);
	$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
	$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);

    $list = getProductList4($_REQUEST['type']);
    $smarty->assign("list",$list);
	
	$smarty->display('templates/list.tpl',md5($_SERVER["REQUEST_URI"]));
?>