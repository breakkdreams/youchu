<?php
	/**
	 * 首页
	 */
	require('../plugins.php');
	
	$smarty = new Smarty;

	$smarty->debugging = _debugging;
	$smarty->caching = _caching;
	$smarty->cache_lifetime = _cache_lifetime;
	
	$smarty->assign("dir",WEB_PATH);
	$smarty->assign("head_title",'企业订购');

	function getRealIpAddr(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){//check ip from share internet
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){//to check ip is pass from proxy
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	
    if("create"==$_REQUEST['act']){
    	$item = array();
    	$item['ding_linkman'] = $_REQUEST["linkman"];
    	$item['ding_name'] = $_REQUEST["company"];
    	$item['ding_phone'] = $_REQUEST["phone"];
    	$item['ding_content'] = $_REQUEST["demand"];
    	$item['ding_code'] = strtotime("+1 day");
    	$item['ding_ip'] = getRealIpAddr();
    	
    	$_count1 = "select count(*) from shop_office_order where ding_code='".$item['ding_code']."'";
    	
    	$_c1 = SQLHelper::getInstance()->queryObject($_count1);
    	
    	$_count2 = "select count(*) from shop_office_order where ding_ip='".$item['ding_ip']."'";
    	 
    	$_c2 = SQLHelper::getInstance()->queryObject($_count2);
    	
    	if($_c1*1==0 && $_c2*1<5){
    	
    		$sql = "INSERT INTO shop_office_order(ding_code,ding_name,ding_linkman,ding_phone,ding_content,ding_date,ding_ip) 
    							values('".$item['ding_code']."','".$item['ding_name']."','".$item['ding_linkman']."','".$item['ding_phone']."','".$item['ding_content']."',now(),'".$item['ding_ip']."')";
    	
    		$ret = SQLHelper::getInstance()->execute($sql);
    		
    		$smarty->assign("ret",$ret);
    	}
    }
	
	$smarty->display('templates/enterprise.tpl',md5($_SERVER["REQUEST_URI"]));
?>
