<?php
/**
 * 购物车
 * Version: 1.0
 * Author: sunwei
 * Date: 2013-12-11
 */


/**
 * 添加产品至购物车
 * @param $cart
 */
function addCart($cart){
	
	if(is_numeric($cart['member_id']) && is_numeric($cart['product_id'])){
		
		//1.判断用户购物车表里是否已经存在该商品
		$sq1 = "select count(*) from shop_cart where product_id='".$cart['product_id']."' and member_id=".$cart['member_id'];
		
		$count = SQLHelper::getInstance()->queryObject($sq1);
		
		//2.购物车已经存在该商品，则数量加1
		if(is_numeric($count) && $count>0){
			$sq2 = "update shop_cart set cart_acount=cart_acount+".$cart['cart_acount']." where product_id='".$cart['product_id']."' and member_id=".$cart['member_id'];
			
			return SQLHelper::getInstance()->execute($sq2);
		}
		//3.购物车不存在该商品，添加到购物车
		else{
			
			$sql3="insert into shop_cart(member_id,product_id,type_id,cart_acount,is_taocan) values(?,?,?,?,?)";
			
			$mysqli = SQLHelper::getInstance()->getConnection();
		
			//mysqli中有直接的方法可用
			$stmt = $mysqli->prepare($sql3);
		
			//绑定参数
			$stmt->bind_param('iiiii', $cart['member_id'], $cart['product_id'], $cart['type_id'], $cart['cart_acount'], $cart['is_taocan']);
		
		    $stmt->execute();
		    
		    return $stmt->insert_id;
		}
	}	
}

/**
 * 获取客户购物车信息
 * @param unknown_type $member_id
 */
function getCartList($member_id){
	
	if(is_numeric($member_id)){
		//1.普通商品购物车内容
		$sql = "select s.*,p.product_name,p.product_price1,t.type_name,t.type_price,p.* FROM shop_cart s
				left join shop_product p on s.product_id=p.product_id left join shop_product_type t on s.type_id=t.type_id where s.is_taocan=0 and s.member_id=".$member_id;
		
		//echo $sql;
		
		$array1 = SQLHelper::getInstance()->query($sql);
		
		return $array1;
		//2.套餐购物车内容
		//$sql2 = "select s.*,p.t_name as product_name,p.t_price1 as product_price1 FROM shop_cart s
				//left join shop_product_taocan p on s.product_id=p.t_id where s.is_taocan=1 and s.member_id=".$member_id;
		
		//$array2 = SQLHelper::getInstance()->query($sql2);
		
		//return array_merge($array1, $array2); 
	}
	
}
/**
 * 获取客户购物车信息(购物车列表)
 * @param unknown_type $member_id
 * @author  沈家盛
 */
function getCartList2($member_id,$groupId){
	
	if(is_numeric($member_id)){
		//1.普通商品购物车内容
		$sql = "select s.cart_id,p.product_id,p.product_pic,p.product_name,p.product_pack,p.product_amount,";
					//企业价格
		if($groupId==3){
			$sql = $sql."p.product_vip product_price,";
		}
		//高级会员
		else if($groupId==2){
			$sql = $sql."p.product_price1 product_price,";
		} 
		//普通会员
		else if($groupId==1){
			$sql = $sql."p.product_price2 product_price,";
		}
		//游客
		else{
			$sql = $sql."p.product_price2 product_price,";
		}
		$sql = $sql."s.cart_acount FROM shop_cart s left join shop_product p on s.product_id=p.product_id left join shop_product_type t on s.type_id=t.type_id where s.is_taocan=0 and s.member_id=".$member_id;
		
		
		$array1 = SQLHelper::getInstance()->query($sql);
		return $array1;
	}
	
}

function getOrderTemp($member_id,$cartid=''){
	
	if(empty($member_id)){
		return null;
	}
	if(!empty($cartid)){
		$condition=" and s.cart_id in (".$cartid.")";
	}
	
	//1.普通商品购物车内容
	$sql = "select s.*,p.product_name,p.product_price1,t.type_name,t.type_price,p.product_pic FROM shop_cart s
			left join shop_product p on s.product_id=p.product_id left join shop_product_type t on s.type_id=t.type_id where s.is_taocan=0 and s.member_id=".$member_id.$condition;
	
//	echo $sql;
	
	$array1 = SQLHelper::getInstance()->query($sql);
	
	//2.套餐购物车内容
	$sql2 = "select s.*,p.t_name as product_name,p.t_price1 as product_price1 FROM shop_cart s
			left join shop_product_taocan p on s.product_id=p.t_id where s.is_taocan=1 and s.member_id=".$member_id.$condition;
	
	$array2 = SQLHelper::getInstance()->query($sql2);
	
	return array_merge($array1, $array2); 
}

/**
 * 删除购物车内商品
 * @param $cartid
 */
function deleteCartItem($cartid){
	
	$sql = "delete from shop_cart where cart_id=".$cartid;
	
	return SQLHelper::getInstance()->execute($sql);
}
/**
 * 批量删除购物车内商品
 * @param  $cartids
 */
function deleteCartItems($cartids){
	
	$sql = "delete from shop_cart where cart_id in (".$cartids.")";
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 清除账户购物车信息
 * @param $member_id
 */
function cleanCart($member_id){
	
	$sql = "delete from shop_cart where member_id=".$member_id;
	
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 购物车数量统计
 * @param $member_id
 */
function countCart($member_id){
	
	if(is_numeric($member_id)){
		$sql = "select count(*) from shop_cart where member_id=".$member_id;
	
		return SQLHelper::getInstance()->queryObject($sql);	
	}
	return 0;
}
/**
 * 购物车数量统计
 * @param $member_id
 * @param $product_id
 * @author 沈家盛
 */
function countCartByProduct($member_id){
	
	if(is_numeric($member_id)){
		$sql = "select sum(cart_acount)cart_acount from shop_cart where member_id=".$member_id;
	
		return SQLHelper::getInstance()->queryObject($sql);	
	}
	return 0;
}
/**
 * 要购买的商品列表
 * @param $product_id
 * @author 沈家盛
 */
function countCartListByBuy($cartids){
	
	if(!empty($cartids)){
		$sql = "select s.cart_id,p.product_id,p.product_pic,p.product_name,p.product_pack,p.product_price1,s.cart_acount FROM shop_cart s
				left join shop_product p on s.product_id=p.product_id left join shop_product_type t on s.type_id=t.type_id where s.is_taocan=0 and s.cart_id in (".$cartids.")";
	
		$array1 = SQLHelper::getInstance()->query($sql);
		
		return $array1;
	}
}
/**
 * 确认订单时更新购物车数量
 * @param $sql_array
 */
function updateCartBatch($sql_array){
	return SQLHelper::getInstance()->executeTrance($sql_array);
}

?>