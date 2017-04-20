<?php 
	session_start();
	/**
	 * 首页
	 */
	require('plugins.php');
	
	$_ismobile = isMobile();
	
	if($_ismobile){
	   require('mobile_do.php');
	}else{
		$smarty = new Smarty;
		
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'首页 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		//限时抢购
		$list1 = getRecommendProduct(5,1);
		//猜你喜欢
		$list2 = getRecommendProduct(5,2);
		//超值热销
		$list3 = getRecommendProduct(5,3);
		//新品上架
		$list4 = getRecommendProduct(5,4);
		
		$smarty->assign("list1",$list1);
		$smarty->assign("list2",$list2);
		$smarty->assign("list3",$list3);
		$smarty->assign("list4",$list4);
		
		
		//1.粮油调味
		$list5 = getProductLimit(6,'16,31,32,33,37,38,39,44,45');
		
		//2.酒水饮料
		$list6 = getProductLimit(6,'59,60,61,62,63,64,65,66,67,70,71');
		
		//3.海鲜水产
		$list7 = getProductLimit(6,'55');
		
		//4.办公用品
		$list8 = getProductLimit(6,'25,26,27');
		
		$smarty->assign("list5",$list5);
		$smarty->assign("list6",$list6);
		$smarty->assign("list7",$list7);
		$smarty->assign("list8",$list8);
		
		//所有商品分类
		$menu = getProductMenuList();
		$smarty->assign("menu",$menu);
		
		//广告
		$ad = getADList();
		$smarty->assign("ad",$ad);
		
		require('_session.php');
		
		$smarty->display('core/templates/index.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
?>
