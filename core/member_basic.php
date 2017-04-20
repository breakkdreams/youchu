<?php
	session_start();
	/**
	 * 会员积分
	 */
	require('../plugins.php');
		
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		$smarty = new Smarty;
	
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'基本信息 会员中心 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		require('../_session.php');
		
		$myinfo = getMemberInfo($_SESSION["_shop_login_id"]);
		
		if(!empty($myinfo)){
			foreach($myinfo as $map){
				
			}
			$smarty->assign("map",$map);
		}
		
		$smarty->display('templates/member_basic.tpl',md5($_SERVER["REQUEST_URI"]));
	}
?>
