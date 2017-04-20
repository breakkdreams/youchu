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
	$smarty->assign("head_title",'会员登录 '.WEB_NAME);
	$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
	$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);

	$smarty->display('templates/login.tpl',md5($_SERVER["REQUEST_URI"]));
?>
