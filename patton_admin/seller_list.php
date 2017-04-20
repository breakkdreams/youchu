<?php 
	session_start();
	/**
	 * 商铺列表
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
		$smarty->assign("head_title",'商铺列表'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open9','');
		$smarty->assign('left_class9',' in');
			
		if("state"==$_REQUEST["cmd"] && !empty($_REQUEST["id"])){
			$id = $_REQUEST["id"];
			$checked = "true"==$_REQUEST["check"]?'1':'0';
			$seller = array();
			$seller['s_id'] = $id;
			$seller['s_state'] = $checked;
			
			$ret = vettedSellerInfo($seller);
			echo '<script>';
			echo $ret==1?"alert('保存成功');":"alert('保存失败');";
			echo "window.location='seller_list.php?page=".$_REQUEST["page"]."';";
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
		$_count = getSellerCount();
			
		//分页内容列表 
		$array = getSellerPage($page_limit,$rowid);
		
		$allpage = 1;
		
		if($_count%$page_limit==0){
			$allpage=$_count/$page_limit;	
		}else{
			$allpage=intval($_count/$page_limit)+1;
		}
		
		if($_count>0){
			$page_info = getHtmlPageStrCN($page,$_count,'seller_list.php?page='.page,$page_limit);
		}else{
			$page_info='暂无相关记录';
		}
		
		$smarty->assign('list',$array);
		$smarty->assign('pages',$page_info);
		
		require('_session.php');
		
		$smarty->display('templates/seller_list.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
	
	
?>
