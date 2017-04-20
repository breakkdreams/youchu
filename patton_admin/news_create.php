<?php 
	session_start();
	/**
	 * 文章编辑
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
		$smarty->assign("head_title",'文章编辑 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open7','');
		$smarty->assign('left_class7',' in');
	
		$cmd = $_REQUEST['cmd'];
		
		if('create'==$cmd || 'edit'==$cmd){
			
			$news = array();
			
			$news['n_id']=$_REQUEST['n_id'];
			$news['city_id']=0;
			$news['n_title']=$_REQUEST['n_title'];
			$news['n_type1']=$_REQUEST['n_type1'];
			$news['n_type2']=0;
			$news['n_type3']=0;
			$news['n_addtime']=date('y-m-dh:i:s',time());;
			$news['n_content']=$_REQUEST['n_content'];
			$news['n_hits']=1;
			$news['n_display']=1;
			$news['n_photo']=$_REQUEST['n_photo'];
			$news['n_source']=$_REQUEST['n_source'];
			$news['n_author']=$_REQUEST['n_author'];
			$news['n_file']=$_REQUEST['n_file'];
			$news['n_red']=0;
			$news['n_keyword']=$_REQUEST['n_keyword'];
			$news['n_describe']=$_REQUEST['n_describe'];
			$news['n_title2']=$_REQUEST['n_title2'];
			$news['n_recommend1']=0;
			$news['n_recommend2']=0;
			$news['n_recommend3']=0;
			$news['n_recommend4']=0;
			$news['n_recommend5']=0;
			$news['read_group_id']=0;
			$news['n_muban']='';
			$news['n_comment']=0;
			$news['comment_group_id']=0;
			$news['n_state']=1;
			$news['n_html']='';
			$news['n_htmlname']='';
			$news['n_out']=$_REQUEST['n_out'];
			$news['n_order']=empty($_REQUEST['n_order'])?0:$_REQUEST['n_order'];
			
			$news['n_content'] = str_replace("&quot;",'',$news['n_content']);
			$news['n_content'] = str_replace("\\&quot;",'',$news['n_content']);
			$news['n_content'] = str_replace("\\",'',$news['n_content']);
			
			if('create'==$cmd){
				$ret = createNews($news);
			}else{
				$ret = updateNews($news);
			}
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='news.php';";
			echo '</script>';
		}
		
		//1.文章类型列表
		$menu = getNewsMenuList();
		$smarty->assign("menu",$menu);
		
		//2.编辑时信息
		$id = $_REQUEST['id'];
		
		if(is_numeric($id)){
			$ret = getNewsInfo($id);
			
			foreach($ret as $map){
				
			}
			$smarty->assign('map',$map);
			$smarty->assign('cmd','edit');
		}else{
			$smarty->assign('cmd','create');
		}
			
		require('_session.php');
		
		$smarty->display('templates/news_create.tpl',md5($_SERVER["REQUEST_URI"]));
	}
	
	
	
?>
