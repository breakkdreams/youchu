<?php
/**
 * 社区
 */
require('../plugins.php');

$cmd = myPOST('cmd');
// 社区新闻列表
if('list'==$cmd){
	
	//返回值
	$flag = array();
	//参数
	$page = myPOST("page");
	//获取数据
	$return['list'] = getCommunityNews($page);
	if(!empty($return['list'])){
		$flag['flag']=1;
		$flag['msg']='成功';
		$flag['data']=$return;
		echo json_encode($flag);
		return ;
	}else{
		$flag['flag']=0;
		$flag['msg']='暂无城市信息';
		$flag['data']='';
		echo json_encode($flag);
	}
	
}