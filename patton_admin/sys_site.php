<?php 
	session_start();
	/**
	 * 系统设置-站点信息
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
		$smarty->assign("head_title",'系统设置-站点信息'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open12','');
		$smarty->assign('left_class12',' in');
	

		$cmd = $_REQUEST['cmd'];
		
		if('create'==$cmd || 'edit'==$cmd){
			
			$basic = array();
			
			$basic['b_www'] = $_POST['b_www'];
			$basic['b_website'] = $_POST['b_website'];
			$basic['b_title'] = $_POST['b_title'];
			$basic['b_keyword'] = $_POST['b_keyword'];
			$basic['b_describe'] = $_POST['b_describe'];
			$basic['b_admin'] = $_POST['b_admin'];
			$basic['b_number'] = $_POST['b_number'];
			$basic['b_company'] = $_POST['b_company'];
			$basic['b_address'] = $_POST['b_address'];
			$basic['b_tel'] = $_POST['b_tel'];
			$basic['b_fox'] = $_POST['b_fox'];
			$basic['b_code'] = $_POST['b_code'];
			$basic['b_email'] = $_POST['b_email'];
			$basic['b_info'] = $_POST['b_info'];
			$basic['b_logo'] = $_POST['b_logo'];

			$basic['b_info'] = str_replace("&quot;",'',$basic['b_info']);
			$basic['b_info'] = str_replace("\\&quot;",'',$basic['b_info']);
			$basic['b_info'] = str_replace("\\",'',$basic['b_info']);
			
			$ret = updateBasic($basic);
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='sys_site.php';";
			echo '</script>';
		}
		else{
			$ret = getBasic();
				
			if(!empty($ret) && count($ret)==1){
				$smarty->assign('map',$ret[0]);
			}
			
			require('_session.php');
		
			$smarty->display('templates/sys_site.tpl',md5($_SERVER["REQUEST_URI"]));
		}
		
	}
	
	
	
?>
