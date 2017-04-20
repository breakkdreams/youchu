<?php 
session_start();
	require('../plugins.php');
	
	$smarty = new Smarty;

	$smarty->debugging = _debugging;
	$smarty->caching = _caching;
	$smarty->cache_lifetime = _cache_lifetime;
	
	$smarty->assign("dir",WEB_PATH);
	$smarty->assign("head_title",'产品内容 ');
	$smarty->assign("menu_class2",'style="color:#F60;"');
	$smarty->assign("menu_icon2",'class="v2_2"');
			
	$id = myREQUEST('id');
	
	if(is_numeric($id) && $id>0){
		if($id==1){			
			$ret[0]['n_content'] = '企业采购';
		}else if($id==2){			
			$ret[0]['n_content'] = '关于我们';
		}else if($id==3){			
			$ret[0]['n_content'] = '配送说明';
		}else if($id==4){			
			$ret[0]['n_content'] = '线下门店';
		}else if($id==5){			
			$ret[0]['n_content'] = '企业合作';	
		}		
		$smarty->assign("info", $ret[0]);
		$smarty->assign("n_content", html_entity_decode($ret[0]['n_content']));
		
		$smarty->display('../core/templates/content2.tpl',md5($_SERVER["REQUEST_URI"]));
	}
?>