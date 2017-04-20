<?php

/**
 * 获取用户登录信息
 * @param $_name 登录用户名
 * @param $_password 登录密码
 */
function manage_login($_name,$_password){
	$sql = "SELECT * FROM t_manager WHERE u_name='$_name' AND u_password='$_password'";
	
	//echo $sql;
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 登录信息更新
 * @param $id
 */
function manage_loginupdate($id,$ip){
	$sql = "UPDATE t_manager SET u_lasttime=now(),u_ip='$ip' WHERE u_id=".$id;
	
// 	echo $sql;
	
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 检测用户表是否已经初始化
 */
function check_init(){
	$sql = "select count(*) from t_manager";
	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 创建管理员
 * @param $name 登陆名
 * @param $username 姓名
 * @param $password 密码
 */
function manage_create($manager){
	
	$sql = "insert into t_manager(u_name,u_username,u_password,u_email,u_role) values(?,?,?,?,?)";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('ssssi', $manager['u_name'], 
								$manager['u_username'], 
								$manager['u_password'], 
								$manager['u_email'], 
								$manager['u_role']);

    $stmt->execute();
    
    return $stmt->insert_id;
}

function manage_update($manager){
	
	if(is_numeric($manager['u_id'])){
		
		$sql = "update t_manager set u_name=?,u_username=?,u_email=?,u_role=? where u_id=?"; 

		$mysqli = SQLHelper::getInstance()->getConnection();
			
		$stmt = $mysqli->prepare($sql);
	
		$stmt->bind_param('sssii', $manager['u_name'], 
								$manager['u_username'], 
								$manager['u_email'], 
								$manager['u_role'], $manager['u_id']);
	
	    $stmt->execute();
	    
	    return $stmt->affected_rows;
	}	
}

/**
 * 更新管理员账号密码
 * @param $newpassword
 */
function changePassword($id,$realname,$newpassword,$oldpassword){
	$newpassword=md5($newpassword);
	$oldpassword=md5($oldpassword);
	
	$sql = "UPDATE T_MANAGER SET U_PASSWORD='$newpassword',U_USERNAME='$realname' WHERE U_ID='$id' AND U_PASSWORD='$oldpassword'";
	
	//echo $sql;
	
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 获取管理员列表
 */
function getManagerList(){
	
	$sql = "select * from t_manager where u_role>0 order by u_role";
	
	return SQLHelper::getInstance()->query($sql);
}

function getManagerInfo($id){
	
	if(is_numeric($id)){
		
		$sql = "select * from t_manager where u_id=".$id;
		
		return SQLHelper::getInstance()->query($sql);
	}
}

/**
 * 检测管理员账号是否存在
 * @param $name
 */
function checkManagerName($name){
	
	$sql = "select count(*) from t_manager where u_name='".$name."'";
	
	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 设置管理员账号权限
 * @param $manager
 */
function setManagerRight($manager){
	
	$sql = "delete from manager_right where u_id=".$manager['u_id'];
	
	SQLHelper::getInstance()->execute($sql);
	
	$sql2 = "insert into manager_right(u_id,r_menu,r_product) values('".$manager['u_id']."','".$manager['r_menu']."','".$manager['r_product']."')";
	
	return SQLHelper::getInstance()->execute($sql2);
}

/**
 * 调取管理员账号权限
 * @param $id
 */
function getManagerRight($id){
	
	$sql = "select * from manager_right where u_id=".$id;
	
	return SQLHelper::getInstance()->query($sql);
}
?>