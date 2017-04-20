<?php 
	session_start();
	/**
	 * 商品类目创建
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
		$smarty->assign("head_title",'商品类目创建'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open1','');
		$smarty->assign('left_class1',' in');
	
		if("create"==$_REQUEST['operator'] || "update"==$_REQUEST['operator']){
			$menu = array();
		
			$menu['m_id'] = $_REQUEST["m_id"];
			$menu['m_fid'] = $_REQUEST["fid"];
			$menu['m_name'] = $_REQUEST["m_name"];
			$menu['m_keyword'] = $_REQUEST["m_keyword"];
			$menu['m_size'] = $_REQUEST["size"];
			$menu['m_floor'] = $_REQUEST["floor"];
			$menu['m_photo'] = $_REQUEST["m_photo"];
			$menu['m_photo2'] = $_REQUEST["m_photo2"];
			$menu['m_url'] = $_REQUEST["m_url"];
			$menu['m_order'] = empty($_REQUEST['m_order'])?'1':$_REQUEST['m_order'];	
			
			if("create"==$_REQUEST['operator']){
				$ret = createProductMenu($menu);
			}else{
				$ret = updateProductMenu($menu);
			}
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='product_menu.php';";
			echo '</script>';
		}
		else{
			
			//1.商品栏目列表
			$list = getProductMenuList();
			$smarty->assign('list',$list);
			
			//2.父级菜单（当指定父级栏目需要添加子栏目的时候）
			$parent_id = $_REQUEST['parent_id'];
			$smarty->assign('parent_id',$parent_id);
			
			//3.当编辑状态时候调取栏目信息
			$id = $_REQUEST['id'];
			
			if(is_numeric($id)){
				$ret = getProductMenu($id);
				
				foreach($ret as $map){
					
				}
				
				$smarty->assign('map',$map);
				$smarty->assign('operator','update');
			}else{
				$smarty->assign('operator','create');
			}
			
			require('_session.php');
		
			$smarty->display('templates/product_menu_create.tpl',md5($_SERVER["REQUEST_URI"]));
		}
				
		
	}
	
	
	
?>
