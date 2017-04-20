<?php 
	session_start();
	/**
	 * 订单详细信息
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
		$smarty->assign("head_title",'订单详细信息'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open4','');
		$smarty->assign('left_class4',' in');
	
		$cmd = $_POST['cmd'];
		
		//发货操作
		if('dosend'==$cmd){
			//订单ID
			$order_id = $_POST['order_id'];
			//发货信息
			$info = array();
			$info['order_id'] = $order_id;
			$info['send_type'] = $_POST['send_type'];
			$info['send_company'] = $_POST['send_company'];
			$info['send_code'] = $_POST['send_code'];
			
			if(is_numeric($order_id)){
				$ret = sendOrder($info);
			}
			
			if($ret>0){
				echo '<script>';
				echo "alert('发货成功');";
				echo "window.location.href='order_list3.php';";
				echo '</script>';
			}else{
				echo '<script>';
				echo "alert('发货失败，请重试');";
				echo "window.location.href='order_list2.php';";
				echo '</script>';
			}
			
		}
		//显示订单信息
		else{
			$id = $_REQUEST['id'];
		
			if(is_numeric($id)){
				
				//1.订单主信息
				$ret = getOrderInfoByManager($id);
				
				if(!empty($ret) && count($ret)==1){
					$map = $ret[0];
					
					//2.订单商品信息
					$list = getOrderInfoList($map['order_code']);
					
					$smarty->assign("map",$map);
					$smarty->assign("list",$list);
				}
			}		
			require('_session.php');
			$smarty->assign('cmd',$_REQUEST['cmd']);
			$smarty->display('templates/order_detail.tpl',md5($_SERVER["REQUEST_URI"]));
		}
	}
	
?>
