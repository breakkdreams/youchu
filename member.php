<?php 
	session_start();
	/**
	 * 我的账户首页
	 */
	require('plugins.php');
	
	
	
	if(!empty($_SESSION['_shop_login_id'])){
		$smarty = new Smarty;
		
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'我的账户-生鲜网 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign("member_left_class1",'class="account_feature feature_choose"');
		
		$list = getOrderLimit(3,$_SESSION['_shop_login_id']);
		
		if(!empty($list) && count($list)>0){
			
			$order_code = '';
			
			foreach ($list as $order){
				if($order_code==''){
					$order_code = $order['order_code'];
				}else{
					$order_code = $order_code.','.$order['order_code'];
				}
			}
			
			$info = getOrderInfoList($order_code);
			
			$smarty->assign("list",$list);
			$smarty->assign("info",$info);
		}
		else{
			$smarty->assign("error",true);
		}
		
		require('_session.php');
		$smarty->display('core/templates/member.tpl',md5($_SERVER["REQUEST_URI"]));
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
	
?>
