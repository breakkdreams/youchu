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
		
		$id = $_REQUEST['id'];
		
		if(is_numeric($id)){
			
			//1.订单主信息
			$ret = getOrderInfo($_SESSION['_shop_login_id'],$id);
			
			if(!empty($ret) && count($ret)==1){
				$map = $ret[0];
				
				//2.订单商品信息
				$list = getOrderInfoList($map['order_code']);
				
				$product_name = '';
				
				foreach($list as $item){
					if($product_name==''){
						$product_name = $item['product_name'];
					}
					else{
						$product_name = $product_name.','.$item['product_name'];
					}
				}
				
				$smarty->assign('order_price',$map['order_price']);
				$smarty->assign('order_phone',$map['get_phone']);
				$smarty->assign('order_tel',$map['get_tel']);
				$smarty->assign('order_address',$map['get_address']);
				$smarty->assign('order_code',$map['order_code']);
				$smarty->assign('order_user',$map['get_name']);
				$smarty->assign("map",$map);
				$smarty->assign("product_name",$product_name);
			}
		}
		
		require('_session.php');
		$smarty->display('core/templates/order_pay.tpl',md5($_SERVER["REQUEST_URI"]));
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
	
?>
