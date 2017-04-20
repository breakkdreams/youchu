<?php
	session_start();
	/**
	 * 首页
	 */
	require('plugins.php');
	
	$smarty = new Smarty;

	$smarty->debugging = _debugging;
	$smarty->caching = _caching;
	$smarty->cache_lifetime = _cache_lifetime;
	
	$smarty->assign("dir",WEB_PATH);
	$smarty->assign("head_title",'会员登录 '.WEB_NAME);
	$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
	$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
	
	//用户注册
	if("register"==$_REQUEST['act'] && !empty($_REQUEST['register_name']) && !empty($_REQUEST['password'])){
		//1.接受参数
		$member = array();
		//1.1.手机号 
		$member['member_login'] = $_REQUEST['register_name']; 
		//1.2.密码
		$member['member_password'] = md5($_REQUEST['password']);
		//1.3.其他临时数据
		$member['member_phone'] = $_REQUEST['register_name'];
		//1.4.推荐人手机号
		$member['recommend_phone'] = $_REQUEST['recommend_phone'];

		//2.检测手机号是否已经存在
		$check = checkMember($member['member_login']);
				
		if($check*1>0){
			$smarty->assign('error',1);
			$smarty->display('core/templates/register.tpl',md5($_SERVER["REQUEST_URI"]));
		}
		else{
			$ret = saveMember($member);
			if($ret*1>0){
				$item = loginMember($member['member_login'],$member['member_password']);
				
				if(!empty($item)){
				    foreach($item as $map){
				    	//echo $map['member_login'];
					    $_SESSION["_shop_login_id"]= $map['member_id'];
					    $_SESSION["_shop_login_name"]= $map['member_login'];
					    $_SESSION["_shop_login_username"]= $map['member_name'];
					}

					//echo $_SESSION["_shop_login_name"];
					echo '<script>';
					echo "window.location='index.php';";
					echo '</script>';
					return;
				}
			}
			
			$smarty->assign('error',2);
			$smarty->display('core/templates/register.tpl',md5($_SERVER["REQUEST_URI"]));
		}
	}else{
		require('_session.php');
		$smarty->display('core/templates/register.tpl',md5($_SERVER["REQUEST_URI"]));
	}
?>
