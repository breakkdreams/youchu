<?php 
	session_start();
	/**
	 * 会员中心->订单支付
	 */
	require('plugins.php');
	
	if(!empty($_SESSION['_shop_login_id'])){
		$smarty = new Smarty;
		
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'订单支付 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign("member_left_class1",'class="account_feature feature_choose"');
		
		$id = $_REQUEST['confirm_id'];
		
		if('confirm'==$_REQUEST['confirm_cmd'] && is_numeric($id)){
			
			$order = array();
			
			$order['member_id'] = $_SESSION['_shop_login_id'];
			$order['order_id'] = $id;
			
			$ret = confirmCheck($order);
			
			//已经确认
			if($ret==1){
				$smarty->assign('ret',2);
			}
			else{
				$ret = confirmOrder($order);
			
				//确认结果 1 成功 0失败
				$smarty->assign('ret',$ret);
			}
			
			require('_session.php');
			$smarty->assign('order_id',$id);
			$smarty->display('core/templates/order_confirm.tpl',md5($_SERVER["REQUEST_URI"]));
		}
		else{
			echo '<script>window.location.href="member.php";</script>';	
		}
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
	
?>
 