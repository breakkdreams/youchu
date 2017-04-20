<?php 
	session_start();
	/**
	 * 产品详细页
	 */
	require('../plugins.php');
	
	$smarty = new Smarty;

	$smarty->debugging = _debugging;
	$smarty->caching = _caching;
	$smarty->cache_lifetime = _cache_lifetime;
	
	$smarty->assign("dir",WEB_PATH);
		
	/**
	 * 我的购物车
	 */
	
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		
		$order_code = $_REQUEST['id'];
				
		$ret = getOrderBasic($order_code);
		
		$smarty->assign("code",$order_code);
		
		if(!empty($ret)){
			$smarty->assign("map",$ret[0]);	
		}
		
		$smarty->assign("head_title",'我的订单 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		$smarty->display('templates/myorder.tpl',md5($_SERVER["REQUEST_URI"]));	
	}
	
	
?>