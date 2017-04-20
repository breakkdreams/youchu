<?php 
	session_start();
	/**
	 * 友情链接
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
		$smarty->assign("head_title",'友情链接'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open9','');
		$smarty->assign('left_class9',' in');
	
		$list = getLinkSiteList();
		$smarty->assign("list",$list);		
		
		if("display"==$_REQUEST["cmd"] && !empty($_REQUEST["id"])){
			$id = $_REQUEST["id"];
			$checked = "true"==$_REQUEST["check"]?'1':'0';
			$ret = setLinkDisplay($id,$checked);
			echo '<script>';
			echo $ret==1?"alert('保存成功');":"alert('保存失败');";
			echo "window.location='link_list.php?page=".$_REQUEST["page"]."';";
			echo '</script>';
		}
		
		require('_session.php');
		
		$smarty->display('templates/link_list.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
	
	
?>
