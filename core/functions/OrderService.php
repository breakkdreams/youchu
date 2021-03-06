<?php
/**
 * 系统订单
 * Version: 1.0
 * Author: sunwei
 * Date: 2013-12-11
 */


/**
 * 创建订单
 * @param unknown_type $order 订单详细信息
 * @param unknown_type $list 购买产品明细保存SQL
 */
function createOrder($order,$params_array,$cartids='0'){
			
	$ret = 0;
	
	$sql0 = "insert into shop_order(order_code,order_state,member_id,product_id,send_type,get_name,get_address,get_tel,get_phone,get_qq,get_zip,get_building,get_time,order_price,product_price,send_price,order_message,order_fp,order_time) 
			values('".$order['order_code']."',
				   '".$order['order_state']."',
				   '".$order['member_id']."',
				   '".$order['product_id']."',
				   '".$order['send_type']."',
				   '".$order['get_name']."',
				   '".$order['get_address']."',
				   '".$order['get_tel']."',
				   '".$order['get_phone']."',
				   '".$order['get_qq']."',
				   '".$order['get_zip']."',
				   '".$order['get_building']."',
				   '".$order['get_time']."',
				   '".$order['order_price']."',
				   '".$order['product_price']."',
				   '".$order['send_price']."',
				   '".$order['order_message']."',
				   '".$order['order_fp']."',now())";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$mysqli->autocommit(false);
	$mysqli->query($sql0);
    
    //2.商品明细保存
    $products = $params_array['products'];
    $nums = $params_array['nums'];
    $price = $params_array['price'];
    
    for($i=0;$i<count($products);$i++){
    	
    	$p2 = $nums[$i]*1*$price[$i];
    	
    	$sql = "insert into shop_order_info(order_code,product_id,product_acount,product_price1,product_price2,type_id,is_taocan,member_id) 
    			values('".$order['order_code']."',
					   '".$products[$i]."',
					   '".$nums[$i]."',
					   '".$price[$i]."',
					   '".$p2."',0,0,'".$order['member_id']."')";
		$mysqli->query($sql);
    }
    
	if(!$mysqli->errno){ 
	    $mysqli->commit();   
	    $ret = 1;
	    //删除购物车信息
	    $sql = "delete from shop_cart where cart_id in (".$cartids.")";
		SQLHelper::getInstance()->execute($sql);
	}
	else{	
		$mysqli->query("delete from shop_order where order_code='".$order['order_code']."'");		
		$mysqli->query("delete from shop_order_info where order_code='".$order['order_code']."'");
		
	    $mysqli->rollback();
	    $ret = -1;
	}
	return $ret;
}
/**
 * 创建订单(对象)
 * @param unknown_type $order 订单详细信息
 * @param unknown_type $list 购买产品明细保存SQL
 */
