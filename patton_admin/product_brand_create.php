<?php 
	session_start();
	/**
	 * 商品品牌-创建
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
		$smarty->assign("head_title",'商品品牌-创建'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open1','');
		$smarty->assign('left_class1',' in');
	
		//1.操作方式
		$cmd = $_REQUEST['operator']; //create 创建 edit 编辑
		
		if("create"==$cmd || "edit"==$cmd){

			$brand = array();
			
			$brand['brand_id'] = $_REQUEST['brand_id'];
			$brand['brand_name'] = $_REQUEST['brand_name'];
			$brand['brand_web'] = $_REQUEST['brand_web'];
			$brand['brand_describe'] = $_REQUEST['brand_describe'];
			$brand['brand_display'] = $_REQUEST['brand_display'];
			$brand['brand_photo'] = $_REQUEST['brand_photo'];
			$brand['brand_type'] = $_REQUEST['brand_type'];
			$brand['brand_phone'] = $_REQUEST['brand_phone'];
			$brand['brand_linkman'] = $_REQUEST['brand_linkman'];
			$brand['brand_mobile'] = $_REQUEST['brand_mobile'];
			$brand['brand_b1'] = $_REQUEST['brand_b1'];
			$brand['brand_b2'] = $_REQUEST['brand_b2'];
			$brand['brand_b3'] = $_REQUEST['brand_b3'];
			$brand['brand_b4'] = $_REQUEST['brand_b4'];
			$brand['brand_producer'] = $_REQUEST['brand_producer'];
			$brand['brand_address'] = $_REQUEST['brand_address'];
			$brand['brand_info'] = $_REQUEST['brand_info'];
			$brand['brand_license'] = $_REQUEST['brand_license'];	
			
			if("create"==$cmd){
				$ret = saveBrand($brand);
			}else{
				$ret = updateBrand($brand);
			}
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='product_brand.php';";
			echo '</script>';
		}
		else{
			
			$id = $_REQUEST['id'];
			
			if(is_numeric($id)){
				
				$ret = getBrandInfo($id);
				
				foreach($ret as $map){
					
				}
				
				$smarty->assign('map',$map);
			}
			
			require('_session.php');
			
			$smarty->display('templates/product_brand_create.tpl',md5($_SERVER["REQUEST_URI"]));	
		}		
		
	}
	
	
	
?>
