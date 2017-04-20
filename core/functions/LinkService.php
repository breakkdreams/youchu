<?php
/**
 * 友情链接管理
 */


/**
 * 添加友情链接位置
 * @param $brand
 */
function createLinkSite($Link){
	
	$sql = "insert into t_url(u_name,u_link,u_photo,u_order,u_display) values(?,?,?,?,?)";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('sssii', $Link['u_name'],$Link['u_link'],$Link['u_photo'],
								$Link['u_order'],$Link['u_display']);

    $stmt->execute();
    
    return $stmt->insert_id;
}


/**
 * 更新友情链接位置
 * @param $brand
 */
function updateLinkSite($Link){
	$sql = "update t_url set u_name=?,u_link=?,u_photo=?,u_order=?,u_display=? where u_id=?"; 

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('sssiii', $Link['u_name'],$Link['u_link'],$Link['u_photo'],
								$Link['u_order'],$Link['u_display'],$Link['u_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 删除友情链接位置
 * @param $id
 */
function deleteLinkSite($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "delete from t_url where u_id=".$id;
	
		return SQLHelper::getInstance()->execute($sql);	
	}
	
	return -1;
}

/**
 * 获取友情链接信息
 * @param $id
 */
function getLinkSiteInfo($id){
	
	if(is_numeric($id) && $id>0){
		$sql = "select * from t_url where u_id=".$id;
	
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 获取友情链接列表
 */
function getLinkSiteList(){
	
	$sql = "select * from t_url order by u_order";
	
	return SQLHelper::getInstance()->query($sql);
}

function setLinkDisplay($id,$display){
	
	if(is_numeric($id) && is_numeric($display)){
		$sql = "update t_url set u_display='".$display."' where u_id=".$id;
	
		return SQLHelper::getInstance()->execute($sql);
	}
	
	return 0;
}
?>