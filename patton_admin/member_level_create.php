<?php 
	session_start();
	/**
	 * 会员 等级编辑
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
		$smarty->assign("head_title",'会员等级 编辑'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open3','');
		$smarty->assign('left_class3',' in');
	
				
		//1.操作方式
		$cmd = $_REQUEST['operator']; //create 创建 edit 编辑
		
		if("create"==$cmd || "edit"==$cmd){

			$type = array();
			
			$type['level_id'] = $_REQUEST['level_id'];
			$type['level_name'] = $_REQUEST['level_name'];
			$type['level_point1'] = $_REQUEST['level_point1'];
			$type['level_logo'] = $_REQUEST['level_logo'];
			$type['level_describe'] = $_REQUEST['level_describe'];
						
			if("create"==$cmd){
				$ret = createMemberLevel($type);
			}else{
				$ret = updateMemberLevel($type);
			}
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='member_level.php';";
			echo '</script>';
		}
		else{
			
			$id = $_REQUEST['id'];
			
			if(is_numeric($id)){
				
				$ret = getMemberLevelInfo($id);
				
				foreach($ret as $map){
					
				}
				
				$smarty->assign('map',$map);
			}
			
			require('_session.php');
		
			$smarty->display('templates/member_level_create.tpl',md5($_SERVER["REQUEST_URI"]));
		}
		
	}
	
	
	
?>
