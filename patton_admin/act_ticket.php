<?php 
	session_start();
	/**
	 * 促销活动 --优惠券
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
		$smarty->assign("head_title",'促销活动 --优惠券 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open5','');
		$smarty->assign('left_class5',' in');
	
				
		require('_session.php');
		
		$smarty->display('templates/act_ticket.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
	
	
?>
