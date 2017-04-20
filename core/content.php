<?php 
session_start();
	require('../plugins.php');
	
	$smarty = new Smarty;

	$smarty->debugging = _debugging;
	$smarty->caching = _caching;
	$smarty->cache_lifetime = _cache_lifetime;
	
	$smarty->assign("dir",WEB_PATH);
	$smarty->assign("head_title",'产品内容 ');
	$smarty->assign("menu_class2",'style="color:#F60;"');
	$smarty->assign("menu_icon2",'class="v2_2"');
			
	$id = myREQUEST('id');
	
	if(is_numeric($id) && $id>0){
		
		$ret = getProductInfo($id);
		
		foreach($ret as $map){
			
		}
		$content =  str_replace("<img","<img width='100%' ",$map['product_content']);
		$content =  str_replace("width: 768px;","width: 100%; ",$content);
		
		$smarty->assign("content",$content);
		$smarty->assign("map",$map);
		$smarty->assign('member_info',$_SESSION['member_info']);
		$smarty->display('content.tpl',md5($_SERVER["REQUEST_URI"]));
	}
?>