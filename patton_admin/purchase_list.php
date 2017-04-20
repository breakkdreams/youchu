<?php 
	session_start();
	/**
	 * 商品进货记录
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
		$smarty->assign("head_title",'商品进货记录'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open2','');
		$smarty->assign('left_class2',' in');
			
		//查询商品
		$params = array();
		
		$params['product_id'] = $_REQUEST['product_id'];
		
		if(is_numeric($params['product_id'])){
			
			$product_ret = getProductInfo($params['product_id']);
			
			if(!empty($product_ret) && count($product_ret)==1){
				$smarty->assign("map",$product_ret[0]);
				
				//当前页数
				$page = 1;
				
				if(!empty($_REQUEST["page"])){
					$page = $_REQUEST["page"];
				}
				
				//每页显示记录数
				$page_limit = 10;
					
				//记录显示起始位数
				$rowid = ($page-1)*$page_limit+0;
					
				//总记录数
				$_count = getPurchaseCount($params);
					
				//分页内容列表 
				$array = getPurchasePage($page_limit,$rowid,$params);
				
				$allpage = 1;
				
				if($_count%$page_limit==0){
					$allpage=$_count/$page_limit;	
				}else{
					$allpage=intval($_count/$page_limit)+1;
				}
				
				if($_count>0){
					$page_info = getHtmlPageStrCN($page,$_count,'purchase_list.php?page='.page.'&product_id='.$params['product_id'],$page_limit);
				}else{
					$page_info='暂无相关记录';
				}
				
				$smarty->assign('product_id',$params['product_id']);
				$smarty->assign('list',$array);
				$smarty->assign('pages',$page_info);
			}
			
			require('_session.php');
		
			$smarty->display('templates/purchase_list.tpl',md5($_SERVER["REQUEST_URI"]));
		}
		else{
			echo "<script>alert('记录出错');</script>";
			echo '<script>window.location.href="login.php";</script>';
		}
		
	}
	
	
	
?>
