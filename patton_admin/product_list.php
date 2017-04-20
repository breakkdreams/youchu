<?php 
	session_start();
	/**
	 * 商品-列表
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
		$smarty->assign("head_title",'商品列表'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open2','');
		$smarty->assign('left_class2',' in');
		
		//1删除操作
		if("delete"==$_REQUEST["cmd"] && !empty($_REQUEST["id"])){
			$delete_id = $_REQUEST["id"];
			$ret = deleteProduct($delete_id);
			echo '<script>';
			echo $ret==1?"alert('操作成功');":"alert('操作失败');";
			echo "window.location='product_list.php?page=".$_REQUEST["page"]."&product_name=".myREQUEST('productName')."';";
			echo '</script>';
		}
		//2推荐操作
		else if("type"==$_REQUEST["cmd"] && !empty($_REQUEST["id"])){
			$type = $_REQUEST['type'];
			$id = $_REQUEST["id"];
			$checked = "true"==$_REQUEST["check"]?'1':'0';
			$ret = updateProductType($type,$id,$checked);
			echo '<script>';
			echo $ret==1?"alert('保存成功');":"alert('保存失败');";
			echo "window.location='product_list.php?page=".$_REQUEST["page"]."&product_name=".myREQUEST('product_name')."';";
			echo '</script>';
		}
		//3上架下架
		else if("online"==$_REQUEST["cmd"] && !empty($_REQUEST["id"])){
			$id = $_REQUEST["id"];
			$checked = "true"==$_REQUEST["check"]?'1':'0';
			$ret = updateProductOnline($id,$checked);
			echo '<script>';
			echo $ret==1?"alert('保存成功');":"alert('保存失败');";
			echo "window.location='product_list.php?page=".$_REQUEST["page"]."&product_name=".myREQUEST('product_name')."';";
			echo '</script>';
		}else{
			//当前页数
			$page = 1;
			
			//查询条件
			$params = array();
			
			$params['product_online']=1;
			$params['product_delete']=0;
			$params['product_name']= myREQUEST('product_name');
			
			if(!empty($_REQUEST["page"])){
				$page = $_REQUEST["page"];
			}
			
			//每页显示记录数
			$page_limit = 10;
				
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
				$page_info = getHtmlPageStrCN($page,$_count,'product_list.php?page=#page#&product_name='.$params['product_name'],$page_limit);
			}else{
				$page_info='暂无相关记录';
			}
			
			$smarty->assign('list',$array);
			$smarty->assign('page',$page);
			$smarty->assign('pages',$page_info);
			$smarty->assign('product_name',$params['product_name']);
					
			require('_session.php');
			
			$smarty->display('templates/product_list.tpl',md5($_SERVER["REQUEST_URI"]));
		}
	
	}
	
?>
