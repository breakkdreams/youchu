<?php 
	session_start();
	/**
	 * 产品详细页
	 */
	require('../plugins.php');
	
	if(!empty($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		
		$item = getProductInfo($id);
		
		if(!empty($item)){
			
			foreach($item as $map){
				
			}
			
			$smarty = new Smarty;

			$smarty->debugging = _debugging;
			$smarty->caching = _caching;
			$smarty->cache_lifetime = _cache_lifetime;
			
			$smarty->assign("dir",WEB_PATH);
			$smarty->assign("head_title",'产品信息');
	
			$smarty->assign("id",$map['product_id']);
			$smarty->assign("title",$map['product_name']);
			$smarty->assign("code",$map['product_code']);
			$smarty->assign("type",$map['m_name']);
			$smarty->assign("brand",$map['brand_name']);
			$smarty->assign("units",$map['product_units']);
			$smarty->assign("time",$map['product_time']);
			$smarty->assign("weight",$map['product_weight']);
			$smarty->assign("place",$map['product_place']);
			$smarty->assign("vip_price",$map['vip_price']);

			$smarty->assign("price1",$map['product_price1']);
			$smarty->assign("price2",$map['product_price2']);
			$smarty->assign("pic",$map['product_pic']);
			$smarty->assign("content",$map['product_content']);
			
			$smarty->assign("amount",$map['product_amount']);
			$smarty->assign("item",$map['item_amount']);
			
			if(!empty($map['item_amount'])){
				$productitem=getProductitemList($map['product_id']);
				$smarty->assign("productitem",$productitem);
			}
			
			
			//照片集合 <a href="#"><img src="images/a1.jpg" width="40" height="40"></a>
			if(!empty($map['product_logo'])){
				$pics = explode(",",$map['product_logo']);
				
				$smarty->assign("pics",$pics);
			}
			
			require('../_session.php');
			require('require_type.php');
			
			$smarty->display('templates/page.tpl',md5($_SERVER["REQUEST_URI"]));
		}
	}
	
?>
