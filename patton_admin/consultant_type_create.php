<?php 
	session_start();
	/**
	 * 商品咨询类别创建
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
		$smarty->assign("head_title",'商品咨询类别创建 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open6','');
		$smarty->assign('left_class6',' in');
	

		//1.操作方式
		$cmd = $_REQUEST['operator']; //create 创建 edit 编辑
		
		if("create"==$cmd || "edit"==$cmd){

			$type = array();
			
			$type['c_id'] = $_REQUEST['c_id'];
			$type['c_name'] = $_REQUEST['c_name'];
						
			if("create"==$cmd){
				$ret = createConsultationType($type);
			}else{
				$ret = updateConsultationType($type);
			}
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='consultant_type.php';";
			echo '</script>';
		}
		else{
			
			$id = $_REQUEST['id'];
			
			if(is_numeric($id)){
				
				$ret = getConsultationTypeInfo($id);
				
				foreach($ret as $map){
					
				}
				
				$smarty->assign('map',$map);
			}
			
			require('_session.php');
		
			$smarty->display('templates/consultant_type_create.tpl',md5($_SERVER["REQUEST_URI"]));
		}	
		
	}
	
	
	
?>
