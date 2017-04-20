<?php 
	session_start();
	
	require('../plugins.php');
	
	/**
	 * 我的购物车
	 */
	
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
	
		$smarty = new Smarty;
	
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		//$smarty->assign("head_title",'我的购物车');
		
		$myinfo = getMemberInfo($_SESSION["_shop_login_id"]);
		
		if(!empty($myinfo)){
			foreach($myinfo as $map){
				
			}
			$smarty->assign("myinfo",$map);
		}
		
		//1.购物车内容
		$list = getCartList($_SESSION["_shop_login_id"]);
		$cartlist = '';
		if(!empty($list)){
			$price = 0;
			foreach($list as $cart){
				if($cartlist==''){
					$cartlist = $cart['cart_id'];
				}else{
					$cartlist = $cartlist.','.$cart['cart_id'];
				}
				$price = $price+((empty($cart['type_price'])?$cart['product_price1']:$cart['type_price'])*$cart['cart_acount']);
			}
			$smarty->assign("total",$price);
			
		}
		$smarty->assign("cartlist",$cartlist);
		$smarty->assign("list",$list);
		require('require_type.php');
		require('../_session.php');
		
		//推荐商品
		$recommended = getTopProductList(6);
		$smarty->assign("recommended",$recommended);
		$smarty->assign("head_title",'我的购物车 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		//常用地址
		$addresslist=getMemberAddressList($_SESSION["_shop_login_id"]);
		$smarty->assign("addresslist",$addresslist);
		
		$smarty->display('templates/mycart.tpl',md5($_SERVER["REQUEST_URI"]));
	
	}
?>