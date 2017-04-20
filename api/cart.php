<?php
/**
 * 购物车接口
 */
require('../plugins.php');

$cmd = myPOST('cmd');



/**
 * member_login			账号
 * member_password		密码
 */
//购物车列表接口
if('list'==$cmd){
	
	//返回值
	$flag = array();
	$return = array();
	
	//参数
	$member_id = myPOST('member_id');
	//检查测试是否正常
	if(!is_numeric($member_id)||$member_id<1){
		//返回
		$flag['flag']=-1;
		$flag['msg']='参数有误';
		$flag['data']='';
		echo json_encode($flag);	
	}else{
		//获取会员等级优惠
		$info = getMemberGroupId($member_id);
		if(empty($info['group_authority'])||!is_numeric($info['group_authority'])||$info['group_authority']<1){
			$groupId = 0;
		}else {
			$groupId = $info['group_authority'];
		}
		//购物车列表
		$return['list'] = getCartList2($member_id,$groupId);
		if(!empty($return['list'])){
			//返回
			$flag['flag']=1;
			$flag['msg']='查询成功';
			$flag['data']=$return;
			echo json_encode($flag);	
		}else{
			//返回
			$flag['flag']=0;
			$flag['msg']='暂无购物车信息';
			$flag['data']='';
			echo json_encode($flag);
		}
	}
}
//加入购物车接口
else if('addCart'==$cmd){
	
	//返回值
	$flag = array();

	//参数
	$cart = array();
	$cart['member_id'] = myPOST('member_id');
	$cart['product_id'] = myPOST('product_id');
	$cart['type_id'] = myPOST('type_id');
	$cart['cart_acount'] = myPOST('cart_acount');
	$cart['is_taocan'] = myPOST('is_taocan');
	//购物车列表
	if(!is_numeric($cart['member_id'])||$cart['member_id']<1||
	!is_numeric($cart['cart_acount'])||$cart['cart_acount']<1||
	!is_numeric($cart['product_id'])||$cart['product_id']<1){
		//返回
		$flag['flag']=-1;
		$flag['msg']='参数有误';
		$flag['data']='';
		echo json_encode($flag);	
	}else{
		$id = addCart($cart);
		if($id>0){
			//返回
			$flag['flag']=1;
			$flag['msg']='添加到购物车成功';
			$flag['data']='';
			echo json_encode($flag);		
		}else{
			//返回
			$flag['flag']=0;
			$flag['msg']='添加到购物车失败';
			$flag['data']='';
			echo json_encode($flag);
		}
	}
}
//删除购物车接口
else if('deleteCart'==$cmd){
	
	//返回值
	$flag = array();

	$cartids = myPOST('cartids');
	//购物车列表
	if(empty($cartids)){
		//返回
		$flag['flag']=-1;
		$flag['msg']='参数有误';
		$flag['data']='';
		echo json_encode($flag);	
	}else{
		$id = deleteCartItems($cartids);
		if($id>0){
			//返回
			$flag['flag']=1;
			$flag['msg']='删除购物车成功';
			$flag['data']='';
			echo json_encode($flag);		
		}else{
			//返回
			$flag['flag']=0;
			$flag['msg']='删除购物车失败';
			$flag['data']='';
			echo json_encode($flag);
		}
	}
}

?>