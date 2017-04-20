<?php 
	session_start();
	/**
	 * 订单确认
	 */
	require('../plugins.php');
	
	
	if(empty($_SESSION["_shop_login_id"])){
		echo '<script>';
		echo "alert('请先登陆！');";
		echo "window.location='login.html';";
		echo '</script>';
	}else{
		$smarty = new Smarty;
	
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'订单确认');
	
		require('require_type.php');
		require('../_session.php');

	$myinfo = getMemberInfo($_SESSION["_shop_login_id"]);

	if(!empty($myinfo)){
			
			
			foreach($myinfo as $map){
				
			}
			$smarty->assign("myinfo",$map);
            $order_info = getOrderInfo($map['member_id'],$_REQUEST['id']);	
			$smarty->assign("order_id",$_REQUEST['id']);
			   $smarty->assign("pay_type",$order_info[0]["pay_type"]);
			if(!empty($order_info)){
				foreach($order_info as $_order){
					$smarty->assign("order",$_order);
				}
			if(0==$order_info[0]["pay_type"]){
				
				$smarty->assign("orderlist",$order_info);	
				
				//人民币网关账号，该账号为11位人民币网关商户编号+01,该参数必填。
				$merchantAcctId = "1002322288801";
				$smarty->assign('merchantAcctId',$merchantAcctId);
				
				//编码方式，1代表 UTF-8; 2 代表 GBK; 3代表 GB2312 默认为1,该参数必填。
				$inputCharset = "1";
				$smarty->assign('inputCharset',$inputCharset);
				
				//接收支付结果的页面地址，该参数一般置为空即可。
				$pageUrl = "";
				$smarty->assign('pageUrl',$pageUrl);
				
				//服务器接收支付结果的后台地址，该参数务必填写，不能为空。
				$bgUrl = "http://www.0573dl.com/recieve.php";
				$smarty->assign('bgUrl',$bgUrl);
				
				//网关版本，固定值：v2.0,该参数必填。
				$version =  "v2.0";
				$smarty->assign('version',$version);
				
				//语言种类，1代表中文显示，2代表英文显示。默认为1,该参数必填。
				$language =  "1";
				$smarty->assign('language',$language);
				
				//签名类型,该值为4，代表PKI加密方式,该参数必填。
				$signType =  "4";
				$smarty->assign('signType',$signType);
				
				//支付人姓名,可以为空。
				$payerName= "";
				$smarty->assign('payerName',$payerName);
				 
				//支付人联系类型，1 代表电子邮件方式；2 代表手机联系方式。可以为空。
				$payerContactType =  "1";
				$smarty->assign('payerContactType',$payerContactType);
				
				//支付人联系方式，与payerContactType设置对应，payerContactType为1，则填写邮箱地址；payerContactType为2，则填写手机号码。可以为空。
				$payerContact =  "39980128@qq.com";
				$smarty->assign('payerContact',$payerContact);
				
				//商户订单号，以下采用时间来定义订单号，商户可以根据自己订单号的定义规则来定义该值，不能为空。
				$orderId = $order_info[0]['order_code'];
				$smarty->assign('orderId',$orderId);
				
				//订单金额，金额以“分”为单位，商户测试以1分测试即可，切勿以大金额测试。该参数必填。
				$orderAmount = $order_info[0]['order_price']*100;
				$smarty->assign('orderAmount',$orderAmount);
				
				//订单提交时间，格式：yyyyMMddHHmmss，如：20071117020101，不能为空。
				$orderTime = date("YmdHis",strtotime( $order_info[0]['order_time']));
				$smarty->assign('orderTime',$orderTime);
				
				//商品名称，可以为空。
				$productName= "叮铃网客户订单";
				$smarty->assign('productName',$productName);
				 
				//商品数量，可以为空。
				$productNum = "";
				$smarty->assign('productNum',$productNum);
				
				//商品代码，可以为空。
				$productId = "";
				$smarty->assign('productId',$productId);
				
				//商品描述，可以为空。
				$productDesc = "";
				$smarty->assign('productDesc',$productDesc);
				
				//扩展字段1，商户可以传递自己需要的参数，支付完快钱会原值返回，可以为空。
				$ext1 = "";
				$smarty->assign('ext1',$ext1);
				
				//扩展自段2，商户可以传递自己需要的参数，支付完快钱会原值返回，可以为空。
				$ext2 = "";
				$smarty->assign('ext2',$ext2);
				
				//支付方式，一般为00，代表所有的支付方式。如果是银行直连商户，该值为10，必填。
				$payType = "00";
				$smarty->assign('payType',$payType);
				
				//银行代码，如果payType为00，该值可以为空；如果payType为10，该值必须填写，具体请参考银行列表。
				$bankId = "";
				$smarty->assign('bankId',$bankId);
				
				//同一订单禁止重复提交标志，实物购物车填1，虚拟产品用0。1代表只能提交一次，0代表在支付不成功情况下可以再提交。可为空。
				$redoFlag = "";
				$smarty->assign('redoFlag',$redoFlag);
				
				//快钱合作伙伴的帐户号，即商户编号，可为空。
				$pid = "";
				$smarty->assign('pid',$pid);
				
				// signMsg 签名字符串 不可空，生成加密签名串
			
				function kq_ck_null($kq_va,$kq_na){if($kq_va == ""){$kq_va="";}else{return $kq_va=$kq_na.'='.$kq_va.'&';}}
			
			
				$kq_all_para=kq_ck_null($inputCharset,'inputCharset');
				$kq_all_para.=kq_ck_null($pageUrl,"pageUrl");
				$kq_all_para.=kq_ck_null($bgUrl,'bgUrl');
				$kq_all_para.=kq_ck_null($version,'version');
				$kq_all_para.=kq_ck_null($language,'language');
				$kq_all_para.=kq_ck_null($signType,'signType');
				$kq_all_para.=kq_ck_null($merchantAcctId,'merchantAcctId');
				$kq_all_para.=kq_ck_null($payerName,'payerName');
				$kq_all_para.=kq_ck_null($payerContactType,'payerContactType');
				$kq_all_para.=kq_ck_null($payerContact,'payerContact');
				$kq_all_para.=kq_ck_null($orderId,'orderId');
				$kq_all_para.=kq_ck_null($orderAmount,'orderAmount');
				$kq_all_para.=kq_ck_null($orderTime,'orderTime');
				$kq_all_para.=kq_ck_null($productName,'productName');
				$kq_all_para.=kq_ck_null($productNum,'productNum');
				$kq_all_para.=kq_ck_null($productId,'productId');
				$kq_all_para.=kq_ck_null($productDesc,'productDesc');
				$kq_all_para.=kq_ck_null($ext1,'ext1');
				$kq_all_para.=kq_ck_null($ext2,'ext2');
				$kq_all_para.=kq_ck_null($payType,'payType');
				$kq_all_para.=kq_ck_null($bankId,'bankId');
				$kq_all_para.=kq_ck_null($redoFlag,'redoFlag');
				$kq_all_para.=kq_ck_null($pid,'pid');
				
			
				$kq_all_para=substr($kq_all_para,0,strlen($kq_all_para)-1);
			
				//$smarty->assign('kq_all_para',$kq_all_para);
				
				/////////////  RSA 签名计算 ///////// 开始 //
				
				$fp = fopen("./key.pem", "r");
				$priv_key = fread($fp, 123456);
				fclose($fp);
				$pkeyid = openssl_get_privatekey($priv_key);
			
				// compute signature
				openssl_sign($kq_all_para, $signMsg, $pkeyid,OPENSSL_ALGO_SHA1);
			
				// free the key from memory
				openssl_free_key($pkeyid);
			
				 $signMsg = base64_encode($signMsg);
				 $smarty->assign('signMsg',$signMsg);

				/////////////  RSA 签名计算 ///////// 结束 //
			}
				
			}
			
			
			
		}
