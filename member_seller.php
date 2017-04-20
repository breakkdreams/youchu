<?php 
	session_start();
	/**
	 * 我的账户-基础信息
	 */
	require('plugins.php');
	
	
	
	if(!empty($_SESSION['_shop_login_id'])){
		$smarty = new Smarty;
		
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'我的账户-基础信息-生鲜网 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign("member_left_class3",'class="account_feature feature_choose"');
		
		if('apply'==$_REQUEST['cmd']){
			
			$seller = array();
			
			$seller['member_id'] = $_SESSION['_shop_login_id'];
			$seller['s_id'] = empty($_POST['s_id'])?0:$_POST['s_id'];
			$seller['s_name'] = $_POST['s_name'];
			$seller['s_manager'] = $_POST['s_manager'];
			$seller['s_400'] = $_POST['s_400'];
			$seller['s_address'] = $_POST['s_address'];
			$seller['s_range'] = $_POST['s_range'];
			$seller['s_applyer'] = $_POST['s_applyer'];
			$seller['s_apperphone'] = $_POST['s_apperphone'];
			
			if(is_numeric($seller['s_id']) && $seller['s_id']*1>0){
				$ret = updateSellerApplyInfo($seller);
			}else{
				$ret = saveSeller($seller);	
			}
			
			if($ret>0){
				$smarty->assign("ret",$ret);
			}
			
			$smarty->assign("map",$seller);
		}
		else{
			//获取申请信息
			$ret = getSellerMyInfo($_SESSION['_shop_login_id']);
			
			if(!empty($ret) && count($ret)==1){
				$smarty->assign("map",$ret[0]);	
			}
			
		}
		
		require('_session.php');
		$smarty->display('core/templates/member_seller.tpl',md5($_SERVER["REQUEST_URI"]));
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
	
?>
