<?php 
	session_start();
	/**
	 * 商铺管理
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
		$smarty->assign("head_title",'商铺管理'.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign('left_class_open9','');
		$smarty->assign('left_class9',' in');
	
		//1.操作方式
		$cmd = $_REQUEST['operator']; //create 创建 edit 编辑
		
		if("create"==$cmd || "edit"==$cmd){

			$brand = array();
			
			$brand['s_id'] = $_REQUEST['s_id'];
			$brand['s_level'] = $_REQUEST['s_level'];
			$brand['s_name'] = $_REQUEST['s_name'];
			$brand['s_manager'] = $_REQUEST['s_manager'];
			$brand['s_idcard'] = $_REQUEST['s_idcard'];
			$brand['s_400'] = $_REQUEST['s_400'];
			$brand['s_address'] = $_REQUEST['s_address'];
			$brand['s_license'] = $_REQUEST['s_license'];
			$brand['s_code'] = $_REQUEST['s_code'];
			$brand['s_range'] = $_REQUEST['s_range'];
			$brand['s_logo'] = $_REQUEST['s_logo'];
			$brand['s_banner'] = $_REQUEST['s_banner'];
			$brand['s_www'] = $_REQUEST['s_www'];
			$brand['s_qq'] = $_REQUEST['s_qq'];
			$brand['s_ww'] = $_REQUEST['s_ww'];
			$brand['s_applydate'] = $_REQUEST['s_applydate'];
			$brand['s_applyer'] = $_REQUEST['s_applyer'];
			$brand['s_apperphone'] = $_REQUEST['s_apperphone'];	
			$brand['s_state'] = $_REQUEST['s_state'];
			$brand['s_date'] = $_REQUEST['s_date'];
			$brand['REGION_ID'] = $_REQUEST['area'];
			if("create"==$cmd){
				$ret = saveSeller($brand);
			}else{
				$ret = updateSeller($brand);
			}
			
			echo '<script>';
			if($ret>0){	
				echo "alert('操作成功');";	
			}else{
				echo "alert('操作失败');";
			}
			echo "window.location.href='seller_list.php';";
			echo '</script>';
		}
		else{
			
			$id = $_REQUEST['id'];
			
			if(is_numeric($id)){
				
				$ret = getSellerInfo($id);
				
				foreach($ret as $map){
					
				}
				
				$smarty->assign('map',$map);
			}
		if(!empty($map)){
			$area=getAreaName($map['REGION_ID']);
			$city=getCityName($area['PARENT_ID']);
			$province=getProvinceName($city['PARENT_ID']);
		}
		$smarty->assign('province',$province);
		$smarty->assign('city',$city);
		$smarty->assign('area',$area);
		//省 
		$list = getProvincesInfo();
		$smarty->assign('list',$list);
		$smarty->assign('list1',json_encode($list));
		
	    //市
		$list = getCitiesList();
		$smarty->assign('citylist',$list); 
		$smarty->assign('list2',json_encode($list)); 
		
	    //区
		$list = getAreasList();
		$smarty->assign('arealist',$list);
		$smarty->assign('list3',json_encode($list));
			require('_session.php');
			
			$smarty->display('templates/seller_create.tpl',md5($_SERVER["REQUEST_URI"]));	
		}		
		
	}
	
	
	
?>
