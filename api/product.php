<?php
/**
 * 商品接口
 */
require('../plugins.php');

$cmd = myPOST('cmd');

//首页
if('home'==$cmd){
	//参数
	$member_id = myPOST('member_id');
	//返回值
	$return = array();
	$flag = array();
		
	//置顶广告
	$return['ad'] = getADByName('首页置顶广告');
	//横幅
	$return['ad2'] = getADByName('首页横幅广告');
	//通知数量
	$return['noticeNum'] = '0';
	//热搜
	$return['hotName'] = getHotWord();
	//购物车内的数量
	$return['cartNum'] = countCartByProduct($member_id);
	
	//检查map
	$return = checkMap($return);
	//返回
	$flag['flag']=1;
	$flag['msg']='查询成功';
	$flag['data']=$return;
	echo json_encode($flag);	
}
//商品分页（分类查询）
else if('productPage'==$cmd){
	//返回值
	$return = array();
	$flag = array();
	
	//参数
	$product_type1 = myPOST('product_type');
	$member_id = myPOST('member_id');
	$type = myPOST('type');
	$page = myPOST('page');
	$groupId = 0;
	//参数验证
	if(!is_numeric($product_type1)||$product_type1<1){
		//返回
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']=$return;
		echo json_encode($flag);	
		return;
	}
	//获取会员等级优惠
	$info = getMemberGroupId($member_id);
	if(empty($info['group_authority'])||!is_numeric($info['group_authority'])||$info['group_authority']<1){
		$groupId = 0;
	}else {
		$groupId = $info['group_authority'];
	}
	//获取商品信息
	$return['list'] = getProductPage2($product_type1,$type,$groupId,$page);

	if(!empty($return['list'])){
		//返回
		$flag['flag']=1;
		$flag['msg']='获取成功';
		$flag['data']=$return;
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='暂无商品信息';
		$flag['data']='';
		echo json_encode($flag);
	}
}
//商品分页(名字查询)
else if('productPageByName'==$cmd){
	//返回值
	$return = array();
	$flag = array();
	
	//参数
	$product_name = myPOST('product_name');
	$member_id = myPOST('member_id');
	$page = myPOST('page');
	//获取会员等级优惠
	$info = getMemberGroupId($member_id);
	if(empty($info['group_authority'])||!is_numeric($info['group_authority'])||$info['group_authority']<1){
		$groupId = 0;
	}else {
		$groupId = $info['group_authority'];
	}
	//获取商品信息
	$return['list'] = getProductPage3($product_name,$groupId,$page);
	if(!empty($return['list'])){
		//返回
		$flag['flag']=1;
		$flag['msg']='获取成功';
		$flag['data']=$return;
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='暂无商品信息';
		$flag['data']='';
		echo json_encode($flag);
	}
}
//新品分页
else if('productPageByNew'==$cmd){
	//返回值
	$return = array();
	$flag = array();
	
	//参数
	$type = 4;
	$member_id = myPOST('member_id');
	$page = myPOST('page');
	$order = myPOST('order');
	//获取会员等级优惠
	$info = getMemberGroupId($member_id);
	if(empty($info['group_authority'])||!is_numeric($info['group_authority'])||$info['group_authority']<1){
		$groupId = 0;
	}else {
		$groupId = $info['group_authority'];
	}
	//获取商品信息
	$return['list'] = getProductPageByType($type,$order,$groupId,$page);
	if(!empty($return['list'])){
		//返回
		$flag['flag']=1;
		$flag['msg']='获取成功';
		$flag['data']=$return;
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='暂无商品信息';
		$flag['data']='';
		echo json_encode($flag);
	}
}
//热门商品分页
else if('productPageByHot'==$cmd){
	//返回值
	$return = array();
	$flag = array();
	
	//参数
	$type = 3;
	$member_id = myPOST('member_id');
	$page = myPOST('page');
	$order = myPOST('order');
	//获取会员等级优惠
	$info = getMemberGroupId($member_id);
	if(empty($info['group_authority'])||!is_numeric($info['group_authority'])||$info['group_authority']<1){
		$groupId = 0;
	}else {
		$groupId = $info['group_authority'];
	}
	//获取商品信息
	$return['list'] = getProductPageByType($type,$order,$groupId,$page);
	if(!empty($return['list'])){
		//返回
		$flag['flag']=1;
		$flag['msg']='获取成功';
		$flag['data']=$return;
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='暂无商品信息';
		$flag['data']='';
		echo json_encode($flag);
	}
}
//所有热门商品
else if('hotProductPage'==$cmd){
	//返回值
	$return = array();
	$flag = array();
	
	//参数
	$member_id = myPOST('member_id');
	$page = myPOST('page');
	//获取会员等级优惠
	$info = getMemberGroupId($member_id);
	if(empty($info['group_authority'])||!is_numeric($info['group_authority'])||$info['group_authority']<1){
		$groupId = 0;
	}else {
		$groupId = $info['group_authority'];
	}
	//获取商品信息
	$return['list'] = getHotProductPage($groupId,$page);
	if(!empty($return['list'])){
		//返回
		$flag['flag']=1;
		$flag['msg']='获取成功';
		$flag['data']=$return;
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='暂无商品信息';
		$flag['data']='';
		echo json_encode($flag);
	}
}
//猜你喜欢分页
else if('productPageByLike'==$cmd){
	//返回值
	$return = array();
	$flag = array();
	
	//参数
	$type = 2;
	$member_id = myPOST('member_id');
	$page = myPOST('page');
	$order = myPOST('order');
	//获取会员等级优惠
	$info = getMemberGroupId($member_id);
	if(empty($info['group_authority'])||!is_numeric($info['group_authority'])||$info['group_authority']<1){
		$groupId = 0;
	}else {
		$groupId = $info['group_authority'];
	}
	//获取商品信息
	$return['list'] = getProductPageByType($type,$order,$groupId,$page);
	if(!empty($return['list'])){
		//返回
		$flag['flag']=1;
		$flag['msg']='获取成功';
		$flag['data']=$return;
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='暂无商品信息';
		$flag['data']='';
		echo json_encode($flag);
	}
}
//商品详情
else if('productInfo'==$cmd){
	//返回值
	$return = array();
	$flag = array();
	
	//参数
	$product_id = myPOST('product_id');
	$member_id = myPOST('member_id');
	//检查参数
	if(!is_numeric($product_id)||$product_id<1){
		//返回
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']=$return;
		echo json_encode($flag);
		return;
	}
	//获取会员等级优惠
	$info = getMemberGroupId($member_id);
	if(empty($info['group_authority'])||!is_numeric($info['group_authority'])||$info['group_authority']<1){
		$groupId = 0;
	}else {
		$groupId = $info['group_authority'];
	}
	//获取商品信息
	$return['info'] = getProductInfo2($product_id,$groupId);
	
	//热门推荐
	$return['hot'] =getRecommendProductOne();
	
	//是否收藏
	$collection = getCollectionState($product_id,$member_id);
	if(empty($collection)){
		$return['collection'] =0;
	}else{
		$return['collection'] =1;
	}
	//购物车内的数量
	$cartNum = countCartByProduct($member_id);
	if(empty($cartNum)){
		$return['cartNum'] =0;
	}else{
		$return['cartNum'] =$cartNum;
	}
	
	if(!empty($return)){
		//返回
		$flag['flag']=1;
		$flag['msg']='获取成功';
		$flag['data']=$return;
		echo json_encode($flag);	
		return;	
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='暂无商品详情';
		$flag['data']='';
		echo json_encode($flag);
	}
}
//分类列表
else if('productClass'==$cmd){
	//返回值
	$return = array();
	$flag = array();
	
	//一级目录
	$menu1 = getProductRootMenu();
	
	//二级目录
	$menu2 = getProductSecondMenu();
	
	//设置返回值
	$return['menu1']=$menu1;
	$return['menu2']=$menu2;
	//检查map
	$return = checkMap($return);
	
	if(!empty($return)){
		//返回
		$flag['flag']=1;
		$flag['msg']='获取成功';
		$flag['data']=$return;
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='暂无分类列表';
		$flag['data']='';
		echo json_encode($flag);
	}
}
//收藏商品
else if('productFocus'==$cmd){
	//返回值
	$return = array();
	$flag = array();
	
	//参数
	$item['member_id'] = myPOST('member_id');
	$item['product_id'] = myPOST('product_id');
	//检查参数
	if(!is_numeric($item['member_id'])||$item['member_id']<1||!is_numeric($item['product_id'])||$item['product_id']<1){
		//返回
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']=$return;
		echo json_encode($flag);
		return;
	}
	//是否收藏
	$collection = getCollectionState($product_id,$member_id);
	if(!empty($collection)){
		//返回
		$flag['flag']=-2;
		$flag['msg']='已收藏';
		$flag['data']='';
		echo json_encode($flag);	
		return;
	}
	//关注商品
	$return = createMemberFocus($item);
	
	if(!empty($return)){
		//返回
		$flag['flag']=1;
		$flag['msg']='收藏成功';
		$flag['data']=$return;
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='收藏失败';
		$flag['data']='';
		echo json_encode($flag);
	}
}
//取消收藏商品
else if('productFocusDelete'==$cmd){
	//返回值
	$return = array();
	$flag = array();
	
	//参数
	$item['member_id'] = myPOST('member_id');
	$item['product_id'] = myPOST('product_id');
	//检查参数
	if(!is_numeric($item['member_id'])||$item['member_id']<1||!is_numeric($item['product_id'])||$item['product_id']<1){
		//返回
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}
	//取消关注商品
	$return = cancelMemberFocus($item);
	
	if(!empty($return)){
		//返回
		$flag['flag']=1;
		$flag['msg']='收藏取消成功';
		$flag['data']='';
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='收藏取消失败';
		$flag['data']='';
		echo json_encode($flag);
	}
}
//获取关注商品列表
else if('productFocusList'==$cmd){
	//返回值
	$return = array();
	$flag = array();
	
	//参数
	$member_id = myPOST('member_id');
	$page = myPOST('page');
	//检查参数
	if(!is_numeric($member_id)||$member_id<1){
		//返回
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}
	//获取会员等级优惠
	$info = getMemberGroupId($member_id);
	if(empty($info['group_authority'])||!is_numeric($info['group_authority'])||$info['group_authority']<1){
		$groupId = 0;
	}else {
		$groupId = $info['group_authority'];
	}
	//关注商品列表
	$return['list'] = getMemberFocusList($member_id,$groupId,$page);
	
	if(!empty($return['list'])){
		//返回
		$flag['flag']=1;
		$flag['msg']='获取成功';
		$flag['data']=$return;
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='暂无收藏信息';
		$flag['data']='';
		echo json_encode($flag);
	}
}
