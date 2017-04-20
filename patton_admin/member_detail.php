<?php 
	session_start();
	/**
	 * 会员详细信息
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
		$smarty->assign("head_title",'会员详细信息'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open3','');
		$smarty->assign('left_class3',' in');
	
		$cmd = myPOST('cmd');
		
		$id = $_REQUEST['id'];
		
		if(is_numeric($id)){
			
			//1.订单主信息
			$ret = getMemberInfo($id);
			
			if(!empty($ret)){
				$map = $ret;
				
				$smarty->assign("map",$map);
				
				//2.订单信息
				$order_list = getOrderLimit(10,$id);
				$smarty->assign("order_list",$order_list);
				
				//3.收件地址信息
				$address_list = getMemberAddressList($id);
				$smarty->assign("address_list",$address_list);
			}
		}		
		require('_session.php');
		$smarty->assign('cmd',$_REQUEST['cmd']);
		$smarty->display('templates/member_detail.tpl',md5($_SERVER["REQUEST_URI"]));
		
	}
	
?>
