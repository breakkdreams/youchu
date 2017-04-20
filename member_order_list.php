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
		
		//当前页数
		$page = 1;
		
		//查询条件
		$params = array();
		
		if(!empty($_REQUEST["page"])){
			$page = $_REQUEST["page"];
		}
		
		//每页显示记录数
		$page_limit = 5;
			
		//记录显示起始位数
		$rowid = ($page-1)*$page_limit+0;
			
		//总记录数
		$_count = getOrderCount($_SESSION['_shop_login_id']);
			
		//分页内容列表 
		$array = getOrderPage($page_limit,$rowid,$_SESSION['_shop_login_id']);
		
		$allpage = 1;
		
		if($_count%$page_limit==0){
			$allpage=$_count/$page_limit;	
		}else{
			$allpage=intval($_count/$page_limit)+1;
		}
		
		if($_count>0){
			$page_info = getHtmlPageStrCN($page,$_count,'member_order_list.php?page=#page#&f='.$_REQUEST['f'],$page_limit);
		}else{
			$page_info='暂无相关记录';
		}
		
		$smarty->assign('list',$array);
		$smarty->assign('pages',$page_info);
		
		if(!empty($array) && count($array)>0){
			
			$order_code = '';
			
			foreach ($array as $order){
				if($order_code==''){
					$order_code = $order['order_code'];
				}else{
					$order_code = $order_code.','.$order['order_code'];
				}
			}
			
			$info = getOrderInfoList($order_code);
			
			$smarty->assign("info",$info);
		}
		
		require('_session.php');
		$smarty->display('core/templates/member_order_list.tpl',md5($_SERVER["REQUEST_URI"]));
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
	
?>
