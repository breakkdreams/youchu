<?php
/**
 * 会员接口
 * member_login			账号
 * member_password		密码
 */
require('../plugins.php');

$cmd = myPOST('cmd');




//会员注册
if('register'==$cmd){
	//返回值
	$flag = array();
	$return = array();
	
	//参数
	$member = array();
	
	//设置参数
	$member['member_login'] = myPOST('member_login');
  	$member['member_password']= myPOST('member_password');
	//判断参数是否存在
	if(empty($member['member_login'])||
	   empty($member['member_password'])){
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}
	

	
	//判断用户是否存在，存在返回
	if(checkMember($member['member_login'])>0){
		//返回
		$flag['flag']=0;
		$flag['msg']='用户已存在';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}else{
		//创建用户
		$id = saveMember($member);
		$return['info'] = getMemberInfo($id);
		
		//返回
		$flag['flag']=1;
		$flag['msg']='注册成功';
		$flag['data']=$return;
		echo json_encode($flag);
	}
}
//会员登录
else if('login'==$cmd){
	//返回值
	$flag = array();
	$return = array();
	//设置参数
	$loginname = myPOST('member_login');
	$password = myPOST('member_password');
	
	//判断参数是否存在
	if(empty($loginname)||
	   empty($password)){
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}
	
	//判断用户是否存在，不存在返回
	if(checkMember($loginname)<1){
		//返回
		$flag['flag']=-2;
		$flag['msg']='该用户不存在';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}else{
		//根据用户名和密码获取用户信息
		$return['info'] = loginMember($loginname,$password);
		
		//如果存在返回用户信息,否则返回
		if(!empty($return['info'])){
			//返回
			$flag['flag']=1;
			$flag['msg']='登录成功';
			$flag['data']=$return;
			echo json_encode($flag);	
			return;	
		}else{
			//返回
			$flag['flag']=0;
			$flag['msg']='密码错误';
			$flag['data']='';
			echo json_encode($flag);
			return;
		}
	}
}
//个人中心
else if('info'==$cmd){
	//返回值
	$flag = array();
	$return = array();
	//用户信息
	$id = myPOST('member_id');
	if(is_numeric($id)&&$id>0){
		$return['info'] = getMemberInfo($id);
	
		//如果存在返回用户信息,否则返回
		if(!empty($return['info'])){
			//返回
			$flag['flag']=1;
			$flag['msg']='获取成功';
			$flag['data']=$return;
			echo json_encode($flag);	
			return;	
		}else{
			//返回
			$flag['flag']=0;
			$flag['msg']='账号异常';
			$flag['data']='';
			echo json_encode($flag);
			return;
		}
	}else{
		//返回
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']='';
		echo json_encode($flag);
	}
}

