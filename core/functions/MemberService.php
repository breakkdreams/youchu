<?php
/**
 *会员管理 
 */


/**
 * 会员注册
 * @param $member
 */
function saveMember($member){
	
	$sql = "insert into shop_member(member_login,member_password,member_phone,recommend_phone,level_id,member_registerdate,group_id) values(?,?,?,?,1,now(),5)";

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('ssss', 	$member['member_login'], 
							 	$member['member_password'],
							 	$member['member_login'],
							  	$member['recommend_phone']);

    $stmt->execute();
    
    return $stmt->insert_id;
}

/**
 * 检测用户名是否存在
 * @param $login
 */
function checkMember($login){
	
	//必须手机号注册
	if(is_numeric($login)){
		$sql = "select count(1) from shop_member where member_login='".$login."'";
	
		return SQLHelper::getInstance()->queryObject($sql);	
	}
	return 1;
}
/**
 * 检测邮箱是否存在
 * @param $login
 */
function checkRegisterEmail($email){
	
	$sql = "select count(1) from shop_member where member_email='".$email."'";
	
//	echo $sql;
	
	return SQLHelper::getInstance()->queryObject($sql);
}
/**
 * 检测手机号码是否存在
 * @param $phone
 */
function checkRegisterPhone($phone){
	
	$sql = "select count(1) from shop_member where member_phone='".$phone."'";
	
//	echo $sql;
	
	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 用户登陆
 * @param $login
 * @param $password
 */
function loginMember($loginname,$password){

	$sql = "select m.*,l.level_name,l.level_logo,l.level_authority,g.group_name from shop_member m
	 left join shop_member_level l on m.level_id=l.level_id 
     left join shop_member_group g on g.group_id=m.group_id 
	where (member_email='".$loginname."' or member_phone='".$loginname."' or member_login='".$loginname."') and member_password='".$password."'";
	return SQLHelper::getInstance()->queryForMap($sql);
}

/**
 * 更新会员信息
 * @param unknown_type $member
 */
function updateMember($member){
	
	$sql = "update shop_member set member_name=?,member_email=?,member_tel=?,member_phone=?,member_zip=?,member_address=?,member_sex=?,member_birthday=?,member_realname=?,member_city=?,member_qq=?,member_wang=?,member_weixin=?,member_weibo=?,member_job=?,member_photo=? where member_id=?";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('ssssssissssssssss',	$member['member_name'],
											$member['member_email'],
											$member['member_tel'],
											$member['member_phone'],
											$member['member_zip'],
											$member['member_address'],
											$member['member_sex'],
											$member['member_birthday'],
											$member['member_realname'],
											$member['member_city'],
											$member['member_qq'],
											$member['member_wang'],
											$member['member_weixin'],
											$member['member_weibo'],
											$member['member_job'],
											$member['member_photo'],
											$member['member_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 获取会员信息
 * @param $id
 */
function getMemberInfo($id){
	
	if(is_numeric($id)){
		$sql = "select m.*,l.level_name,l.level_logo,g.group_name from shop_member m 
		left join shop_member_level l on m.level_id=l.level_id 
	    left join shop_member_group g on g.group_id=m.group_id 
		where member_id=".$id;
	
		return SQLHelper::getInstance()->queryForMap($sql);	
	}
	return null;
}
/**
 * 获取会员信息
 * @param $id
 */
function isMemberByIdAndPassword($id,$password){
	
	if(is_numeric($id)){
		$sql = "select * from shop_member where member_id=".$id.' and member_password='.$password;
	
		return SQLHelper::getInstance()->query($sql);	
	}
	return null;
}

/**
 * 更新密码
 * @param $id
 * @param $old
 * @param $new
 */
function updatePassword($id,$old,$new){
	
	if(is_numeric($id)){
		
		$sql = "update shop_member set member_password=? where member_id=? and member_password=?";
		
		$mysqli = SQLHelper::getInstance()->getConnection();
		
		//mysqli中有直接的方法可用
		$stmt = $mysqli->prepare($sql);
	
		//绑定参数
		$stmt->bind_param('sis',$new,$id,$old);
	
	    $stmt->execute();
	    
	    return $stmt->affected_rows;
	}
	
	return 0;
}
/**
 * 忘记密码
 * @param $member_login
 * @param $member_password
 * @author 沈家盛
 */
function updatePassword2($member_login,$member_password){
	
		
		$sql = "update shop_member set member_password=? where member_login=?";
		
		$mysqli = SQLHelper::getInstance()->getConnection();
		
		//mysqli中有直接的方法可用
		$stmt = $mysqli->prepare($sql);
	
		//绑定参数
		$stmt->bind_param('ss',$member_password,$member_login);
	
	    $stmt->execute();
	    
	    return $stmt->affected_rows;
}

/**
 * 删除会员
 * @param $id
 */
function deleteMember($id){
	
	if(is_numeric($id)){
		
		$sql = "delete from shop_member where member_id='".$id."'";

		return SQLHelper::getInstance()->execute($sql);
	}
	
	return 0;
}

/**
 * 获取管理员会员分页
 * @param $limit
 * @param $rowid
 * @param $member_id 会员ID
 */
function getManageMemberPage($limit,$rowid,$params){
	$where=' where 1=1 ';
	
	$sql = "select m.*,l.level_name from shop_member m left join shop_member_level l on m.level_id=l.level_id ".$where." order by m.member_id desc limit ".$rowid.",".$limit." ";
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取管理员会员总数
 * @param $member_id 会员ID
 */
function getManageMemberCount($params){
	$where=' where 1=1 ';

	$sql = "select count(1) from shop_member ".$where;
	
	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 添加常用地址
 * @param $item
 */
function createMemberAddress($member){
	
	$sql = "insert into shop_member_address(member_id,a_name,a_phone,a_tel,a_address,a_mark) values(?,?,?,?,?,?)";

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('isssss', $member['member_id'], $member['a_name'], $member['a_phone'], $member['a_tel'], $member['a_address'], $member['a_mark']);

    $stmt->execute();
    
    return $stmt->insert_id;
}
/**
 * 添加常用地址时设置默认地址
 * @param $item
 */
function updateUseMemberAddressByCreate($member_id){
		
	if(is_numeric($member_id)){
		$sql = "update shop_member_address set a_use=0 where member_id=".$member_id;
		SQLHelper::getInstance()->execute($sql);
	
		$sql1 = "select max(a_id) from shop_member_address where member_id=".$member_id;
		
		$id = SQLHelper::getInstance()->queryObject($sql1);
		$sql2 = "update shop_member_address set a_use='1' where a_id=".$id;
		return SQLHelper::getInstance()->execute($sql2);
	}
	return 0;
}

/**
 * 编辑常用地址
 * @param $item
 */
function updateMemberAddress($member){
	
	$sql = "update shop_member_address set member_id=?,a_name=?,a_phone=?,a_tel=?,a_address=?,a_mark=? where a_id=?";
								    	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('isssssi', $member['member_id'], $member['a_name'], $member['a_phone'], $member['a_tel'], $member['a_address'], $member['a_mark'], $member['a_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 添加会员等级
 * @param $item
 */
function createMemberLevel($member){
	
	$sql = "insert into shop_member_level(level_name,level_point1,level_logo,level_describe) values(?,?,?,?)";

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('siss', $member['level_name'], $member['level_point1'], $member['level_logo'], $member['level_describe']);

    $stmt->execute();
    
    return $stmt->insert_id;
}

/**
 * 编辑会员等级
 * @param $item
 */
function updateMemberLevel($member){
	
	$sql = "update shop_member_level set level_name=?,level_point1=?,level_logo=?,level_describe=? where level_id=?";
								    	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('sissi', $member['level_name'], $member['level_point1'], $member['level_logo'], $member['level_describe'], $member['level_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 获取会员等级列表
 */
function getMemberLevelList(){
	
	$sql = "select l.*,(select count(*) from shop_member m where m.level_id=l.level_id) as count from shop_member_level l order by l.level_id";
	
	return SQLHelper::getInstance()->query($sql);
}

function getMemberLevelInfo($id){
	
	if(is_numeric($id)){
		
		$sql = "select * from shop_member_level where level_id=".$id;
		
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 更新会员常用地址
 * @param unknown $member_id 会员ID
 * @param unknown $id 地址记录ID
 * @return number
 */
function updateUseMemberAddress($member_id,$id){
	
	if(is_numeric($member_id) && is_numeric($id)){
		$sql_array = array();
		
		$sql_array[0] = "update shop_member_address set a_use=0 where member_id=".$member_id;
	
		$sql_array[1] = "update shop_member_address set a_use='1' where a_id=".$id;
		
		return SQLHelper::getInstance()->executeTrance($sql_array);
	}
	return 0;
}
/**
 * 取消默认地址
 * @param unknown $member_id 会员ID
 * @param unknown $id 地址记录ID
 * @return number
 */
function updateUseMemberAddressOff($id){
	
	$sql = "update shop_member_address set a_use='0' where a_id=".$id;
		
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 删除常用地址
 */
function deleteMemberAddress($id){
	
	$sql = "delete from shop_member_address where a_id=".$id;
	
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 获取会员常用地址
 * @param unknown $member_id
 * @return multitype:multitype:
 */
function getMemberAddressList($member_id){
	
	if(is_numeric($member_id)){
		$sql = "select * from shop_member_address where member_id='$member_id' order by a_id desc limit 5";
	
		return SQLHelper::getInstance()->query($sql);	
	}
	
	return null;
}
/**
 * 获取会员所有地址
 * @param unknown $member_id
 * @return multitype:multitype:
 * @author 沈家盛
 */
function getMemberAddressListAll($member_id){
	
	if(is_numeric($member_id)){
		$sql = "select * from shop_member_address where member_id='$member_id' order by a_id desc";
	
		return SQLHelper::getInstance()->query($sql);	
	}
	
	return null;
}
/**
 * 获取会员默认地址
 * @param unknown $member_id
 * @return multitype:multitype:
 * @author 沈家盛
 */
function getMemberAddress($member_id='0'){
	
	if(is_numeric($member_id)){
		$sql = "select a_id,a_name,a_phone,a_tel,a_address,a_mark from shop_member_address where member_id='$member_id' and a_use=1";
	
		return SQLHelper::getInstance()->queryForMap($sql);	
	}
	
	return null;
}

/**
 * 添加关注产品
 * @param $item
 */
function createMemberFocus($item){
	$sql = "insert into shop_member_focus(member_id,product_id,focus_time) values('".$item['member_id']."','".$item['product_id']."',now())";
		
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 取消关注产品
 * @param unknown $item
 * @return number
 */
function cancelMemberFocus($item){
	
	$sql = "delete from shop_member_focus where product_id=".$item['product_id']." and member_id=".$item['member_id'];
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 获取会员关注商品信息
 * @param unknown $id 会员ID
 */
function getMemberFocusList($member_id,$groupId,$page){
	if(is_numeric($member_id)){
		$sql = "SELECT product_pack,product_name,p.product_id,product_pic,";
			//企业价格
			if($groupId==3){
				$sql = $sql."product_vip product_price,";
			}
			//高级会员
			else if($groupId==2){
				$sql = $sql."product_price1 product_price,";
			} 
			//普通会员
			else if($groupId==1){
				$sql = $sql."product_price2 product_price,";
			}
			//游客
			else{
				$sql = $sql."product_price2 product_price,";
			}
			$sql = $sql."product_title from shop_member_focus f left join shop_product p on f.product_id=p.product_id where member_id=".$member_id."  ORDER BY focus_id desc ".getPage($page);

		return SQLHelper::getInstance()->query($sql);	
	}
	
	return null;
}


/**
 * 添加会员分组
 * @param $item
 */
function createMemberGroup($member){
	
	$sql = "insert into shop_member_group(group_name,group_describe,group_authority) values(?,?,?)";

	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('sss', $member['group_name'], $member['group_describe'],$member['group_authority']);

    $stmt->execute();
    
    return $stmt->insert_id;
}

/**
 * 编辑会员分组
 * @param $item
 */
function updateMemberGroup($member){
	
	$sql = "update shop_member_group set group_name=?,group_describe=?,group_authority=? where group_id=?";
								    	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('ssi',$member['group_name'], $member['group_describe'], $member['group_authority'], $member['group_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 获取会员分组列表
 */
function getMemberGroupList(){
	
	$sql = "select g.*,(select count(*) from shop_member m where m.group_id=g.group_id) as count from shop_member_group g order by g.group_id";
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取会员分组信息
 * @param $id
 */
function getMemberGroupInfo($id){
	
	if(is_numeric($id)){
		
		$sql = "select * from shop_member_group where group_id=".$id;
		
		return SQLHelper::getInstance()->query($sql);
	}
	
	return null;
}

/**
 * 获取会员优惠等级
 * @param $id
 */
function getMemberGroupId($member_id){
		
	$sql =  "select group_authority from shop_member m left join shop_member_group g  on m.group_id = g.group_id where m.member_id=".$member_id;
	
	return SQLHelper::getInstance()->queryForMap($sql);
}
/**
 * 获取会员等级信息
 * @param $id
 * @author 沈家盛
 */
function getMemberLevelInfo2($member_id){
	
	if(is_numeric($member_id)){
		$sql = "select l.level_name,l.level_logo from shop_member m left join shop_member_level l on m.level_id=l.level_id where member_id=".$member_id;
	
		return SQLHelper::getInstance()->queryForMap($sql);	
	}
	return null;
}
/**
 * 更新昵称
 * @param unknown $member_id 会员ID
 * @param unknown $member_name 昵称
 * @return number
 */
function updateMemberName($member_id,$member_name){
	
	$sql = "UPDATE shop_member SET member_name='".$member_name."' where member_id=".$member_id;
	return SQLHelper::getInstance()->execute($sql);
}
/**
 * 更新性别
 * @param unknown $member_id 会员ID
 * @param unknown $member_name 昵称
 * @return number
 */
function updateMemberSex($member_id,$member_sex){
	
	$sql = "UPDATE shop_member SET member_sex=".$member_sex." where member_id=".$member_id;
		
	return SQLHelper::getInstance()->execute($sql);
}
/**
 * 更新生日
 * @param unknown $member_id 会员ID
 * @param unknown $member_name 昵称
 * @return number
 */
function updateMemberBirthday($member_id,$member_birthday){
	
	$sql = "UPDATE shop_member SET member_birthday='".$member_birthday."' where member_id=".$member_id;
		
	return SQLHelper::getInstance()->execute($sql);
}
/**
 * 申请企业用户
 * @param unknown $member['enterprise_phone'] 企业联系电话
 * @param unknown $member['enterprise_name'] 企业名称
 * @param unknown $member['member_id'] 用户id
 * @return number
 */
function updatEnterprise($member){
	
	$sql = "UPDATE shop_member SET enterprise_phone='".$member['enterprise_phone']."',enterprise_name='".$member['enterprise_name']."' where member_id=".$member['member_id'];
	return SQLHelper::getInstance()->execute($sql);
}

?>