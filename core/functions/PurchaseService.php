<?php
/**
 * 商品进货管理
 */


/**
 * 添加商品进货
 * @param $brand
 */
function savePurchase($map){
	
	$sql = "insert into shop_product_purchase(product_id,pur_purchaser,pur_time,pur_count,pur_price1,pur_price2,pur_supplier,pur_warehouse,pur_operator,pur_date) values(?,?,?,?,?,?,?,?,?,now())";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('issiddssi', $map['product_id'],
									$map['pur_purchaser'],
									$map['pur_time'],
									$map['pur_count'],
									$map['pur_price1'],
									$map['pur_price2'],
									$map['pur_supplier'],
									$map['pur_warehouse'],
									$map['pur_operator']);

    $stmt->execute();
    
    return $stmt->insert_id;
}


/**
 * 更新商品进货信息
 * @param $brand
 */
function updatePurchase($map){
	
	$sql = "update shop_product_purchase set pur_purchaser=?,pur_time=?,pur_count=?,pur_price1=?,pur_price2=?,pur_supplier=?,pur_warehouse=?,pur_operator=?,pur_date=now() where pur_id=? and product_id=?"; 

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);
	
	//绑定参数
	$stmt->bind_param('ssiddssiii', $map['pur_purchaser'],
									$map['pur_time'],
									$map['pur_count'],
									$map['pur_price1'],
									$map['pur_price2'],
									$map['pur_supplier'],
									$map['pur_warehouse'],
									$map['pur_operator'], 
									$map['pur_id'],
									$map['product_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}


/**
 * 获取商品进货信息
 * @param $id
 */
function getPurchaseInfo($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "select * from shop_product_purchase where pur_id=".$id;
	
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 获取商品进货分页
 * @param $limit
 * @param $rowid
 * @param $parms 
 */
function getPurchasePage($limit,$rowid,$params){
	
	$where=' where 1=1 ';

	if(!empty($params['product_id']) && is_numeric($params['product_id'])){
		$where = $where." and product_id='".$params['product_id']."'";
	}
		
	$sql = "select * from shop_product_purchase ".$where." order by pur_id desc limit ".$rowid.",".$limit." ";

	//echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取商品进货总数
 */
function getPurchaseCount($params){
	$where=' where 1=1 ';

	if(!empty($params['product_id']) && is_numeric($params['product_id'])){
		$where = $where." and product_id='".$params['product_id']."'";
	}
	
	$sql = "select count(1) from shop_product_purchase ".$where;
	
	return SQLHelper::getInstance()->queryObject($sql);
}
?>