//更新用户信息
else if('updateInfo'==$cmd){
	//返回值
	$flag = array();
	$member = array();
	$member['member_name']=myPOST('member_name');
	$member['member_email']=myPOST('member_email');
	$member['member_tel']=myPOST('member_tel');
	$member['member_phone']=myPOST('member_phone');
	$member['member_zip']=myPOST('member_zip');
	$member['member_address']=myPOST('member_address');
	$member['member_sex']=myPOST('member_sex');
	$member['member_birthday']=myPOST('member_birthday');
	$member['member_realname']=myPOST('member_realname');
	$member['member_city']=myPOST('member_city');
	$member['member_qq']=myPOST('member_qq');
	$member['member_wang']=myPOST('member_wang');
	$member['member_weixin']=myPOST('member_weixin');
	$member['member_weibo']=myPOST('member_weibo');
	$member['member_job']=myPOST('member_job');
	$member['member_photo']=myPOST('member_photo');
	$member['member_id']=myPOST('member_id');
	//用户信息
	$id = myPOST('member_id');
	if(is_numeric($id)&&$id>0){
		$info = updateMember($member);
		echo $info.'<br />';
		//如果存在返回用户信息,否则返回
		if(is_numeric($info)&&$info>0){
			//返回
			$flag['flag']=1;
			$flag['msg']='更新成功';
			$flag['data']='';
			echo json_encode($flag);
			return;		
		}else{
			//返回
			$flag['flag']=0;
			$flag['msg']='更新失败';
			$flag['data']='';
			echo json_encode($flag);
			return;
		}
	}else{
		//返回
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}
}
//更新用户密码
else if('updatePassword'==$cmd){
	//返回值
	$flag = array();
	$member = array();
	$member['id']=myPOST('member_id');
	$member['old']=myPOST('member_password_old');
	$member['new']=myPOST('member_password_new');
	//判断参数是否正常
	if(!is_numeric($member['id'])||$member['id']<1||empty($member['old'])||empty($member['new'])){
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}
	//判断原密码是否正常
	$info = isMemberByIdAndPassword($member['id'],$member['old']);
	if(empty($info)){
		//返回
		$flag['flag']=-2;
		$flag['msg']='原密码错误';
		$flag['data']='';
		echo json_encode($flag);
		return ;
	}
	//更新密码
	$info = updatePassword($member['id'],$member['old'],$member['new']);
	//如果存在返回用户信息,否则返回
	if(is_numeric($info)&&$info>0){
		//返回
		$flag['flag']=1;
		$flag['msg']='更新成功';
		$flag['data']='';
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='更新失败';
		$flag['data']='';
		echo json_encode($flag);
	}

}
//忘记密码
else if('forgetPassword'==$cmd){
	//返回值
	$flag = array();
	//参数
	$member_login = myPOST('member_login');
	$member_password = myPOST('member_password');
	
	//判断参数是否正常
	if(empty($member_login)||empty($member_password)){
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}
	//更新密码
	$info = updatePassword2($member_login,$member_password);
	//如果存在返回用户信息,否则返回
	if(is_numeric($info)&&$info>0){
		//返回
		$flag['flag']=1;
		$flag['msg']='更新成功';
		$flag['data']='';
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='更新失败';
		$flag['data']='';
		echo json_encode($flag);
	}

}
//等级信息
else if('memberLevel'==$cmd){
	//返回值
	$flag = array();
	$return = array();
	//参数
	$member_id = myPOST('member_id');
	
	//判断参数是否正常
	if(!is_numeric($member_id)||$member_id<1){
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}
	//获取会员信息
	$return['info'] = getMemberLevelInfo2($member_id);
	$return['count'] = getOrderCount2($member_id);
	$return['total'] = getOrderTotal($member_id);
	if(empty($return['total'])){
		$return['total']=0;
	}
	//如果存在返回用户信息,否则返回
	if(!empty($return['info'])){
		//返回
		$flag['flag']=1;
		$flag['msg']='获取成功';
		$flag['data']=$return;
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='获取失败';
		$flag['data']='';
		echo json_encode($flag);
	}

}
//更新头像
//更新昵称
else if('updateName'==$cmd){
	//返回值
	$flag = array();
	$return = array();
	//参数
	$member_name = myPOST('member_name');
	$member_id = myPOST('member_id');
	
	//判断参数是否正常
	if(empty($member_name)||!is_numeric($member_id)||$member_id<1){
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}
	//更新昵称
	$name =  updateMemberName($member_id,$member_name);
	//用户信息
	$return['info'] = getMemberInfo($member_id);
	//返回
	if(is_numeric($name)&&$name>0){
		//返回
		$flag['flag']=1;
		$flag['msg']='更新成功';
		$flag['data']=$return;
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='更新失败';
		$flag['data']='';
		echo json_encode($flag);
	}

}
//更新性别
else if('updateSex'==$cmd){
	//返回值
	$flag = array();
	$return = array();
	//参数
	$member_sex = myPOST('member_sex');
	$member_id = myPOST('member_id');
	
	//判断参数是否正常
	if(!is_numeric($member_sex)||!is_numeric($member_id)||$member_id<1){
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}
	//更新性别
	$sex =  updateMemberSex($member_id,$member_sex);
	//用户信息
	$return['info'] = getMemberInfo($member_id);
	//返回
	if(is_numeric($sex)&&$sex>0){
		//返回
		$flag['flag']=1;
		$flag['msg']='更新成功';
		$flag['data']=$return;
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='更新失败';
		$flag['data']='';
		echo json_encode($flag);
	}
}
//更新生日
else if('updateBirthday'==$cmd){
	//返回值
	$flag = array();
	$return = array();
	//参数
	$member_birthday = myPOST('member_birthday');
	$member_id = myPOST('member_id');
	
	//判断参数是否正常
	if(empty($member_birthday)||!is_numeric($member_id)||$member_id<1){
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}
	//更新生日
	$birthday =  updateMemberBirthday($member_id,$member_birthday);
	//用户信息
	$return['info'] = getMemberInfo($member_id);
	//返回
	if(is_numeric($birthday)&&$birthday>0){
		//返回
		$flag['flag']=1;
		$flag['msg']='更新成功';
		$flag['data']=$return;
		echo json_encode($flag);		
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='更新失败';
		$flag['data']='';
		echo json_encode($flag);
	}
}
//申请企业用户
else if('applicationEnterpriseUsers'==$cmd){
	//返回值
	$flag = array();
	$return = array();
	//参数
	$member = array();
	$member['enterprise_phone'] = myPOST('enterprise_phone');
	$member['enterprise_name'] = myPOST('enterprise_name');
	$member['member_id'] = myPOST('member_id');
	//判断参数是否正常
	if(empty($member['enterprise_phone'])||empty($member['enterprise_name'])||!is_numeric($member['member_id'])||$member['member_id']<1){
		$flag['flag']=-1;
		$flag['msg']='参数错误';
		$flag['data']='';
		echo json_encode($flag);
		return;
	}
	//申请企业用户
	$birthday = updatEnterprise($member);
	//返回
	if(is_numeric($birthday)&&$birthday>0){
		//返回
		$flag['flag']=1;
		$flag['msg']='正在申请';
		$flag['data']='';
		echo json_encode($flag);
	}else{
		//返回
		$flag['flag']=0;
		$flag['msg']='申请失败';
		$flag['data']='';
		echo json_encode($flag);
	}
}
?>