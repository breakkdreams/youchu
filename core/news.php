<?php
	/**
	 * 文章内容
	 */
	require('../plugins.php');
	$smarty = new Smarty;

	$smarty->debugging = _debugging;
	$smarty->caching = _caching;
	$smarty->cache_lifetime = _cache_lifetime;
	
	$smarty->assign("dir",WEB_PATH);
	$smarty->assign("head_title",'企业订购');

	$id=$_REQUEST['id'];
	
	$ret = getNewsInfo($id);
	
	if(!empty($ret)){
		foreach($ret as $map){
			
		}
		
		$smarty->assign("map",$map);
		
		$smarty->assign("head_title",$map['n_title'].' '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
	}
	
	$smarty->display('templates/news.tpl',md5($_SERVER["REQUEST_URI"]));
?>
