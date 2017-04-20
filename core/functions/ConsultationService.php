<?php
/**
 * 商品咨询管理
 */


/**
 * 添加商品咨询
 * @param $Consultation
 */
function createConsultation($item){
	
	$sql = "insert into shop_consultation(c_id,member_id,m_title,m_content,m_date) values(?,?,?,?,now())";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('iiss', $item['c_id'], $item['member_id'], $item['m_title'], $item['m_content']);

    $stmt->execute();
    
    return $stmt->insert_id;
}


/**
 * 回复咨询信息
 * @param $Consultation
 */
function replyConsultation($item){
	$sql = "update shop_consultation set m_reply=?,m_redate=now(),m_restate=1 where m_id=?"; 

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('si', $item['m_reply'], $item['m_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 获取商品信息
 * @param $id
 */
function getConsultationInfo($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "select * from shop_consultation where m_id=".$id;
	
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 获取咨询分页
 * @param $limit
 * @param $rowid
 * @param $parms 
 */
function getConsultationPage($limit,$rowid,$params=''){
	$where=' where 1=1 ';

	$sql = "select * from shop_consultation order by m_id desc limit ".$rowid.",".$limit." ";

	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取咨询总数
 */
function getConsultationCount($params=''){
	$where=' where 1=1 ';
			
	$sql = "select count(1) from shop_consultation";
	
	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 添加商品咨询类别
 * @param $Consultation
 */
function createConsultationType($item){
	
	$sql = "insert into shop_consultation_type(c_name) values(?)";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('s', $item['c_name']);

    $stmt->execute();
    
    return $stmt->insert_id;
}


/**
 * 更新咨询类别
 * @param $Consultation
 */
function updateConsultationType($item){
	
	$sql = "update shop_consultation_type set c_name=? where c_id=?"; 

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('si', $item['c_name'], $item['c_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 获取咨询类别
 * @param $id
 */
function getConsultationTypeInfo($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "select * from shop_consultation_type where c_id=".$id;
	
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 获取咨询类别列表
 * @param $id
 */
function getConsultationTypeList(){
	
	$sql = "select * from shop_consultation_type";
	
	return SQLHelper::getInstance()->query($sql);
}
?>