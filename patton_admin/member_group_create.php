<?php 
	session_start();
	/**
	 * 会员 分组编辑
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
		$smarty->assign("head_title",'会员 分组编辑'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open3','');
		$smarty->assign('left_class3',' in');
	
				
	//1.操作方式
		$cmd = $_REQUEST['operator']; //create 创建 edit 编辑
		
		if("create"==$cmd || "edit"==$cmd){

			$type = array();
			
			$type['group_id'] = $_REQUEST['group_id'];
			$type['group_name'] = $_REQUEST['group_name'];
			$type['group_describe'] = $_REQUEST['group_describe'];
						
			if("create"==$cmd){
				$ret = createMemberGroup($type);
			}else{
				$ret = updateMemberGroup($type);
			}
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='member_group.php';";
			echo '</script>';
		}
		else{
			
			$id = $_REQUEST['id'];
			
			if(is_numeric($id)){
				
				$ret = getMemberGroupInfo($id);
				
				foreach($ret as $map){
					
				}
				
				$smarty->assign('map',$map);
			}
			
			require('_session.php');
		
			$smarty->display('templates/member_group_create.tpl',md5($_SERVER["REQUEST_URI"]));
		}
		
	}
	
	
	
?>
