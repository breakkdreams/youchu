<?php 
	session_start();
	/**
	 * 促销活动 --满减
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
		$smarty->assign("head_title",'促销活动 --满减 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open5','');
		$smarty->assign('left_class5',' in');
	
		//类别
		$type = $_REQUEST['type'];
	
		//栏目ID
		$menu = $_REQUEST['menu'];
		
		//当前页数
		$page = 1;
		
		if(!empty($_REQUEST["page"])){
			$page = $_REQUEST["page"];
		}
		
		//每页显示记录数
		$page_limit = 20;
			
		//记录显示起始位数
		$rowid = ($page-1)*$page_limit+0;
			
		//总记录数
		$_count = getNewsCount($type);
			
		//分页内容列表 
		$array = getNewsPage($page_limit,$rowid,$type);
		
		$allpage = 1;
		
		if($_count%$page_limit==0){
			$allpage=$_count/$page_limit;	
		}else{
			$allpage=intval($_count/$page_limit)+1;
		}
		
		if($_count>0){
			$page_info = getHtmlPageStrCN($page,$_count,'news.php?page='.page.'&type='.$type,$page_limit);
		}else{
			$page_info='暂无相关记录';
		}
		
		$smarty->assign('list',$array);
		$smarty->assign('pages',$page_info);
		$smarty->assign('menu',$menu);
		$smarty->assign('type',$type);
				
		
		require('_session.php');
		
		$smarty->display('templates/act_mj.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
	
	
?>
