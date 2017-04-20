<?php 
/**
 * 网站基本信息维护
 * Version: 1.0
 * Author: sunwei
 * Date: 2013-06-15
 */


/**
 * 检测企业基础信息表是否已经初始化
 */
function haveResult(){
	$sql = "select count(*) from t_basicinfo";
	
	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 企业基础信息表初始化
 * @param $b_www 网址
 */
function basicinit($b_www){
	$sql = "INSERT INTO t_basicinfo(b_www) values('$b_www')";
	
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 更新企业网址基础信息--------------------废弃
 * @param $b_www 域名
 * @param $b_website 中文网站名称
 * @param $b_title 中文网站标题
 * @param $b_keyword 中文网站关键字
 * @param $b_describe 中文网站描述
 * @param $b_website2 英文网站名称2
 * @param $b_title2 英文网站标题2
 * @param $b_keyword2 英文网站关键字2
 * @param $b_describe2 英文网站描述2
 * @param $b_admin 管理员邮箱	
 * @param $b_number 备案号
 */
function updateBasic1($b_www='',$b_website='',$b_title='',$b_keyword='',$b_describe='',
								$b_website2='',$b_title2='',$b_keyword2='',$b_describe2='',
								$b_admin='',$b_number=''){

	 $sql = "UPDATE t_basicinfo SET b_www='$b_www',b_website='$b_website',b_title='$b_title',b_keyword='$b_keyword',
 			 b_describe='$b_describe',b_website2='$b_website2',b_title2='$b_title2',b_keyword2='$b_keyword2',
 			 b_describe2='$b_describe2',b_admin='$b_admin',b_number='$b_number' WHERE b_id=1";
								
	 return SQLHelper::getInstance()->execute($sql);
}

/**
 * 更新企业基础信息--------------------废弃
 * @param $b_company 公司名称
 * @param $b_address 联系地址
 * @param $b_tel 联系电话
 * @param $b_fox 传真
 * @param $b_code 邮政编码
 * @param $b_email EMAIL地址
 * @param $b_info 公司简介
 * @param $b_info2 企业文化
 * @param $b_logo 网站LOGO
 * @param $b_map 地理信息截图
 */
function updateBasic2($b_company='',$b_address='',$b_tel='',$b_fox='',$b_code='',$b_email='',
						$b_info='',$b_info2='',$b_logo='',$b_map=''){
	$sql = "UPDATE t_basicinfo SET b_company='$b_company',b_address='$b_address',b_tel='$b_tel',
			b_fox='$b_fox',b_code='$b_code',b_email='$b_email',b_info='$b_info',b_info2='$b_info2',
			b_logo='$b_logo',b_map='$b_map' WHERE b_id=1";
								
	 return SQLHelper::getInstance()->execute($sql);
}

/**
 * 最新版更新网站基础信息
 * @param $basic
 */
function updateBasic($basic){
	
	$count = haveResult();
	
	if(count==0){
		basicinit('');
	}
	
	$sql = "update t_basicinfo set b_www=?,b_website=?,b_title=?,b_keyword=?,b_describe=?,b_admin=?,b_number=?,b_company=?,b_address=?,b_tel=?,b_fox=?,b_code=?,b_email=?,b_info=?,b_logo=? where b_id=1";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('sssssssssssssss', $basic['b_www'],$basic['b_website'],$basic['b_title'],
										$basic['b_keyword'],$basic['b_describe'],$basic['b_admin'],
										$basic['b_number'],$basic['b_company'],$basic['b_address'],
										$basic['b_tel'],$basic['b_fox'],$basic['b_code'],
										$basic['b_email'],$basic['b_info'],$basic['b_logo']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}


/**
 * 获取企业与站点基本信息
 */
function getBasic(){
	$sql = "select * from t_basicinfo where b_id=1";
	
	return SQLHelper::getInstance()->query($sql);
}
?>