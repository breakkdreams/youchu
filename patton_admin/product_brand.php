<?php 
	session_start();
	/**
	 * 商品品牌
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
		$smarty->assign("head_title",'商品品牌'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open1','');
		$smarty->assign('left_class1',' in');
		
		//1删除操作
		if("delete"==$_REQUEST["cmd"] && !empty($_REQUEST["id"])){
			$delete_id = $_REQUEST["id"];
			$ret = deleteBrand($delete_id);
			echo '<script>';
			echo $ret==1?"alert('操作成功');":"alert('操作失败');";
			echo "window.location='product_brand.php';";
			echo '</script>';
		}
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
		$_count = getBrandCount();
			
		//分页内容列表 
		$array = getBrandPage($page_limit,$rowid);
		
		$allpage = 1;
		
		if($_count%$page_limit==0){
			$allpage=$_count/$page_limit;	
		}else{
			$allpage=intval($_count/$page_limit)+1;
		}
		
		if($_count>0){
			$page_info = getHtmlPageStrCN($page,$_count,'product_brand.php?page=#page#',$page_limit);
		}else{
			$page_info='暂无相关记录';
		}
		
		$smarty->assign('list',$array);
		$smarty->assign('pages',$page_info);
		
		require('_session.php');
		
		$smarty->display('templates/product_brand.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
	
	
?>
