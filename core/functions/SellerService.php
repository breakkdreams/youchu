<?php
/**
 * 商家管理
 */


/**
 * 添加商家
 * @param $seller
 */
function saveSeller($seller){
	
	$sql = "insert into shop_seller(REGION_ID,s_name,s_manager,s_400,s_address,s_range,s_applyer,s_apperphone,member_id,s_applydate) values(?,?,?,?,?,?,?,?,?,now())";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('isssssssi', $seller['REGION_ID'], $seller['s_name'], $seller['s_manager'], $seller['s_400'],
								$seller['s_address'], $seller['s_range'], $seller['s_applyer'],$seller['s_apperphone'],$seller['member_id']);

    $stmt->execute();
    
    return $stmt->insert_id;
}

/**
 * 商家更新提交审核资料
 * @param $seller
 */
function updateSellerApplyInfo($seller){
	
	$sql = "update shop_seller set s_name=?,s_manager=?,s_400=?,s_address=?,s_range=?,s_applyer=?,s_apperphone=? where s_id=? and member_id=?"; 

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('sssssssii', $seller['s_name'], $seller['s_manager'], $seller['s_400'],
								$seller['s_address'], $seller['s_range'], $seller['s_applyer'],$seller['s_apperphone'],$seller['s_id'],$seller['member_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}


/**
 * 更新商家信息
 * @param $seller
 */
function updateSeller($seller){
	$sql = "update shop_seller set REGION_ID=?,s_level=?,s_name=?,s_manager=?,s_idcard=?,s_400=?,s_address=?,s_license=?,s_code=?,s_range=?,s_logo=?,s_banner=?,s_www=?,s_qq=?,s_ww=?,s_idcard_pic1=?,s_idcard_pic2=? where s_id=?"; 

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('iisssssssssssssssi', $seller['REGION_ID'],
												$seller['s_level'],
												$seller['s_name'],
												$seller['s_manager'],
												$seller['s_idcard'],
												$seller['s_400'],
												$seller['s_address'],
												$seller['s_license'],
												$seller['s_code'],
												$seller['s_range'],
												$seller['s_logo'],
												$seller['s_banner'],
												$seller['s_www'],
												$seller['s_qq'],
												$seller['s_ww'],
												$seller['s_idcard_pic1'],
												$seller['s_idcard_pic2'], $seller['s_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 获取商品信息
 * @param $id
 */
function getSellerInfo($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "select * from shop_seller where s_id=".$id;
	
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 会员获取自己的申请信息
 * @param $member_id
 * @param $id
 */
function getSellerMyInfo($member_id){
	
	if(is_numeric($member_id) && $member_id>0){
		
		$sql = "select * from shop_seller where  member_id=".$member_id." order by s_id desc limit 1";
	
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 审核商家信息
 * @param $seller
 */
function vettedSellerInfo($seller){
	
	if(is_numeric($seller['s_state'])){
		$sql = "update shop_seller set s_state=? ,s_date=now() where s_id=?";

		$mysqli = SQLHelper::getInstance()->getConnection();
		
		$stmt = $mysqli->prepare($sql);
	
		$stmt->bind_param('ii', $seller['s_state'],$seller['s_id']);
	
	    $stmt->execute();
	    
	    return $stmt->affected_rows;
	}
	
	return 0;
} 

/**
 * 获取商家分页
 * @param $limit
 * @param $rowid
 * @param $parms 
 */
function getSellerPage($limit,$rowid,$params=''){
	$where=' where 1=1 ';

	$sql = "select s.*,m.member_name,m.member_realname,m.member_phone from shop_seller s
			left join shop_member m on s.member_id=m.member_id order by s.s_id desc limit ".$rowid.",".$limit." ";

	//echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取商家总数
 */
function getSellerCount($params=''){
	$where=' where 1=1 ';
			
	$sql = "select count(*) from shop_seller s
			left join shop_member m on s.member_id=m.member_id";
	
	return SQLHelper::getInstance()->queryObject($sql);
}
/**
 * 获取所有商家
 * @param $limit
 * @param $rowid
 * @param $parms 
 */
function getSellerAll(){

	$sql = "select s_id,s_name from shop_seller order by s_id desc  ";

	//echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}
/**
 * 获取省份
 * @param $limit
 * @param $rowid
 * @param $parms 
 */
function getProvinceName($REGION_ID){

	$sql = "select REGION_NAME,PARENT_ID from t_area where REGION_ID= ".$REGION_ID;

	//echo $sql;
	
	return SQLHelper::getInstance()->queryForMap($sql);
}
/**
 * 获取城市
 * @param $limit
 * @param $rowid
 * @param $parms 
 */
function getCityName($REGION_ID){

	$sql = "select REGION_NAME,PARENT_ID from t_area where REGION_ID= ".$REGION_ID;

	//echo $sql;
	
	return SQLHelper::getInstance()->queryForMap($sql);
}
/**
 * 获取区域
 * @param $limit
 * @param $rowid
 * @param $parms 
 */
function getAreaName($REGION_ID){

	$sql = "select REGION_NAME,PARENT_ID from t_area where REGION_ID= ".$REGION_ID;

	//echo $sql;
	
	return SQLHelper::getInstance()->queryForMap($sql);
}

?>