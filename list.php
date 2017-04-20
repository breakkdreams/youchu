<?php 
	session_start();
	/**
	 * 商品分类
	 */
	require('plugins.php');
	
	$_ismobile = isMobile();
	
	if($_ismobile){
	    require('mobile_do.php');
	}else{
		$smarty = new Smarty;
		
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'商品分类'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		//1.左侧推荐产品
		$left = getProductLimit(5);
		$smarty->assign("left",$left);
		
		//2.所有商品分类
		$menu = getProductMenuList();
		$smarty->assign("menu",$menu);
		
		//查询条件
		$params = array();
		
		$params['product_online']=1;
		$params['product_delete']=0;
		
		//当前页数
		$page = 1;
		
		//查询条件
		$params = array();
		
		$params['product_online']=1;
		$params['product_delete']=0;
		//查询栏目要求
		$params['m_floor']=$_REQUEST['f'];
		//查询关键字
		$params['product_name']=$_REQUEST['key'];
		
		if(!empty($_REQUEST["page"])){
			$page = $_REQUEST["page"];
		}
		
		//每页显示记录数
		$page_limit = 20;
			
		//记录显示起始位数
		$rowid = ($page-1)*$page_limit+0;
			
		//总记录数
		$_count = getProductCount($params);
			
		//分页内容列表 
		$array = getProductPage($page_limit,$rowid,$params);
		
		$allpage = 1;
		
		if($_count%$page_limit==0){
			$allpage=$_count/$page_limit;	
		}else{
			$allpage=intval($_count/$page_limit)+1;
		}
		
		if($_count>0){
			$page_info = getHtmlPageStrCN($page,$_count,'list.php?page=#page#&f='.$_REQUEST['f'],$page_limit);
		}else{
			$page_info='暂无相关记录';
		}
		
		$smarty->assign('list',$array);
		$smarty->assign('pages',$page_info);
			
		require('_session.php');
		$smarty->display('core/templates/list.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
?>