function createOrder2($order,$products,$cartids='0'){
			
	$ret = 0;
	
	$sql0 = "insert into shop_order(order_code,order_state,member_id,product_id,send_type,get_name,get_address,get_tel,get_phone,get_qq,get_zip,get_building,get_time,order_price,product_price,send_price,order_message,order_fp,order_time) 
			values('".$order['order_code']."',
				   '".$order['order_state']."',
				   '".$order['member_id']."',
				   '".$order['product_id']."',
				   '".$order['send_type']."',
				   '".$order['get_name']."',
				   '".$order['get_address']."',
				   '".$order['get_tel']."',
				   '".$order['get_phone']."',
				   '".$order['get_qq']."',
				   '".$order['get_zip']."',
				   '".$order['get_building']."',
				   '".$order['get_time']."',
				   '".$order['order_price']."',
				   '".$order['product_price']."',
				   '".$order['send_price']."',
				   '".$order['order_message']."',
				   '".$order['order_fp']."',now())";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$mysqli->autocommit(false);
	$mysqli->query($sql0);
	
	for($i=0;$i<count($products);$i++){
    	$product = $products[$i];
    	$p2 = $product->product_price*1*$product->product_acount;
    	
    	$sql = "insert into shop_order_info(order_code,product_id,product_acount,product_price1,product_price2,type_id,is_taocan,member_id)
    			values('".$order['order_code']."',
					   '".$product->product_id."',
					   '".$product->product_acount."',
					   '".$product->product_price."',
					   '".$p2."',0,0,'".$order['member_id']."')";
		$mysqli->query($sql);
    }
   /* //2.商品明细保存
    $products = $params_array['products'];
    $nums = $params_array['nums'];
    $price = $params_array['price'];
    
    for($i=0;$i<count($products);$i++){
    	
    	$p2 = $nums[$i]*1*$price[$i];
    	
    	$sql = "insert into shop_order_info(order_code,product_id,product_acount,product_price1,product_price2,type_id,is_taocan,member_id) 
    			values('".$order['order_code']."',
					   '".$products[$i]."',
					   '".$nums[$i]."',
					   '".$price[$i]."',
					   '".$p2."',0,0,'".$order['member_id']."')";
		$mysqli->query($sql);
    }*/
    
	if(!$mysqli->errno){ 
	    $mysqli->commit();   
	    $ret = 1;
	    //删除购物车信息
	    $sql = "delete from shop_cart where cart_id in (".$cartids.")";
		SQLHelper::getInstance()->execute($sql);
	}
	else{	
		$mysqli->query("delete from shop_order where order_code='".$order['order_code']."'");		
		$mysqli->query("delete from shop_order_info where order_code='".$order['order_code']."'");
		
	    $mysqli->rollback();
	    $ret = -1;
	}
	return $ret;
}
function set($products){
		$mysqli = SQLHelper::getInstance()->getConnection();
    for($i=0;$i<count($products);$i++){
    	
    	$sql = "insert into shop_order(order_code) 
    			values('".$products[$i]."')";
		$mysqli->query($sql);
    }
}
/**
 * 获取管理员订单分页
 * @param $limit
 * @param $rowid
 * @param $member_id 会员ID
 */
