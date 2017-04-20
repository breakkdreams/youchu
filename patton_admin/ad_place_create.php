<?php 
	session_start();
	/**
	 * 广告位置-创建
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
		$smarty->assign("head_title",'广告位置-创建 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open8','');
		$smarty->assign('left_class8',' in');
	
		//1.操作方式
		$cmd = $_REQUEST['operator']; //create 创建 edit 编辑
		
		if("create"==$cmd || "edit"==$cmd){

			$ad = array();
			
			$ad['ad_id'] = $_REQUEST['ad_id'];
			$ad['ad_name'] = $_REQUEST['ad_name'];
						
			if("create"==$cmd){
				$ret = createADSite($ad);
			}else{
				$ret = updateADSite($ad);
			}
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='ad_place.php';";
			echo '</script>';
		}
		else{
			
			$id = $_REQUEST['id'];
			
			if(is_numeric($id)){
				
				$ret = getADSiteInfo($id);
				
				foreach($ret as $map){
					
				}
				
				$smarty->assign('map',$map);
			}
			
			require('_session.php');
		
			$smarty->display('templates/ad_place_create.tpl',md5($_SERVER["REQUEST_URI"]));
		}			
		
	}
	
	
	
?>
