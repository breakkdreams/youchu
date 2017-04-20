<?php
/**
 * 商品品牌管理
 */


/**
 * 添加商品品牌
 * @param $brand
 */
function saveBrand($brand){
	
	$sql = "insert into shop_brand(brand_name,brand_web,brand_describe,brand_display,brand_photo,brand_type,brand_phone,brand_linkman,brand_mobile,brand_b1,brand_b2,brand_b3,brand_b4,brand_producer,brand_address,brand_info,brand_license) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('sssisssssssssssss', $brand['brand_name'], $brand['brand_web'], $brand['brand_describe'], $brand['brand_display'], $brand['brand_photo'], $brand['brand_type'], $brand['brand_phone'], $brand['brand_linkman'], $brand['brand_mobile'], $brand['brand_b1'], $brand['brand_b2'], $brand['brand_b3'], $brand['brand_b4'], $brand['brand_producer'], $brand['brand_address'], $brand['brand_info'], $brand['brand_license']);

    $stmt->execute();
    
    return $stmt->insert_id;
}


/**
 * 更新品牌信息
 * @param $brand
 */
function updateBrand($brand){
	$sql = "update shop_brand set brand_name=?,brand_web=?,brand_describe=?,brand_display=?,brand_photo=?,brand_type=?,brand_phone=?,brand_linkman=?,brand_mobile=?,brand_b1=?,brand_b2=?,brand_b3=?,brand_b4=?,brand_producer=?,brand_address=?,brand_info=?,brand_license=? where brand_id=?"; 

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('sssisssssssssssssi', $brand['brand_name'], $brand['brand_web'], $brand['brand_describe']
						   , $brand['brand_display'], $brand['brand_photo'], $brand['brand_type']
						   , $brand['brand_phone'], $brand['brand_linkman'], $brand['brand_mobile']
						   , $brand['brand_b1'], $brand['brand_b2'], $brand['brand_b3']
						   , $brand['brand_b4'], $brand['brand_producer'], $brand['brand_address']
						   , $brand['brand_info'], $brand['brand_license'], $brand['brand_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 删除品牌
 * @param $id
 */
function deleteBrand($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "delete from shop_brand where brand_id=".$id;
	
		return SQLHelper::getInstance()->execute($sql);	
	}
	
	return -1;
}

/**
 * 获取商品信息
 * @param $id
 */
function getBrandInfo($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "select * from shop_brand where brand_id=".$id;
	
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 获取品牌列表
 */
function getBrandList(){
	
	$sql = "select * from shop_brand order by brand_name";
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取品牌分页
 * @param $limit
 * @param $rowid
 * @param $parms 
 */
function getBrandPage($limit,$rowid,$search1='',$search2='',$search3=''){
	$where=' where 1=1 ';

		
	$sql = "select * from shop_brand order by brand_name limit ".$rowid.",".$limit." ";

	//echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取品牌总数
 */
function getBrandCount($search1='',$search2='',$search3=''){
	$where=' where 1=1 ';
			
	$sql = "select count(1) from shop_brand";
	
	return SQLHelper::getInstance()->queryObject($sql);
}
?>