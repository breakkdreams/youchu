<?php 
	session_start();
	/**
	 * 产品详细页
	 */
	require('../plugins.php');
	
	$smarty = new Smarty;

	$smarty->debugging = _debugging;
	$smarty->caching = _caching;
	$smarty->cache_lifetime = _cache_lifetime;
	
	$smarty->assign("dir",WEB_PATH);
	
	$id = $_REQUEST['id'];
	
	if(is_numeric($id)){
		
		$ret = getProductInfo($id);
		
		foreach($ret as $map){
			
		}
		$smarty->assign("map",$map);
		
		
	}
	
	$smarty->assign("head_title",$map['product_name'].''.WEB_NAME);
	
	//1.推荐产品
	$list = getProductLimit(10);
	$smarty->assign("list",$list);
		
	//2.所有商品分类
	$menu = getProductMenuList();
	$smarty->assign("menu",$menu);
	
	//3.区域列表
	$area = getAreaList();
	$smarty->assign("area",$area);
	
	require('../_session.php');
	
	$smarty->display('templates/detail.tpl',md5($_SERVER["REQUEST_URI"]));
	
?>
