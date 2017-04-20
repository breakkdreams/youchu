<?php
/**
 * 地址接口
 */
require('../plugins.php');

$cmd = myPOST('cmd');



//地址列表
if('list'==$cmd){
	
	//返回值
	$flag = array();
	$return = array();
	$member_id = myPOST('member_id');
	if(!is_numeric($member_id)||$member_id<1){
		$flag['flag']=-1;
		$flag['msg']='参数有误';
		$flag['data']='';
		echo json_encode($flag);
		return ;
	}
	//获取数据
	$return['list'] = getMemberAddressListAll($member_id);
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
	}
	
	echo json_encode($flag);
}
//添加地址
else if('addAddress'==$cmd){
	
	//返回值
	$flag = array();
	$member['member_id']= myPOST("member_id");
	$member['a_name'] = myPOST("a_name");
	$member['a_phone'] = myPOST("a_phone");
	$member['a_tel']= myPOST("a_tel");
	$member['a_address'] = myPOST("a_address");
	$member['a_mark'] = myPOST("a_mark");
	$member['a_use'] = myPOST("a_use");
	
	//参数判断
	if(!is_numeric($member['member_id'])||$member['member_id']<1||empty($member['a_name'])||empty($member['a_phone'])||empty($member['a_address'])){
		$flag['flag']=-1;
		$flag['msg']='参数有误';
		$flag['data']='';
		echo json_encode($flag);
		return ;
	}
	
	//创建地址
	$return = createMemberAddress($member);
	
	if(!empty($return)){
		//如果设置为默认地址
		if(is_numeric($member['a_use'])&&$member['a_use']>0){
			updateUseMemberAddressByCreate($member['member_id']);
		}
		$flag['flag']=1;
		$flag['msg']='添加成功';
		$flag['data']='';
		echo json_encode($flag);
		return ;
	}else{
		$flag['flag']=0;
		$flag['msg']='添加失败';
		$flag['data']='';
	}
	
	echo json_encode($flag);
}
//更新地址
else if('updateAddress'==$cmd){
	
	//返回值
	$flag = array();
	$member['member_id']= myPOST("member_id");
	$member['a_name'] = myPOST("a_name");
	$member['a_phone'] = myPOST("a_phone");
	$member['a_tel']= myPOST("a_tel");
	$member['a_address'] = myPOST("a_address");
	$member['a_mark'] = myPOST("a_mark");
	$member['a_id'] = myPOST("a_id");
	$member['a_use'] = myPOST("a_use");
	//参数判断
	if(!is_numeric($member['member_id'])||$member['member_id']<1||!is_numeric($member['a_id'])||$member['a_id']<1||empty($member['a_name'])||empty($member['a_phone'])||empty($member['a_address'])){
		$flag['flag']=-1;
		$flag['msg']='参数有误';
		$flag['data']='';
		echo json_encode($flag);
		return ;
	}
	
	//设置默认地址
	if(is_numeric($member['a_use'])&&$member['a_use']>0){
		$return = updateUseMemberAddress($member['member_id'],$member['a_id']);
	}else{
		$return = updateUseMemberAddressOff($member['a_id']);
	}
	
	//设置地址
	$return = $return+ updateMemberAddress($member);
	if($return>0){
		$flag['flag']=1;
		$flag['msg']='更新成功';
		$flag['data']='';
		echo json_encode($flag);
		return ;
	}else{
		$flag['flag']=0;
		$flag['msg']='更新失败';
		$flag['data']='';
	}
	
	echo json_encode($flag);
}
//删除地址
else if('deleteAddress'==$cmd){
	
	//返回值
	$flag = array();
	$a_id = myPOST("a_id");
	//参数判断
	if(!is_numeric($a_id)||$a_id<1){
		$flag['flag']=-1;
		$flag['msg']='参数有误';
		$flag['data']='';
		echo json_encode($flag);
		return ;
	}
	
	//获取数据
	$return = deleteMemberAddress($a_id);
	
	if($return>0){
		$flag['flag']=1;
		$flag['msg']='删除成功';
		$flag['data']='';
		echo json_encode($flag);
		return ;
	}else{
		$flag['flag']=0;
		$flag['msg']='删除失败';
		$flag['data']='';
	}
	
	echo json_encode($flag);
}
//设置默认地址
else if('setDefaultAddress'==$cmd){
	
	//返回值
	$flag = array();
	$a_id = myPOST("a_id");
	$member_id = myPOST("member_id");
	//参数判断
	if(!is_numeric($a_id)||$a_id<1||!is_numeric($member_id)||$member_id<1){
		$flag['flag']=-1;
		$flag['msg']='参数有误';
		$flag['data']='';
		echo json_encode($flag);
		return ;
	}
	
	//获取数据
	$return = updateUseMemberAddress($member_id,$a_id);
	
	if($return>0){
		$flag['flag']=1;
		$flag['msg']='设置成功';
		$flag['data']='';
		echo json_encode($flag);
		return ;
	}else{
		$flag['flag']=0;
		$flag['msg']='设置失败';
		$flag['data']='';
	}
	
	echo json_encode($flag);
}