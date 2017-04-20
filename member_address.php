<?php 
	session_start();
	/**
	 * 我的账户-收货地址
	 */
	require('plugins.php');
	
	
	
	if(!empty($_SESSION['_shop_login_id'])){
		$smarty = new Smarty;
		
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'我的账户-收货地址-生鲜网 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign("member_left_class7",'class="account_feature feature_choose"');
		
		$cmd = $_REQUEST['cmd'];
		
		if('create'==$cmd || 'edit'==$cmd){
			
			$address = array();
			
			$address['a_id'] = $_REQUEST['session_id'];
			$address['a_name'] = $_REQUEST['a_name'];
			$address['a_phone'] = $_REQUEST['a_phone'];
			$address['a_tel'] = $_REQUEST['a_tel'];
			$address['a_address'] = $_REQUEST['a_address'];
			$address['a_mark'] = $_REQUEST['a_mark'];
			$address['member_id'] = $_SESSION['_shop_login_id'];
			
			if('create'==$cmd){
				$ret = createMemberAddress($address);
			}else{
				$ret = updateMemberAddress($address);
			}
			
			echo '<script>';
			echo "window.location.href='member_address.php';";
			echo '</script>';
		}
		else if('delete'==$_REQUEST['cmd2']){
			$id = $_REQUEST['session_id2'];
			
			if(is_numeric($id)){
				deleteMemberAddress($id);
			}
			
			echo '<script>';
			echo "window.location.href='member_address.php';";
			echo '</script>';
		}
		
		$list = getMemberAddressList($_SESSION['_shop_login_id']);
		$smarty->assign("list",$list);
		
		require('_session.php');
		$smarty->display('core/templates/member_address.tpl',md5($_SERVER["REQUEST_URI"]));
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
	
?>