/*		$myinfo = getMemberInfo($_SESSION["_shop_login_id"]);
		
		//个人信息
		if(!empty($myinfo)){
			foreach($myinfo as $map){
				
			}
			$smarty->assign("myinfo",$map);
		}		
		//1.购物车内容
		$list = getCartList($_SESSION["_shop_login_id"]);
		
		if(!empty($list)){
			$product_list = '';
			$price = 0;
			foreach($list as $cart){
				if($product_list==''){
					$product_list = $cart['product_id'];
				}else{
					$product_list = $product_list.','.$cart['product_id'];
				}
				$price = $price+($cart['product_price1']*$cart['cart_acount']);
			}
			$smarty->assign("total",$price);
			//$smarty->assign("product_list",$product_list);
			
			//2.保存订单记录
		
			$order_code = getTimeSort();
			
			//订单详细内容
			$order = array('order_code'=>$order_code, //订单编号
						   'order_state'=>'0', //订单状态
						   'member_id'=>$map['member_id'], //会员ID
						   'get_name'=>$map['member_realname'], //会员姓名
						   'get_address'=>$map['member_address'], //收件地址
						   'get_tel'=>$map['member_tel'], //联系电话
						   'get_phone'=>$map['member_phone'], //手机号码
						   'order_price'=>$price);
			
			
			//购买产品保存
			$sql_array = array();
			
			if(!empty($list)){
				$i=0;
				foreach($list as $cart){
					$sql_array[$i] = "insert into shop_order_info
									(order_code,product_id,product_acount,product_price1,product_price2,type_id,is_taocan) 
									values('".$order_code."','".$cart['product_id']."','".$cart['cart_acount']."',
									'".$cart['product_price1']."','','','".$cart['is_taocan']."')";
					
					//echo $sql_array[$i].'<br>';
					$i++;
				}
			}
			
			$ret = createOrder($order,$sql_array);
			
			//清除购物车内容
			if($ret>0){
				cleanCart($map['member_id']);	
			}else{
				$smarty->assign('error','true');
			}
		}else{
			echo '<script>';
			echo "window.location='member_order_list_1.html';";
			echo '</script>';
		}*/
	
		//$smarty->assign("list",$list);
		
		
				
		$smarty->display('templates/mycart3.tpl',md5($_SERVER["REQUEST_URI"]));
	}
?>