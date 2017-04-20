<?php 
	session_start();
	/**
	 * 友情链接 创建
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
		$smarty->assign("head_title",'友情链接 创建'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open9','');
		$smarty->assign('left_class9',' in');
	
	//1.操作方式
		$cmd = $_REQUEST['operator']; //create 创建 edit 编辑
		
		if("create"==$cmd || "edit"==$cmd){

			$link = array();
			
			$link['u_id'] = $_POST['u_id'];
			$link['u_name'] = $_POST['u_name'];
			$link['u_link'] = $_POST['u_link'];
			$link['u_order'] = empty($_POST['u_order'])?0:$_POST['u_order'];
			$link['u_display'] = empty($_POST['u_display'])?0:$_POST['u_display'];
			$link['u_photo'] = $_POST['u_photo'];
			$link['city_id'] = 0;
			$link['u_type'] = 0;
			
			if("create"==$cmd){
				$ret = createLinkSite($link);
			}else{
				$ret = updateLinkSite($link);
			}
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='link_list.php';";
			echo '</script>';
		}
		else{
			
			$id = $_REQUEST['id'];
			
			if(is_numeric($id)){
				
				$ret = getLinkSiteInfo($id);
				
				foreach($ret as $map){
					
				}
				
				$smarty->assign('map',$map);
			}
			
			require('_session.php');
		
			$smarty->display('templates/link_create.tpl',md5($_SERVER["REQUEST_URI"]));	
		}		
		
	}
	
	
	
?>
