<?php
session_start();
require_once('plugins.php');


//用户注册
if("register"==$_REQUEST['act']){

	//验证码
	$_checknum = $_REQUEST["verifycode"];
	$check=0;
	//注册方式1：邮箱登录，2:手机登录
	$method=0;
    if(preg_match("/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/",$_POST["register_name"])){
        $check=checkMember($_POST["register_name"]);
        if($check==0){
        	$member = array('member_login'=>$_POST["register_name"],'member_email'=>$_POST["register_name"],'member_password'=>md5($_REQUEST['password']));
        	$method=1;
        }
    }
    else if(preg_match("/^((\(\d{2,3}\))|(\d{3}\-))?1\d{10}$/",$_POST["register_name"])){
        $check=checkMember($_POST["register_name"]);
        if($check==0){
            $member = array('member_login'=>$_POST["register_name"],'member_phone'=>$_POST["register_name"],'member_password'=>md5($_REQUEST['password']));
            $method=2;
        }
    }
    
//    echo $check;
	
	if($check>0){
		echo '<script>';
		echo "alert('该用户已经存在，请重新注册！');";
		echo "window.location='register.html';";
		echo '</script>';
	}
	else if($_SESSION['REGISTER_VCODE']==$_checknum){
		if($method!=0){
			saveMember($member);

		    //$ret = loginMember($member['member_login'],$member['member_password']);
		    $ret = loginMember($_POST["register_name"],$member['member_password'],$method);
		    
		    if(!empty($ret)){
			    foreach($ret as $map){
				    $_SESSION["_shop_login_id"]= $map['member_id'];
				    $_SESSION["_shop_login_name"]= $map['member_login'];
				    $_SESSION["_shop_login_username"]= $map['member_name'];
			}			
			echo '<script>';
			echo "window.location='index.html';";
			echo '</script>';
			return;
		    }
		}
	}
	echo '<script>';
    echo "alert('注册失败，请重新注册！');";
	//echo "window.location='register.html';";
	echo '</script>';
    return;
}
//用户登陆
else if("login"==$_REQUEST['act']){
	
	$member = array('member_login'=>$_REQUEST['login_name'],
					'member_password'=>md5($_REQUEST['password']));
	
	//验证码
	$_checknum = $_REQUEST["verifycode"]; 
	
	if($_SESSION['REGISTER_VCODE']==$_checknum){
		
		$ret = loginMember($member['member_login'],$member['member_password']);

		if(!empty($ret)){
			foreach($ret as $map){
				$_SESSION["_shop_login_id"]= $map['member_id'];
				$_SESSION["_shop_login_name"]= $map['member_login'];
				$_SESSION["_shop_login_username"]= $map['member_name'];
			}			
			echo '<script>';
			echo "window.location='index.html';";
			echo '</script>';
			return;
		} 
	}
	echo '<script>';
	echo "alert('登陆失败，请重试！');";
	echo "window.location='login.html';";
	echo '</script>';
	return;
}
//立刻购买
else if("buy"==$_REQUEST['act']){
	
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		//用户ID
		$_userid = $_SESSION["_shop_login_id"];
		//产品ID
		$_id = $_REQUEST['session_id'];
		
		if(strpos($_id,'_')>0){
			$_id = substr($_id,strpos($_id,'_')+1,strlen($_id));
		}
		
		$cart = array('member_id'=>$_userid,
					  'product_id'=>$_id,
					  'type_id'=>0,
		              'type_id'=>empty($_REQUEST['tid'])?'0':$_REQUEST['tid'],
					  'cart_acount'=>empty($_REQUEST['acount'])?'1':$_REQUEST['acount'],
					  'is_taocan'=>empty($_REQUEST['is_taocan'])?'0':$_REQUEST['is_taocan']);
		               

		//加入购物车
		addCart($cart);
		
		echo '<script>';
		echo "window.location='mycart.html';";
		echo '</script>';
	}
	return;
}
//立刻购买水果博士
else if("buydr"==$_REQUEST['act']){
	
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		if(!empty($_REQUEST['item'])){
			$_ids = explode(',',$_REQUEST['item']);
			
			//用户ID
			$_userid = $_SESSION["_shop_login_id"];
			
			foreach($_ids as $_id){
				
				$cart = array('member_id'=>$_userid,
							  'product_id'=>$_id,
							  'type_id'=>0,
							  'cart_acount'=>1,
							  'is_taocan'=>0);
		
				//加入购物车
				$ret=addCart($cart);

			}
		}
		
		
		echo '<script>';
		echo "window.location='cart1.html';";
		echo '</script>';
	}
	return;
}
//加入购物车
else if("addcart"==$_REQUEST['act']){
	
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		//用户ID
		$_userid = $_SESSION["_shop_login_id"];
		//产品ID
		$_id = $_REQUEST['session_id'];
		
		if(strpos($_id,'_')>0){
			$_id = substr($_id,strpos($_id,'_')+1,strlen($_id));
		}
		$cart = array('member_id'=>$_userid,
					  'product_id'=>$_id,
					  'type_id'=>empty($_REQUEST['tid'])?'0':$_REQUEST['tid'],
					  'cart_acount'=>empty($_REQUEST['acount'])?'1':$_REQUEST['acount'],
					  'is_taocan'=>empty($_REQUEST['is_taocan'])?'0':$_REQUEST['is_taocan']);

		//加入购物车
		addCart($cart);
		
		echo '<script>';
		echo "alert('添加成功！');";
		echo "window.history.back(-1);";
		echo '</script>';
	}
	return;
}
//清除购物车
else if("delitem"==$_REQUEST['act']){
	
	//购物车ID
	$_id = $_REQUEST['session_id'];
	
	if(strpos($_id,'_')>0){
		$_id = substr($_id,strpos($_id,'_')+1,strlen($_id));
	}
	
	$ret = deleteCartItem($_id);
	
	echo '<script>';
	//echo "alert('删除成功！');";
	echo "window.location='mycart.html';";
	echo '</script>';
}
//购物车批量删除
else if("delitemlist"==$_REQUEST['act']){
	
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		//用户ID
	    if($_REQUEST["cartlist"]){
	    	$cartids=implode(",",$_REQUEST["cartlist"]);
	        deleteCartItems($cartids);
	    }
	
	    echo '<script>';
	    //echo "alert('删除成功！');";
	    echo "window.location='mycart.html';";
	    echo '</script>';
	}
	return;
}

