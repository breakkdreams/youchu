<?php 
	session_start();
	/**
	 * 购物车
	 */
	require('plugins.php');
	
	if(!empty($_SESSION['_shop_login_id'])){
		$smarty = new Smarty;
		
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'购物车'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);

		//添加购物车
		if('fromDetail'==$_REQUEST['cart_cmd']){
			
			//产品名称
			$smarty->assign('add_name',$_REQUEST['cart_name']);
			//产品标题
			$smarty->assign('add_title',$_REQUEST['cart_title']);
			//产品图片
			$smarty->assign('add_pic',$_REQUEST['cart_pic']);
			
			$smarty->assign('flag','cart');
			
			//新商品保存到购物车
			$cart = array();
			
			$cart['member_id'] = $_SESSION['_shop_login_id']; 
			$cart['product_id'] = $_REQUEST['cart_item']; 
			$cart['type_id'] = empty($_REQUEST['type_id'])?0:$_REQUEST['type_id']; 
			$cart['cart_acount'] = empty($_REQUEST['cart_num'])?1:$_REQUEST['cart_num']; 
			$cart['is_taocan'] = empty($_REQUEST['is_taocan'])?0:$_REQUEST['is_taocan']; 
			
			$ret = addCart($cart);
		}
			
		//购物车 列表
		$list = getCartList($_SESSION['_shop_login_id']);
		$smarty->assign('list',$list);
		
		//推荐商品列表
		$top = getProductLimit(5);
		$smarty->assign('top',$top);
		
		require('_session.php');
		$smarty->display('core/templates/cart_list.tpl',md5($_SERVER["REQUEST_URI"]));
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
	
?>
