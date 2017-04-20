<?php
/**
 * 客户留言咨询维护
 * Version: 1.0
 * Author: sunwei
 * Date: 2013-06-15
 */

/**
 * 客户留言
 */
function setMessage($message){
	$sql = "INSERT INTO t_message(m_linkman,m_email,m_message,m_time1,m_tel,m_qq,m_title,m_fax,m_phone,m_type,m_backtype,m_company) 
			values('$message[0]','$message[1]','$message[2]',now(),'$message[3]','$message[4]','$message[5]','$message[6]'
					,'$message[7]','$message[8]','$message[9]','$message[10]')";
	
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 获取客户留言分页信息
 * @param unknown_type $limit 分页数
 * @param unknown_type $rowid 
 * @param unknown_type $m_linkman 联系人
 * @param unknown_type $m_email 联系邮件地址
 * @param unknown_type $m_message 留言内容
 */
function getMessageList($limit,$rowid,$m_linkman="",$m_email="",$m_message=""){
	$where=' where 1=1 ';
			
	if(!empty($m_linkman)){
		$where=$where." AND m_linkman like '%".$m_linkman."%'";
	}
	
	if(!empty($m_email)){
		$where=$where." AND m_email like '%".$m_email."%'";
	}	
	
	if(!empty($m_message)){
		$where=$where." AND m_message like '%".$m_message."%'";
	}	
	
	$sql = "SELECT * FROM t_message ".$where." order by m_id desc limit ".$rowid.",".$limit." ";

	//echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 统计产品分页信息
 * @param $p_name 产品名称
 * @param $p_type 产品规格
 * @param $p_info 产品说明
 */
function getMessageCount($m_linkman="",$m_email="",$m_message=""){
	$where=' where 1=1 ';
			
	if(!empty($m_linkman)){
		$where=$where." AND m_linkman like '%".$m_linkman."%'";
	}
	
	if(!empty($m_email)){
		$where=$where." AND m_email like '%".$m_email."%'";
	}	
	
	if(!empty($m_message)){
		$where=$where." AND m_message like '%".$m_message."%'";
	}
	
	$sql = "SELECT count(*) FROM t_message ".$where;

	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 删除留言
 * @param $id 留言ID
 */
function deleteMessage($id){
	$sql = "DELETE FROM t_message WHERE m_id=".$id;	
	$result = SQLHelper::getInstance()->execute($sql);
	return $result;
}

/**
 * 获取留言信息
 * @param $id
 */
function getMessage($id){
	$sql = "SELECT * FROM t_message WHERE m_id=".$id;
	
	return SQLHelper::getInstance()->query($sql);
}


?>