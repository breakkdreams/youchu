<?php
/**
 * 广告管理
 */


/**
 * 添加广告位置
 * @param $brand
 */
function createADSite($ad){
	
	$sql = "insert into shop_ad(ad_name) values(?)";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('s', $ad['ad_name']);

    $stmt->execute();
    
    return $stmt->insert_id;
}


/**
 * 更新广告位置
 * @param $brand
 */
function updateADSite($ad){
	$sql = "update shop_ad set ad_name=? where ad_id=?"; 

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('si', $ad['ad_name'], $ad['ad_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 删除广告位置
 * @param $id
 */
function deleteADSite($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "delete from shop_ad where ad_id=".$id;
	
		return SQLHelper::getInstance()->execute($sql);	
	}
	
	return -1;
}

/**
 * 获取商品信息
 * @param $id
 */
function getADSiteInfo($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "select * from shop_ad where ad_id=".$id;
	
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 获取品牌列表
 */
function getADSiteList(){
	
	$sql = "select * from shop_ad order by ad_name";
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 添加广告
 * @param $brand
 */
function createAD($ad){
	
	$sql = "insert into shop_ad_detail(d_area,d_title,d_pic,d_url,d_time1,d_time2,product_id,ad_id) values(?,?,?,?,?,?,?,?)";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('ssssssii', $ad['d_area'],
								$ad['d_title'],
								$ad['d_pic'],
								$ad['d_url'],
								$ad['d_time1'],
								$ad['d_time2'],
								$ad['product_id'],
								$ad['ad_id']);

    $stmt->execute();
    return $stmt->insert_id;
}


/**
 * 更新广告
 * @param $brand
 */
function updateAD($ad){
	$sql = "update shop_ad_detail set d_area=?,d_title=?,d_pic=?,d_url=?,d_time1=?,d_time2=?,ad_id=?,product_id=? where d_id=?"; 

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('ssssssiii', $ad['d_area'],
								$ad['d_title'],
								$ad['d_pic'],
								$ad['d_url'],
								$ad['d_time1'],
								$ad['d_time2'],
								$ad['ad_id'],
								$ad['product_id'],
								$ad['d_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 删除广告
 * @param $id
 */
function deleteAD($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "delete from shop_ad_detail where d_id=".$id;
	
		return SQLHelper::getInstance()->execute($sql);	
	}
	
	return -1;
}

/**
 * 获取广告信息
 * @param $id
 */
function getADInfo($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "select * from shop_ad_detail where d_id=".$id;
	
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 获取广告列表
 */
function getADList(){
	
	$sql = "select * from shop_ad_detail order by d_title";
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取广告分页
 * @param $limit
 * @param $rowid
 * @param $parms 
 */
function getADPage($limit,$rowid,$params=''){
	$where=' where 1=1 ';

		
	$sql = "select d.*,a.ad_name from shop_ad_detail d left join shop_ad a on d.ad_id=a.ad_id order by d.d_id limit ".$rowid.",".$limit." ";

	//echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取广告总数
 */
function getADCount($params=''){
	$where=' where 1=1 ';
			
	$sql = "select count(1) from shop_ad_detail d left join shop_ad a on d.ad_id=a.ad_id";
	
	return SQLHelper::getInstance()->queryObject($sql);
}

/**************************/

//首页
/**************************/

/**
 * 根据广告位置获取广告（首页）
 * @author 沈家盛
 */
function getADByName($params='0'){
	$where=' where 1=1 ';
	if(!empty($params)){
		$where = $where."and a.ad_name = '".$params."'";
	}
		
	$sql = "select * from shop_ad_detail d left join shop_ad a on d.ad_id=a.ad_id ".$where." order by d.d_id desc";

	return SQLHelper::getInstance()->query($sql);
}


?>