//清空购物车
else if("cleancart"==$_REQUEST['act']){
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		//用户ID
		$_userid = $_SESSION["_shop_login_id"];
		
		$ret = cleanCart($_userid);
		
		echo '<script>';
		//echo "alert('清空成功！');";
		echo "window.location='mycart.html';";
		echo '</script>';
	}
	return;
}
//更新会员信息
else if("updatemember"==$_REQUEST['act']){
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		//用户ID
		$_userid = $_SESSION["_shop_login_id"];
		
		$member = array('member_name'=>$_REQUEST['member_name'],
					   'member_email'=>$_REQUEST['member_email'],
					   'member_tel'=>$_REQUEST['member_tel'],
					   'member_phone'=>$_REQUEST['member_phone'],
					   'member_zip'=>$_REQUEST['member_zip'],
					   'member_address'=>$_REQUEST['member_address'],
					   'member_birthday'=>$_REQUEST['member_birthday'],
					   'member_sex'=>empty($_REQUEST['member_sex'])?'0':$_REQUEST['member_sex'],
					   'member_year'=>empty($_REQUEST['member_year'])?'2013':$_REQUEST['member_year'],
					   'member_month'=>empty($_REQUEST['member_month'])?'01':$_REQUEST['member_month'],
					   'member_day'=>empty($_REQUEST['member_day'])?'01':$_REQUEST['member_day'],
					   'member_realname'=>$_REQUEST['member_realname'],
					   'member_city'=>$_REQUEST['member_city'],
					   'member_qq'=>$_REQUEST['member_qq'],
					   'member_wang'=>$_REQUEST['member_wang'],
					   'member_weixin'=>$_REQUEST['member_weixin'],
					   'member_weibo'=>$_REQUEST['member_weibo'],
					   'member_job'=>$_REQUEST['member_job'],
					   'member_id'=>$_userid); 
		
		$ret = updateMember($member);
		
		echo '<script>';
		echo "alert('更新成功！');";
		echo "window.location='member_basic.html';";
		echo '</script>';
	}
	return;
}
//更新会员密码
else if("updatepassword"==$_REQUEST['act']){
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		//用户ID
		$_userid = $_SESSION["_shop_login_id"];
		
		$_old = md5($_REQUEST['old_password']);
		$_new = md5($_REQUEST['new_password']);
		
		$ret = updatePassword($_userid,$_old,$_new);
		
		if($ret==1){
			echo '<script>';
			echo "alert('更新成功！');";
			echo "window.location='member_password.html';";
			echo '</script>';	
		}else{
			echo '<script>';
			echo "alert('更新失败！');";
			echo "window.location='member_password.html';";
			echo '</script>';
		}
		
	}
	return;
}
//添加会员常用地址
else if("createMemberAddress"==$_REQUEST['act']){
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
// 		echo '1';
		//地址信息
		$item = array('member_id'=>$_SESSION["_shop_login_id"],
					   'a_name'=>$_REQUEST['a_name'],
					   'a_phone'=>$_REQUEST['a_phone'],
					   'a_tel'=>$_REQUEST['a_tel'],
					   'a_address'=>$_REQUEST['a_address'],
					   'a_mark'=>$_REQUEST['a_mark']); 
// 		echo $_REQUEST['a_name']
		$ret = createMemberAddress($item);
		
		if($ret==1){
			echo '<script>';
			echo "alert('添加成功！');";
			echo "window.location='member_address.html';";
			echo '</script>';	
		}else{
			echo '<script>';
			echo "alert('添加失败！');";
			echo "window.location='member_address.html';";
			echo '</script>';
		}
		
	}
	return;
}
//编辑会员常用地址
else if("updateMemberAddress"==$_REQUEST['act']){
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		//地址信息
		$item = array('a_id'=>$_REQUEST['a_id'],
					   'member_id'=>$_SESSION["_shop_login_id"],
					   'a_name'=>$_REQUEST['a_name'],
					   'a_phone'=>$_REQUEST['a_phone'],
					   'a_tel'=>$_REQUEST['a_tel'],
					   'a_address'=>$_REQUEST['a_address'],
					   'a_mark'=>$_REQUEST['a_mark']); 
		
		$ret = updateMemberAddress($item);
		
		if($ret==1){
			echo '<script>';
			echo "alert('修改成功！');";
			echo "window.location='member_address.html';";
			echo '</script>';	
		}else{
			echo '<script>';
			echo "alert('修改失败！');";
			echo "window.location='member_address.html';";
			echo '</script>';
		}
		
	}
	return;
}
//添加会员关注
else if("createMemberFocus"==$_REQUEST['act']){
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		//地址信息
		$item = array('member_id'=>$_SESSION["_shop_login_id"],
					  'product_id'=>$_REQUEST['id']);

		$ret = createMemberFocus($item);

		if($ret==1){
			echo '<script>';
			echo "alert('关注成功！');";
			echo "window.close();";
			echo '</script>';
		}else{
			echo '<script>';
			echo "alert('关注失败！');";
			echo "window.close();";
			echo '</script>';
		}

	}
	return;
}
//取消会员产品关注
else if("cancelMemberFocus"==$_REQUEST['act']){
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		//地址信息
		$item = array('focus_id'=>$_REQUEST['focus_id'],
				'member_id'=>$_SESSION["_shop_login_id"]);

		$ret = cancelMemberFocus($item);

		if($ret==1){
			echo '<script>';
			echo "window.location='member_focus.html';";
			echo '</script>';
		}else{
			echo '<script>';
			echo "window.location='member_focus.html';";
			echo '</script>';
		}

	}
	return;
}
//确认订单
else if("doenter"==$_REQUEST['act']){
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}
	else if(!empty($_REQUEST["cartlist"])){
		   
		/*$cartlist = $_REQUEST['cart_list'];
		if($cartlist==''){
             echo '<script>';
		     echo "alert('您的购物车还没有商品！快去购物吧');";
		     echo "window.location='index.html';";
		     echo '</script>';
		}
		$ary = explode(",",$cartlist);*/
		$sql_array = array();
		$ary=$_REQUEST["cartlist"];
		
		$_SESSION["_order_temp"]=implode(",",$ary);
		
		foreach($ary as $cart){
			$acount =  empty($_REQUEST['num_'.$cart])?1:$_REQUEST['num_'.$cart];
			
			$sql_array[$cart] = "update shop_cart set cart_acount=".$acount." where cart_id=".$cart;
		}
		
		updateCartBatch($sql_array);
		
		echo '<script>';
		echo "window.location='mycart2.html';";
		echo '</script>';
	}
	return;
}
//确认购买
else if("dobuy"==$_REQUEST['act']){
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		//嘉兴水果网更新购物车内容
		$sql_array = array();
		$ary=$_REQUEST["cart_list"];
		
		if(empty($ary)){
			return;
		}
		
		$cart_ary = explode(',',$ary);
		
		$_SESSION["_order_temp"]=$ary;
		 
		foreach($cart_ary as $cart){
			$acount =  empty($_REQUEST['num_'.$cart])?1:$_REQUEST['num_'.$cart];
			
			$sql_array[$cart] = "update shop_cart set cart_acount=".$acount." where cart_id=".$cart;
			
			//echo $sql_array[$cart].'<br>';
		}
		
		updateCartBatch($sql_array);
		
		//1.购物车内容
		$list = getOrderTemp($_SESSION["_shop_login_id"],$_SESSION["_order_temp"]);
		
		if(!empty($list)){
			$product_list = '';
			$price = 0;
			foreach($list as $cart){
				if($product_list==''){
					$product_list = $cart['product_id'];
				}else{
					$product_list = $product_list.','.$cart['product_id'];
				}
				$price = $price+((empty($cart['type_price'])?$cart['product_price1']:$cart['type_price'])*$cart['cart_acount']);
			}
			//$smarty->assign("total",$price);
			//$smarty->assign("product_list",$product_list);
			
			//2.保存订单记录
		
			$order_code = getTimeSort();
			
			//订单详细内容
			$order = array('order_code'=>$order_code, //订单编号
						   'order_state'=>'0', //订单状态
						   'member_id'=>$_SESSION["_shop_login_id"], //会员ID
						   'get_name'=>$_REQUEST['get_name'], //会员姓名
						   'get_address'=>$_REQUEST['get_address'], //收件地址
						   'get_tel'=>$_REQUEST['get_tel'], //联系电话
						   'get_phone'=>$_REQUEST['get_phone'], //手机号码
			               'get_time'=>'',//送货时间
			               'pay_type'=>'',
						   'order_price'=>$price);
			
			
			//购买产品保存
			$sql_array = array();
			
			if(!empty($list)){
				$i=0;
				foreach($list as $cart){
					$sql_array[$i] = "insert into shop_order_info
									(order_code,product_id,product_acount,product_price1,product_price2,type_id,is_taocan) 
									values('".$order_code."','".$cart['product_id']."','".$cart['cart_acount']."',
									'".(empty($cart['type_price'])?$cart['product_price1']:$cart['type_price'])."','0',".$cart['type_id'].",'".$cart['is_taocan']."')";
					
					//echo $sql_array[$i].'<br>';
					$i++;
				}
			}
			
			$ret = createOrder($order,$sql_array);
		}
		
		if($ret>0){
	        deleteCartItems($_SESSION["_order_temp"]);
			//$orderId=getOrderID($order_code);
			echo '<script>';
			echo "window.location='myorder_".$order_code.".html';";
			echo '</script>';	
		}
		
	}
	return;
}
else if("orderCancel"==$_REQUEST['act']){
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		//echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		$_userid = $_SESSION["_shop_login_id"];
		$_orderid=$_REQUEST["order_id"];
		$result=deleteOrder($_userid,$_orderid);
		if(1==$result){	
	        echo '<script>';
		    echo "alert('删除成功！');";
		    echo "window.location='member_order_list_1.html';";
		    echo '</script>';
		}
		elseif(2==$result){
			 echo '<script>';
		     echo "alert('该订单已支付或已在配送中！如需取消订单，请联系客服，谢谢！');";
		     echo "window.location='member_order_info_".$_orderid.".html';";
		     echo '</script>';
		}
		else{
		     echo '<script>';
		     echo "alert('删除失败！');";
		     echo "window.location='member_order_info_".$_orderid.".html';";
		     echo '</script>';
		}
	}
	return;
}
?>