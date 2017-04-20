<?php 
	session_start();
	/**
	 * 商品类别创建
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
		$smarty->assign("head_title",'商品类别创建'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open1','');
		$smarty->assign('left_class1',' in');
	
		//1.操作方式
		$cmd = $_REQUEST['operator']; //create 创建 edit 编辑
		
		if("create"==$cmd || "edit"==$cmd){

			$type = array();
			
			$type['v_id'] = $_REQUEST['v_id'];
			$type['v_name'] = $_REQUEST['v_name'];
			$type['v_photo'] = $_REQUEST['v_photo'];
			$type['v_describe'] = $_REQUEST['v_describe'];
						
			if("create"==$cmd){
				$ret = createProductVariety($type);
			}else{
				$ret = updateProductVariety($type);
			}
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='product_type.php';";
			echo '</script>';
		}
		else{
			
			$id = $_REQUEST['id'];
			
			if(is_numeric($id)){
				
				$ret = getProductVarietyInfo($id);
				
				foreach($ret as $map){
					
				}
				
				$smarty->assign('map',$map);
			}
			
			require('_session.php');
			
			$smarty->display('templates/product_type_create.tpl',md5($_SERVER["REQUEST_URI"]));	
		}
	}
	
	
	
?>
