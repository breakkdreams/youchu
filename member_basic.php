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
		
		$smarty->assign("member_left_class5",'class="account_feature feature_choose"');
		
		if('edit'==$_REQUEST['cmd']){
			
			$member = array();
			
			$member['member_name'] = $_REQUEST['member_name'];
			$member['member_email'] = $_REQUEST['member_email'];
			$member['member_tel'] = $_REQUEST['member_tel'];
			$member['member_phone'] = $_REQUEST['member_phone'];
			$member['member_zip'] = $_REQUEST['member_zip'];
			$member['member_address'] = $_REQUEST['member_address'];
			$member['member_sex'] = $_REQUEST['member_sex'];
			$member['member_birthday'] = $_REQUEST['member_birthday'];
			$member['member_realname'] = $_REQUEST['member_realname'];
			$member['member_city'] = $_REQUEST['member_city'];
			$member['member_qq'] = $_REQUEST['member_qq'];
			$member['member_wang'] = $_REQUEST['member_wang'];
			$member['member_weixin'] = $_REQUEST['member_weixin'];
			$member['member_weibo'] = $_REQUEST['member_weibo'];
			$member['member_job'] = $_REQUEST['member_job'];
			$member['member_photo'] = $_REQUEST['member_photo'];
			$member['member_id'] = $_SESSION['_shop_login_id'];
			
			$ret = updateMember($member);
			
			if($ret>0){
				$_SESSION["_shop_login_map"] = $member;
				$smarty->assign("ret",$ret);
			}
		}
		else{
			$smarty->assign("map",$_SESSION["_shop_login_map"]);
		}
		
		require('_session.php');
		$smarty->display('core/templates/member_basic.tpl',md5($_SERVER["REQUEST_URI"]));
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
	
?>
