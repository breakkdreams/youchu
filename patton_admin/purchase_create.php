<?php 
	session_start();
	/**
	 * 商品进货记录-创建
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
		$smarty->assign("head_title",'商品进货记录-创建'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open2','');
		$smarty->assign('left_class2',' in');
	
		//1.操作方式
		$cmd = $_REQUEST['operator']; //create 创建 edit 编辑
		
		if("create"==$cmd || "edit"==$cmd){

			$purchase = array();
			
			$purchase['pur_id'] = $_POST['pur_id'];
			$purchase['product_id'] = $_POST['product_id'];
			$purchase['pur_purchaser'] = $_POST['pur_purchaser'];
			$purchase['pur_time'] = $_POST['pur_time'];
			$purchase['pur_count'] = $_POST['pur_count'];
			$purchase['pur_price1'] = $_POST['pur_price1'];
			$purchase['pur_price2'] = $_POST['pur_price2'];
			$purchase['pur_supplier'] = $_POST['pur_supplier'];
			$purchase['pur_warehouse'] = $_POST['pur_warehouse'];
			$purchase['pur_operator'] = $_SESSION['_id'];
			
			if("create"==$cmd){
				$ret = savePurchase($purchase);
			}else{
				$ret = updatePurchase($purchase);
			}
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='purchase_list.php?product_id=".$purchase['product_id']."';";
			echo '</script>';
		}
		else{
			
			//查询商品
			$params = array();
			
			$params['product_id'] = $_REQUEST['product_id'];
			
			if(is_numeric($params['product_id'])){
				
				$product_ret = getProductInfo($params['product_id']);
				
				if(!empty($product_ret) && count($product_ret)==1){
					$smarty->assign("product",$product_ret[0]);
				}
			}
			
			$id = $_REQUEST['id'];
			
			if(is_numeric($id)){
				
				$ret = getPurchaseInfo($id);
				
				if(!empty($ret) && count($ret)==1){
					$smarty->assign('map',$ret[0]);	
				}
				
			}
			
			require('_session.php');
			
			$smarty->display('templates/purchase_create.tpl',md5($_SERVER["REQUEST_URI"]));	
		}		
		
	}

?>
