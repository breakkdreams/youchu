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
		$cmd = $_REQUEST['cmd']; 
		
		if("right"==$cmd){

			$user = array();
			
			$user['u_id'] = $_POST['u_id'];
			$user['r_menu'] = $_POST['r_item'];
			$user['r_product'] = $_POST['r_product'];
			
			//菜单权限 示例：#商品管理#,#会员管理#
			$menu_str = '';
			
			for ($i=0;$i<count($user['r_menu']);$i++){
				if($menu_str==''){
					$menu_str = '#'.$user['r_menu'][$i].'#';
				}
				else{
					$menu_str = $menu_str.',#'.$user['r_menu'][$i].'#';
				}
			}
			
			$user['r_menu'] = $menu_str;
			
			//商品权限示例：#蔬菜水果#,#海鲜#
			$product_str = '';
			
			for ($i=0;$i<count($user['r_product']);$i++){
				if($product_str==''){
					$product_str = '#'.$user['r_product'][$i].'#';
				}
				else{
					$product_str = $product_str.',#'.$user['r_product'][$i].'#';
				}
			}
			
			$user['r_product'] = $product_str;
						
			$ret = setManagerRight($user);
			
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
				
				//获取管理员信息
				$mgr = getManagerInfo($id);
				
				if(!empty($mgr) && count($mgr)==1){
					$smarty->assign('mgr_map',$mgr[0]);	
				}
				
				//获取权限信息
				$ret = getManagerRight($id);
				
				if(!empty($ret) && count($ret)==1){
					$smarty->assign('map',$ret[0]);
				}
				
				//获取产品栏目
				$menu = getProductMenuList();
				
				if(!empty($menu) && count($menu)>0){
					$smarty->assign('menu',$menu);
				}
			}
			
			$smarty->assign('u_id',$id);
			require('_session.php');
			
			$smarty->display('templates/user_right.tpl',md5($_SERVER["REQUEST_URI"]));	
		}		
		
		
	}
	
	
	
?>
