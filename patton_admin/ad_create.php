<?php 
	session_start();
	/**
	 * 广告-创建
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
		$smarty->assign("head_title",'广告-创建 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open8','');
		$smarty->assign('left_class8',' in');
	
		//1.操作方式
		$cmd = $_REQUEST['operator']; //create 创建 edit 编辑
		
		if("create"==$cmd || "edit"==$cmd){

			$ad = array();
			
			$ad['d_id'] = $_REQUEST['d_id'];
			$ad['d_area'] = $_REQUEST['d_area'];
			$ad['d_title'] = $_REQUEST['d_title'];
			$ad['d_pic'] = $_REQUEST['d_pic'];
			$ad['d_url'] = $_REQUEST['d_url'];
			$ad['d_time1'] = $_REQUEST['d_time1'];
			$ad['d_time2'] = $_REQUEST['d_time2'];
			$ad['product_id'] = $_REQUEST['product_id'];
			$ad['d_state'] = 1;
			$ad['ad_id'] = empty($_REQUEST['ad_id'])?0:$_REQUEST['ad_id'];
			
			if("create"==$cmd){
				$ret = createAD($ad);
			}else{
				$ret = updateAD($ad);
			}
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='ad_list.php';";
			echo '</script>';
		}
		else{
			
			$id = $_REQUEST['id'];
			
			if(is_numeric($id)){
				
				$ret = getADInfo($id);
				
				foreach($ret as $map){
					
				}
				
				$smarty->assign('map',$map);
			}
			$menu = getMenuByBackstage();
			$products = getProductByBackstage();
			$list = getADSiteList();
			$smarty->assign('menu',$menu);
			$smarty->assign('products',$products);
			$smarty->assign('list',$list);
					
			require('_session.php');
			
			$smarty->display('templates/ad_create.tpl',md5($_SERVER["REQUEST_URI"]));	
		}		
		
		
	}
	
	
	
?>
