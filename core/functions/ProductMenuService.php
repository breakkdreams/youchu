<?php
/**
 * 产品分类信息维护
 * Version: 2.0
 * Author: sunwei
 * Date: 2015-12-16
 */
//$m_fid=0,$m_name,$m_size,$m_floor,$m_photo='',$m_url='',$m_keyword='',$m_order=1
function createProductMenu($menu){
	
	if($menu['m_size']==1){
		
		$sql = "SELECT ifnull(MAX(M_NUM),0)+1 FROM shop_product_menu WHERE M_FID=0";
		
		$m_num = SQLHelper::getInstance()->queryObject($sql);
		
		$menu['m_num'] = $m_num;
		$menu['m_floor'] = $m_num.'.';
		
		$sql = "INSERT INTO shop_product_menu(m_fid,m_name,m_size,m_floor,m_photo,m_url,m_keyword,m_order,m_num,m_photo2) values(0,?,1,?,?,?,?,?,?,?)";
		
		$mysqli = SQLHelper::getInstance()->getConnection();
		
		//mysqli中有直接的方法可用
		$stmt = $mysqli->prepare($sql);
	
		//绑定参数
		$stmt->bind_param('sssssiis', $menu['m_name'], $menu['m_floor'], $menu['m_photo'], $menu['m_url'], $menu['m_keyword'], $menu['m_order'], $menu['m_num'] ,$menu['m_photo2']);
	
	    $stmt->execute();
	    
	    return $stmt->insert_id;
	}else{
		
		$m_fid = $menu['m_fid'];
		
		if(is_numeric($m_fid)){
			
			$sql = "SELECT ifnull(MAX(M_NUM),0)+1 FROM shop_product_menu WHERE M_FID=".$m_fid;
			
			$menu['m_num'] = SQLHelper::getInstance()->queryObject($sql);
					
			$menu['m_floor'] = $menu['m_floor'].''.$menu['m_num'].'.';
			
			$sql = "INSERT INTO shop_product_menu(m_fid,m_name,m_size,m_floor,m_photo,m_url,m_keyword,m_order,m_num,m_photo2) values(?,?,?,?,?,?,?,?,?,?)";
		
			$mysqli = SQLHelper::getInstance()->getConnection();
			
			//mysqli中有直接的方法可用
			$stmt = $mysqli->prepare($sql);
		
			//绑定参数
			$stmt->bind_param('issssssiis', $menu['m_fid'],$menu['m_name'],$menu['m_size'], $menu['m_floor'], $menu['m_photo'], $menu['m_url'], $menu['m_keyword'], $menu['m_order'], $menu['m_num'],$menu['m_photo2']);
		
		    $stmt->execute();
		    
		    return $stmt->insert_id;
		}
		else{
			return 0;
		}
	}
	
}

/**
 * 更新菜单信息 
 * @param $menu
 */
function updateProductMenu($menu){
	
	$sql = "UPDATE shop_product_menu SET m_name=?,m_photo=?,m_keyword=?,m_order=?,m_photo2=? where m_id=?";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
			
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('sssisi', $menu['m_name'], $menu['m_photo'], $menu['m_keyword'], $menu['m_order'],$menu['m_photo2'], $menu['m_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 获取菜单列表
 * @param $m_floor
 */
function getProductMenuList($m_floor=''){
	
	if(!empty($m_floor)){
		$sql = "SELECT * FROM shop_product_menu WHERE M_FLOOR LIKE '%" .$m_floor."%' ORDER BY M_FLOOR";	
	}
	else{
		$sql = "SELECT * FROM shop_product_menu ORDER BY M_FLOOR";
	}
	
	
	return SQLHelper::getInstance()->query($sql);
}



/**
 * 根据父级ID获取子栏目
 * @param $m_fid
 */
function getProductMenuListByParentId($m_fid='0'){
	
	$sql = "SELECT * FROM shop_product_menu WHERE (M_FID='" .$m_fid."') ORDER BY M_FLOOR";
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取指定栏目信息
 * @param $id
 */
function getProductMenuName($id='0'){
	$sql = "SELECT M_NAME FROM shop_product_menu WHERE M_ID='".$id."'";
	
	//echo $sql;
	
	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 获取指定栏目信息
 * @param $id
 */
function getProductMenu($id='0'){
	$sql = "SELECT * FROM shop_product_menu WHERE M_ID='".$id."'";
	
	//echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}


/**
 * 删除制定栏目及子栏目
 * @param $floor 删除指定栏目的编号
 */
function deleteProductMenu($m_id){
	
	if(is_numeric($m_id)){
		
		$m_floor = SQLHelper::getInstance()->queryObject("select m_floor from shop_product_menu where m_id=".$m_id);
		
		return SQLHelper::getInstance()->execute("delete from shop_product_menu where m_floor like '".$m_floor."%'");
	}
	
	return 0;
}

/**
 * 更改栏目名称
 * @param $id
 * @param $name
 */
function updateProductMenuName($id,$name){
	
	$sql = "UPDATE shop_product_menu SET M_NAME='$name' WHERE M_ID=".$id;
	
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 更新栏目照片
 * @param $id
 * @param $photo
 */
function updateProductMenuPhoto($id,$photo){
	$sql = "UPDATE shop_product_menu SET M_PHOTO='$photo' WHERE M_ID=".$id;

	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 更新m_order
 * @param $m_id
 * @param $m_order
 */
function updateProductM_order($m_id,$m_order){
	
	$sql="update shop_product_menu set m_order=".$m_order." where m_id=".$m_id;
	
	return SQLHelper::getInstance()->execute($sql);
}

/**
 *获取父菜单ID
 * @param $m_id
 */
function getParentProductMenuId($m_id){
	
	$sql="select m_fid from shop_product_menu where m_id=".$m_id;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取指定层级菜单列表
 * @param $m_floor
 */
function getProductMenuListEx($m_floor=''){
	$sql = "SELECT * FROM shop_product_menu WHERE M_FLOOR LIKE '".$m_floor."' ORDER BY M_FLOOR";
	
	return SQLHelper::getInstance()->query($sql);
}
?>