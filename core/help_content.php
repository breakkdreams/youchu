<?php 
	session_start();
	/**
	 * 详细页
	 */
	require('../plugins.php');
	
	$smarty = new Smarty;

	$smarty->debugging = _debugging;
	$smarty->caching = _caching;
	$smarty->cache_lifetime = _cache_lifetime;
	
	$smarty->assign("dir",WEB_PATH);
	
	
	if(!empty($_REQUEST['id'])){
		$id=$_REQUEST['id'];
				
		require('../_session.php');
		require('require_type.php');
		
		$item = getNewsInfo($id);
		
		if(!empty($item)){
			
			foreach($item as $map){
				
			}

			$smarty->assign("title",$map['n_title']);
			$smarty->assign("content",$map['n_content']);
		}
			
		$smarty->assign("head_title",$map['n_title'].' '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		$smarty->display('templates/help_content.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
?>
