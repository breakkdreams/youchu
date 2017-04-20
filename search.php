<?php 
	session_start();
	/**
	 * 产品列表
	 */
	require('plugins.php');
	
	$smarty = new Smarty;

	$smarty->debugging = _debugging;
	$smarty->caching = _caching;
	$smarty->cache_lifetime = _cache_lifetime;
	
	$smarty->assign("dir",WEB_PATH);
	$smarty->assign("head_title",'产品列表');
	
	require('core/require_type.php');
	
	if(!empty($_REQUEST['key'])){
	
		//分页内容列表 
		$array = getProductSearch($_REQUEST['key']);
		
		$smarty->assign('list',$array);
		
	}
	
	require('_session.php');
	
	$smarty->display('core/templates/search.tpl',md5($_SERVER["REQUEST_URI"]));
?>