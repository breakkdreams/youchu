<?php 
	session_start();
	/**
	 * 管理员-创建
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
		$smarty->assign("head_title",'管理员-创建 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open9','');
		$smarty->assign('left_class9',' in');
	
		//1.操作方式
		$cmd = $_REQUEST['operator']; //create 创建 edit 编辑
		
		if("create"==$cmd || "edit"==$cmd){

			$user = array();
			
			$user['u_id'] = $_POST['u_id'];
			$user['u_name'] = $_POST['u_name'];
			$user['u_username'] = $_POST['u_username'];
			$user['u_email'] = $_POST['u_email'];
			$user['u_role'] = $_POST['u_role'];
			
			if("create"==$cmd){
				
				$count = checkManagerName($user['u_name']);
				
				if($count==0){
					$user['u_password'] = 'e10adc3949ba59abbe56e057f20f883e';
					$ret = manage_create($user);
				}
				else{
					$ret = 0;
				}				
			}else{
				$ret = manage_update($user);
			}
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='user_list.php';";
			echo '</script>';
		}
		else{
			
			$id = $_REQUEST['id'];
			
			if(is_numeric($id)){
				
				$ret = getManagerInfo($id);
				
				foreach($ret as $map){
					
				}
				
				$smarty->assign('map',$map);
			}
			
			require('_session.php');
			
			$smarty->display('templates/user_create.tpl',md5($_SERVER["REQUEST_URI"]));	
		}		
		
		
	}
	
	
	
?>
