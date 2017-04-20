<?php 
	session_start();
	/**
	 * 订单确认
	 */
	require('../plugins.php');
	
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		$smarty = new Smarty;
	
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'订单确认');
		
		$myinfo = getMemberInfo($_SESSION["_shop_login_id"]);
		
		if(!empty($myinfo)){
			foreach($myinfo as $map){
				
			}
			$smarty->assign("myinfo",$map);
		}
		
		//1.购物车内容
		//$list = getCartList($_SESSION["_shop_login_id"]);
		$list = getOrderTemp($_SESSION["_shop_login_id"],$_SESSION["_order_temp"]);
		if(!empty($list)){
			$product_list = '';
			$price = 0;
			foreach($list as $cart){
				if($product_list==''){
					$product_list = $cart['product_id'];
				}else{
					$product_list = $product_list.','.$cart['product_id'];
				}
				$price = $price+((empty($cart['type_price'])?$cart['product_price1']:$cart['type_price'])*$cart['cart_acount']);
			}
			$smarty->assign("total",$price);
			$smarty->assign("product_list",$product_list);
		}
		
		$smarty->assign("list",$list);
		
		require('require_type.php');
		require('../_session.php');
		
		$smarty->display('templates/mycart2.tpl',md5($_SERVER["REQUEST_URI"]));
	}
?>