function getManageOrederPage($limit,$rowid,$params=''){
	$where=' where 1=1 ';

	//会员手机号
	if(!empty($params['get_phone']) && is_numeric($params['get_phone'])){
		$where=$where." AND o.get_phone like '%".$params['get_phone']."%'";
	}
	
	//订单编号
	if(!empty($params['order_code']) && is_numeric($params['order_code'])){
		$where=$where." AND o.order_code like '%".$params['order_code']."%'";
	}
	

	//订单未支付状态
	if($params['pay_state']=='0'){
		$where=$where." AND (o.pay_time is null or o.pay_time='')";
	}	
	
	//订单已支付状态
	if($params['pay_state']=='1'){
		$where=$where." AND (o.pay_time is not null or o.pay_time!='')";
	}
	
	//订单状态  0 未发货 1 已发货 2 已完成 3 退货
	if(is_numeric($params['order_state'])){
		$where=$where." AND o.order_state=".$params['order_state']." and (o.pay_time is not null or o.pay_time!='')";
	}
		
	$sql = "select o.*,m.member_realname,m.member_login from shop_order o
			left join shop_member m on o.member_id=m.member_id ".$where." order by order_id desc limit ".$rowid.",".$limit." ";

//	echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}

function checkOrderCode($code){
	
	$sql = "select count(*) from shop_order where order_code='".$code."'";
	
	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 发货
 * @param $item
 */
function sendOrder($item){

	$sql = "update shop_order set send_company=?,send_type=?,send_code=?,send_time=now(),order_state=1 where order_id=?"; 

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('sssi', $item['send_company'], $item['send_type'], $item['send_code'], $item['order_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 确认收货
 * @param $order
 */
function confirmOrder($order){
	
	if(is_numeric($order['member_id']) && is_numeric($order['order_id'])){
		
		$sql = "update shop_order set order_state=2,confirm_date=now() where member_id=? and order_id=?";
	
		$mysqli = SQLHelper::getInstance()->getConnection();
			
		$stmt = $mysqli->prepare($sql);
	
		$stmt->bind_param('ii', $order['member_id'], $order['order_id']);
	
	    $stmt->execute();
	    
	    return $stmt->affected_rows;
	}	
}

/**
 * 订单是否已经确认
 * @param $order
 */
function confirmCheck($order){
	
	if(is_numeric($order['member_id']) && is_numeric($order['order_id'])){
		
		$sql = "select count(*) from shop_order where (confirm_date is not null or confirm_date!='') and member_id='".$order['member_id']."' and order_id=".$order['order_id'];
	
		return SQLHelper::getInstance()->queryObject($sql);
	}	
}

/**
 * 订单是否已经评价
 * @param $order
 */
function commentCheck($order){
	if(is_numeric($order['member_id']) && is_numeric($order['order_id'])){
		
		$sql = "select count(*) from shop_order where comment_state=0 and member_id='".$order['member_id']."' and order_id=".$order['order_id'];
	
		return SQLHelper::getInstance()->queryObject($sql);
	}	
}

/**
 * 订单评价操作
 * @param $order
 */
function commentOrder($order){
	
	if(is_numeric($order['member_id']) && is_numeric($order['info_id'])){
		
		
		$sql = "update shop_order_info set comment_date=now(),comment_point=?,comment_content=?,is_anonymous=?,share_pic1=?,share_pic2=?,share_pic3=?,share_pic4=?,share_pic5=? where member_id=? and info_id=? and (comment_date is null or comment_date='')";

		$mysqli = SQLHelper::getInstance()->getConnection();
			
		$stmt = $mysqli->prepare($sql);
	
		$stmt->bind_param('isisssssii', $order['comment_point'],$order['comment_content'],$order['is_anonymous'],
										$order['share_pic1'],$order['share_pic2'],$order['share_pic3'],$order['share_pic4'],$order['share_pic5'],
										$order['member_id'], $order['info_id']);
	
	    $stmt->execute();
	    
	    return $stmt->affected_rows;
	}
}

function commentOrderState($order_id){
	
	if(is_numeric($order_id)){
		
		$sql = "update shop_order set comment_state=1 where order_id=".$order_id;
		
		return SQLHelper::getInstance()->execute($sql);
	}
}

/**
 * 获取管理员订单总数
 * @param $member_id 会员ID
 */
function getManageOrderCount($params=''){
	$where=' where 1=1 ';

	//会员手机号
	if(!empty($params['get_phone']) && is_numeric($params['get_phone'])){
		$where=$where." AND o.get_phone like '%".$params['get_phone']."%'";
	}
	
	//订单编号
	if(!empty($params['order_code']) && is_numeric($params['order_code'])){
		$where=$where." AND o.order_code like '%".$params['order_code']."%'";
	}

	//订单未支付状态
	if($params['pay_state']=='0'){
		$where=$where." AND (o.pay_time is null or o.pay_time='')";
	}	
	
	//订单已支付状态
	if($params['pay_state']=='1'){
		$where=$where." AND (o.pay_time is not null or o.pay_time!='')";
	}
	
	//订单状态  0 未发货 1 已发货 2 已完成 3 退货
	if(is_numeric($params['order_state'])){
		$where=$where." AND o.order_state=".$params['order_state'];
	}	
		
	$sql = "select  count(1) from shop_order o
			left join shop_member m on o.member_id=m.member_id ".$where;
	
	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 获取会员订单分页
 * @param $limit
 * @param $rowid
 * @param $member_id 会员ID
 */
function getOrderPage($limit,$rowid,$member_id=''){
	$where=' where 1=1 ';

	if(!empty($member_id) && is_numeric($member_id)){
		$where=$where." AND o.member_id=".$member_id;
		
		$sql = "select o.*,m.member_realname,m.member_login from shop_order o
				left join shop_member m on o.member_id=m.member_id ".$where." order by order_id desc limit ".$rowid.",".$limit." ";

	//	echo $sql;
		
		return SQLHelper::getInstance()->query($sql);
	}	
}

/**
 * 获取会员订单总数
 * @param $member_id 会员ID
 */
function getOrderCount($member_id=''){
	$where=' where 1=1 ';

	if(!empty($member_id) && is_numeric($member_id)){
		$where=$where." AND o.member_id=".$member_id;
		
		$sql = "select count(1) from shop_order o
			left join shop_member m on o.member_id=m.member_id ".$where;
	
		//echo $sql;
		
		return SQLHelper::getInstance()->queryObject($sql);
	}		
}

/**
 * 获取会员订单评价分页
 * @param $limit
 * @param $rowid
 * @param $member_id 会员ID
 */
function getOrderCommentPage($limit,$rowid,$member_id=''){
	$where=" where (i.comment_date is not null or i.comment_date!='') ";

	if(!empty($member_id) && is_numeric($member_id)){
		$where=$where." AND i.member_id=".$member_id;
		
		$sql = "select i.*,p.product_name from shop_order_info i 
				left join shop_product p on i.product_id=p.product_id ".$where." order by info_id desc limit ".$rowid.",".$limit." ";

//		echo $sql;
		
		return SQLHelper::getInstance()->query($sql);
	}	
	
	return null;
}

/**
 * 获取会员订单评价总数
 * @param $member_id 会员ID
 */
function getOrderCommentCount($member_id=''){
	$where=" where (i.comment_date is not null or i.comment_date!='') ";

	if(!empty($member_id) && is_numeric($member_id)){
		$where=$where." AND i.member_id=".$member_id;
		
		$sql = "select count(1) from shop_order_info i left join shop_product p on i.product_id=p.product_id ".$where;
	
//		echo $sql;
		
		return SQLHelper::getInstance()->queryObject($sql);
	}	

	return 0;
}

/**
 * 获取会员订单评价分页
 * @param $limit
 * @param $rowid
 * @param $member_id 会员ID
 */
function getOrderCommentManagerPage($limit,$rowid,$params=''){
	$where=" where (i.comment_date is not null or i.comment_date!='') ";

	$sql = "select i.*,p.product_name from shop_order_info i 
				left join shop_product p on i.product_id=p.product_id ".$where." order by info_id desc limit ".$rowid.",".$limit." ";

	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取会员订单评价总数
 * @param $member_id 会员ID
 */
function getOrderCommentManagerCount($params=''){
	$where=" where (i.comment_date is not null or i.comment_date!='') ";

	$sql = "select count(1) from shop_order_info i left join shop_product p on i.product_id=p.product_id ".$where;
	
	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 获取订单列表
 * @param $limit
 * @param $member_id
 */
function getOrderLimit($limit='3',$member_id){
	
	if(!empty($member_id) && is_numeric($member_id)){
		
		$sql = "select * from shop_order where member_id='".$member_id."' order by order_id desc limit ".$limit;
		
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 获取订单明细信息
 * @param $order_code
 */
function getOrderInfoList($order_code=''){
	
	$sql = "select i.*,p.product_name,p.product_pic,p.product_pack from shop_order_info i left join shop_product p on i.product_id=p.product_id where order_code in (".$order_code.")";
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取订单详细信息
 * @param $member_id 
 * @param $order_code
 */
function getOrderInfo($member_id,$order_id){
	
	if(is_numeric($member_id) && is_numeric($order_id)){
		
		$sql = "select o.*,m.member_name,m.member_realname from shop_order o left join shop_member m on o.member_id=m.member_id where o.member_id='".$member_id."' and o.order_id='".$order_id."'";
		
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

function getOrderInfoByManager($order_id){
	
	if(is_numeric($order_id)){
		
		$sql = "select o.*,m.member_name,m.member_realname from shop_order o left join shop_member m on o.member_id=m.member_id where o.order_id='".$order_id."'";
		
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 更新订单状态
 * @param $id
 */
function updateOrderState($id,$state){
	$sql = "update shop_order set order_state='".$state."' where order_id='".$id."'";
								    	
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 用户支付
 * @param $code
 */
function payOrderState($code){
	$sql = "update shop_order set pay_time=now() where order_code='".$code."'";
								    	
	return SQLHelper::getInstance()->execute($sql);
}
/**
 * 订单是否支付
 * @param $code
 */
function checkOrderState($code){
	
	$sql = "select count(*) from shop_order where  (pay_time is null or pay_time='') and order_code='".$code."'";
	return SQLHelper::getInstance()->queryObject($sql);
}
/**
 * 删除订单
 * @param $member_id,$order_id
 */
function deleteOrder($member_id,$order_id){
	if(!empty($member_id) && !empty($order_id)){
		$sql="select order_state,member_id from shop_order where order_id='".$order_id."' limit 0,1";
		$array=SQLHelper::getInstance()->query($sql);
        if(1!=$array[0][order_state]){
            if($member_id==$array[0][member_id]){
            	$sql_getcode="select order_code from shop_order where order_id='".$order_id."'";
            	$order_codeary=SQLHelper::getInstance()->query($sql_getcode);
            	$order_code=$order_codeary[0]['order_code'];
            	$sql_array=array('0'=>"delete from shop_order where order_id='".$order_id."'",
            	                  '1'=>"delete from shop_order_info where order_code='".$order_code."'");
            	if(SQLHelper::getInstance()->executeTrance($sql_array)>0){
            		return 1;
            	}
            	else{
            		return 0;
            	}
            }
	    }
	    else{
	    	return 2;
	    }
	}
	else{
		return 0;
	}
	
}
/**
 * 获取orderID
 * @param $order_code
 */
function getOrderID($order_code){
	$sql="select order_id from shop_order where order_code='".$order_code."'";
	$array=SQLHelper::getInstance()->query($sql);
	return $array[0][0];
	
}
/**
 * 获取order_price
 * @param $order_code
 */
function getOrderPrice($order_code){
	$sql="select order_price from shop_order where order_code='".$order_code."'";
	$array=SQLHelper::getInstance()->query($sql);
	return $array[0][0];
	
}
/**
 * 获取orderCode
 * @param $order_code
 */
function getOrderCode($order_id){
	$sql="select order_code from shop_order where order_id='".$order_id."'";
	$array=SQLHelper::getInstance()->queryForMap($sql);
	return $array;
	
}

function getOrderBasic($order_code){
	$sql="select * from shop_order where order_code='".$order_code."'";
	
	return SQLHelper::getInstance()->query($sql);
}
/**
 * 更新
 */
/**
 * 更新订单状态
 * @param $id
 */
function updateOrderState2($id,$state){
	$sql = "update shop_order set order_state= $state where order_state=0 and order_id='".$id."'";
	return SQLHelper::getInstance()->execute($sql);
}
/**
 * 获取订单信息
 * @param $member_id 
 * @param $order_code
 * @author 沈家盛
 */
function getOrderInfo2($order_code){
	
	if(!empty($order_code)){
		
		$sql = "select * from shop_order where order_code=".$order_code;
		return SQLHelper::getInstance()->queryForMap($sql);
	}
	
	return null;
}
/**
 * 获取订单明细信息
 * @param $order_code
 * @author 沈家盛
 */
function getOrderInfoList2($order_code=''){
	
	$sql = "select i.info_id,i.product_acount,p.product_name,p.product_pic,p.product_pack,i.product_price1 product_price,p.product_title from shop_order_info i left join shop_product p on i.product_id=p.product_id where order_code = ".$order_code;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取管理员订单分页
 * @param $member_id 会员ID
 * @author 沈家盛
 */
function getManageOrederPage2($page,$params=''){
	$where=' where 1=1 ';

	//会员id
	if(!empty($params['member_id']) && is_numeric($params['member_id'])){
		$where=$where." AND o.member_id = ".$params['member_id']."  and o.product_id = i.product_id ";
	}
	
	//全部   
	if($params['type']=='1'){
		$where=$where." AND (o.order_state=0 or o.order_state=1 or o.order_state=2 )  ";
	}
	//待付款
	else if($params['type']=='2'){
		$where=$where." AND o.order_state=0 AND (o.pay_time is null or o.pay_time='') ";
	}
	//待收货
	else if($params['type']=='3'){
		$where=$where." AND ((o.order_state=0 AND (o.pay_time is not null or o.pay_time!='')) or o.order_state=1 )";
	}
	//待评价
	else if($params['type']=='4'){
		$where=$where." AND o.order_state=2 AND o.comment_state=0  ";
	}
	//已完成
	else if($params['type']=='5'){
		$where=$where." AND o.order_state=2 AND o.comment_state=1  ";
	}
	
	$sql = "select o.pay_time,o.comment_state,o.order_id,o.order_code,o.order_state,i.product_acount,i.product_price1,o.order_price,p.product_name,p.product_pic,p.product_pack,info.num from shop_order o left join shop_order_info i on o.order_code=i.order_code left join shop_product p on o.product_id=p.product_id left join (select order_code,count(1)num from shop_order_info group by order_code)info on info.order_code = o.order_code ".$where." order by o.order_id desc ".getPage($page)." ";
//select o.order_id,o.order_code,o.order_state,i.product_acount,i.product_price1,o.order_price,p.product_name,p.product_pic,p.product_pack,info.num from shop_order o left join shop_order_info i on o.order_code=i.order_code left join shop_product p on o.product_id=p.product_id left join (select order_code,count(1)num from shop_order_info group by order_code)info on info.order_code = o.order_code where o.order_code=1457418476075 and o.product_id = i.product_id  
//select o.order_id,o.order_code,o.order_state,i.product_acount,i.product_price1,o.order_price,p.product_name,p.product_pic,p.product_pack,info.num from shop_order o left join shop_order_info i on o.order_code=i.order_code left join shop_product p on o.product_id=p.product_id left join (select order_code,count(1)num from shop_order_info group by order_code)info on info.order_code = o.order_code where o.member_id=5 and o.product_id = i.product_id  
//	echo $sql."<br />";
	return SQLHelper::getInstance()->query($sql);
}
/**
 * 获取会员订单评价分页
 * @param $limit
 * @param $rowid
 * @param $member_id 会员ID
 * @author 沈家盛
 */
function getOrderCommentManagerPage2($page,$member_id){
	$where=" where (i.comment_date is not null or i.comment_date!='') ";
	//全部   
	if(is_numeric($member_id)&&$member_id>0){
		$where=$where." AND  i.member_id= ".$member_id.' ';
	}

	$sql = "select i.info_id,i.product_price2,i.product_acount,i.order_code,p.product_price1 product_price,p.product_name,p.product_title,p.product_pack,i.comment_point,i.comment_content,i.comment_date,i.share_pic1 ,i.share_pic2 ,i.share_pic3 ,i.share_pic4 ,i.share_pic5 from shop_order_info i 
				left join shop_product p on i.product_id=p.product_id ".$where." order by info_id desc ".getPage($page);

	return SQLHelper::getInstance()->query($sql);
}
/**
 * 获取会员订单历史总价
 * @param $limit
 * @param $rowid
 * @param $member_id 会员ID
 * @author 沈家盛
 */
function getOrderTotal($member_id){
	$where=" where (((order_state=0 AND (pay_time is not null or pay_time!='')) or order_state=1 ) or order_state=2 AND comment_state=0 or order_state=2 AND comment_state=1)  ";
	//全部   
	if(is_numeric($member_id)&&$member_id>0){
		$where=$where." and member_id= ".$member_id;
	}

	$sql = "SELECT ROUND(sum(order_price),2) FROM shop_order ".$where;

	return SQLHelper::getInstance()->queryObject($sql);
}
/**
 * 获取会员订单历史参数
 * @param $limit
 * @param $rowid
 * @param $member_id 会员ID
 * @author 沈家盛
 */
function getOrderCount2($member_id){
	$where=" where (((order_state=0 AND (pay_time is not null or pay_time!='')) or order_state=1 ) or order_state=2 AND comment_state=0 or order_state=2 AND comment_state=1)  ";
	//全部   
	if(is_numeric($member_id)&&$member_id>0){
		$where=$where." and member_id= ".$member_id;
	}

	$sql = "SELECT count(*) FROM shop_order ".$where;

	return SQLHelper::getInstance()->queryObject($sql);
}

?>