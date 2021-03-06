<?php 
	session_start();
	/**
	 * 平台栏目
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
		$smarty->assign("head_title",'平台栏目'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open9','');
		$smarty->assign('left_class9',' in');
	
		if("delete"==$_REQUEST['cmd']){
			$id = $_REQUEST['id'];
			
			if(is_numeric($id)){
				$ret = deleteMenu($id);
			}
		}
		$list = getMenuList();
		$smarty->assign("list",$list);
		
		require('_session.php');
		
		$smarty->display('templates/menu_list.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
	
	
?>
