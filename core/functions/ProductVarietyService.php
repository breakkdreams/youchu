<?php
/**
 * 商品分类管理
 */


/**
 * 添加商品品牌
 * @param $brand
 */
function createProductVariety($type){
	
	$sql = "insert into shop_product_variety(v_name,v_photo,v_describe) values(?,?,?)";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('sss', $type['v_name'], $type['v_photo'], $type['v_describe']);

    $stmt->execute();
    
    return $stmt->insert_id;
}


/**
 * 更新商品分类信息
 * @param $brand
 */
function updateProductVariety($type){
	$sql = "update shop_product_variety set v_name=?,v_photo=?,v_describe=? where v_id=?"; 

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('sssi', $type['v_name'], $type['v_photo'], $type['v_describe'], $type['v_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 删除商品分类
 * @param $id
 */
function deleteProductVariety($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "delete from shop_product_variety where v_id=".$id;
	
		return SQLHelper::getInstance()->execute($sql);	
	}
	
	return -1;
}

/**
 * 获取商品信息
 * @param $id
 */
function getProductVarietyInfo($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "select * from shop_product_variety where v_id=".$id;
	
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 获取商品分类列表
 */
function getProductVarietyList(){
	
	$sql = "select * from shop_product_variety order by v_id";
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取商品分类分页
 * @param $limit
 * @param $rowid
 * @param $parms 
 */
function getProductVarietyPage($limit,$rowid,$search1='',$search2='',$search3=''){
	$where=' where 1=1 ';

		
	$sql = "select * from shop_product_variety order by v_id limit ".$rowid.",".$limit." ";

	//echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取商品分类总数
 */
function getProductVarietyCount($search1='',$search2='',$search3=''){
	$where=' where 1=1 ';
			
	$sql = "select count(1) from shop_product_variety";
	
	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 添加SKU
 * @param $brand
 */
function createSKU($type){
	
	$sql = "insert into shop_sku(sku_name) values(?)";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('s', $type['sku_name']);

    $stmt->execute();
    
    return $stmt->insert_id;
}


/**
 * 更新SKU信息
 * @param $brand
 */
function updateSKU($type){
	$sql = "update shop_sku set sku_name=? where sku_id=?"; 

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('si', $type['sku_name'], $type['sku_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 获取SKU列表
 */
function getSKUList(){
	
	$sql = "select * from shop_sku ";

	return SQLHelper::getInstance()->query($sql);
}

function getSKUInfo($id){
	
	if(is_numeric($id)){
		$sql = "select * from shop_sku where sku_id=".$id;
	
		return SQLHelper::getInstance()->query($sql);
	}
	return null;
}

/**
 * 添加配送区域
 * @param $brand
 */
function createArea($area){
	
	$sql = "insert into shop_area(area_name) values(?)";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('s', $area['area_name']);

    $stmt->execute();
    
    return $stmt->insert_id;
}


/**
 * 更新配送区域信息
 * @param $brand
 */
function updateArea($type){
	$sql = "update shop_area set area_name=? where area_id=?"; 

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('si', $type['area_name'], $type['area_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 获取配送区域列表
 */
function getAreaList(){
	
	$sql = "select * from shop_area ";

	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取配送区域信息
 * @param $id
 */
function getAreaInfo($id){
	
	if(is_numeric($id)){
		$sql = "select * from shop_area where area_id=".$id;
	
		return SQLHelper::getInstance()->query($sql);
	}
	return null;
}
?>