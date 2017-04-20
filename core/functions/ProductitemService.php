<?php
/**
 * 细分类商品
 */
/**
 * 保存细分类商品
 */
function saveProductItem($productitem){
	if(empty($productitem["type_vip_price"])){
		$productitem["type_vip_price"]=$productitem["type_price"];
	}
	if(empty($productitem["type_pre_price"])){
		$productitem["type_pre_price"]=$productitem["type_price"];
	}
	$sql="select item_amount from shop_product where product_id=".$productitem['product_id'];
	$itemamount=SQLHelper::getInstance()->query($sql);
	if(empty($itemamount[0][0])){
		$sql1="insert into shop_product_type(product_id,type_name,type_price,type_number,type_vip_price,type_pre_price) 
	     values(".$productitem['product_id'].",'".$productitem['type_name']."',".$productitem['type_price'].",".$productitem['type_number'].",".$productitem['type_vip_price'].",".$productitem['type_pre_price'].")";
		$sql2="update shop_product set product_price1=".$productitem['type_price'].",product_amount=".$productitem['type_number'].",item_amount=item_amount+1 
			  where product_id=".$productitem['product_id'];

		$sql_array=array($sql1,$sql2);
		return SQLHelper::getInstance()->executeTrance($sql_array);
	}
	else{
		$sql1="insert into shop_product_type(product_id,type_name,type_price,type_number,type_vip_price,type_pre_price) 
	     values(".$productitem['product_id'].",'".$productitem['type_name']."',".$productitem['type_price'].",".$productitem['type_number'].",".$productitem['type_vip_price'].",".$productitem['type_pre_price'].")";
		$sql2="update shop_product 
	       set product_price1=case when product_price1>".$productitem['type_price']." then ".$productitem['type_price']. " when product_price1<=".$productitem['type_price']." then product_price1 end,
	       product_amount=product_amount+".$productitem['type_number'].",item_amount=item_amount+1 
	       where product_id=".$productitem['product_id'];
		$sql_array=array($sql1,$sql2);
		return SQLHelper::getInstance()->executeTrance($sql_array);
	}
}
/**
 * 更新细分类商品
 */
function updateProductItem($productitem){
	if(empty($productitem["type_vip_price"])){
		$productitem["type_vip_price"]=$productitem["type_price"];
	}
	if(empty($productitem["type_pre_price"])){
		$productitem["type_pre_price"]=$productitem["type_price"];
	}
	$sql="select sum(type_number),min(type_price) from shop_product_type where product_id='".$productitem['product_id']."' and type_id!='".$productitem['type_id']."'";
	$numandprice=SQLHelper::getInstance()->query($sql);
	$numandprice[0][0]=$numandprice[0][0]+$productitem['type_number'];
	if($numandprice[0][1]>$productitem['type_price']){
		$numandprice[0][1]=$productitem['type_price'];
	}
	$sql1="update shop_product_type set product_id='".$productitem['product_id']."',
	                                   type_name='".$productitem['type_name']."',
	                                   type_price='".$productitem['type_price']."',
	                                   type_vip_price='".$productitem['type_vip_price']."',
	                                   type_pre_price='".$productitem['type_pre_price']."',
	                                   type_number='". $productitem['type_number']."'
	                                   where type_id='".$productitem['type_id']."'";
	$sql2="update shop_product 
	    set product_price1='".$numandprice[0][1]."',
	    product_amount=".$numandprice[0][0]." 
	    where product_id=".$productitem['product_id'];
	$sql_array=array($sql1,$sql2);
/*print_r($sql_array);
exit();*/
	return SQLHelper::getInstance()->executeTrance($sql_array);
}
/**
 * 获取细分类商品详细信息
 */
function getProductItemInfo($id){
	$sql = "select *
			from shop_product_type i 
			    left join shop_product p on i.product_id=p.product_id
			    left join shop_brand b on p.brand_id=b.brand_id 
			    left join t_menu m on p.product_type1=m.m_id
			where i.type_id='".$id."'";
	return SQLHelper::getInstance()->query($sql);
}
/**
 * 删除细分类商品
 */
function deleteProductItem($id){
	$sql="select * from shop_product_type where type_id=".$id;
	$item=SQLHelper::getInstance()->query($sql);
	if(empty($item)){
		return 0;
	}
	$sql1="delete from shop_product_type where type_id=".$id;
	$sql2="update shop_product 
	       set product_price1=(select min(type_price) from shop_product_type where product_id=".$item[0]['product_id']."),
	       product_amount=product_amount-".$item[0]['type_number']." ,
	       item_amount=item_amount-1 
	       where product_id=".$item[0]['product_id'];
	$sql_array=array($sql1,$sql2);
	return SQLHelper::getInstance()->executeTrance($sql_array);
}
/**
 * 获取细分类商品分页
 */
function getProductitemPage($limit,$rowid,$search1='',$search2='',$search3=''){
	$where=' where 1=1 ';

	if(!empty($search1) && $search1!='0'){
		$where = $where.' and p.product_id in ('.$search1.')';
	}
		
	$sql = "select *
			from shop_product_type i 
			    left join shop_product p on i.product_id=p.product_id
			    left join shop_brand b on p.brand_id=b.brand_id 
			    left join t_menu m on p.product_type1=m.m_id ".$where."
			order by p.product_id limit ".$rowid.",".$limit." ";
	return SQLHelper::getInstance()->query($sql);
}
/**
 * 获取细分类商品总数
 */
function getProductitemCount($search1='',$search2='',$search3=''){
	$where=' where 1=1 ';

	if(!empty($search1) && $search1!='0'){
		$where = $where.' and product_id in ('.$search1.')';
	}
	
	$sql = "select count(1) 
			from shop_product_type".$where;
	
	return SQLHelper::getInstance()->queryObject($sql);
}
/**
 * 获取细分类商品列表
 */
function getProductitemList($p_id){
	$sql="select * from shop_product_type where product_id=".$p_id." order by type_price";
	return SQLHelper::getInstance()->query($sql);
}
function getProductitemAll(){
	$sql="select * from shop_product_type";
	return SQLHelper::getInstance()->query($sql);
}
?>