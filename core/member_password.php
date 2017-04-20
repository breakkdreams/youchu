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
		$smarty->assign("head_title",'修改密码 会员中心 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		require('../_session.php');
		$smarty->display('templates/member_password.tpl',md5($_SERVER["REQUEST_URI"]));
	}
?>
