<?php
	session_start();
	/**
	 * 会员首页
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
		$smarty->assign("head_title",'会员中心首页');
		require('../_session.php');
		$smarty->display('templates/member.tpl',md5($_SERVER["REQUEST_URI"]));
	}
?>
