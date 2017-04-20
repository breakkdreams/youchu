<?php 
	session_start();
	/**
	 * 订单确认
	 */
	require('plugins.php');
	
	
	
	if(!empty($_SESSION['_shop_login_id'])){
		$smarty = new Smarty;
		
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'订单确认 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign("member_left_class5",'class="account_feature feature_choose"');
		
		//购买商品的数量
		$amount = $_REQUEST['order_amount'];
		
		//提交订单
		if('dosubmit'==$_REQUEST['order_cmd']){
			
			//1.订单总信息
			$order = array();
			
			$order['order_code']=$_REQUEST['order_code'];
			$order['order_state']=0;
			$order['member_id']=$_SESSION['_shop_login_id'];
			$order['product_id']=0;
			$order['order_time']='';
			$order['pay_type']='';
			$order['pay_time']='';
			$order['send_type']=$_REQUEST['send_type'];
			$order['send_time']='';
			$order['send_company']='';
			$order['send_code']='';
			$order['get_name']=$_REQUEST['get_name'];
			$order['get_address']=$_REQUEST['get_address'];
			$order['get_tel']=$_REQUEST['get_tel'];
			$order['get_phone']=$_REQUEST['get_phone'];
			$order['get_qq']=$_REQUEST['get_qq'];
			$order['get_zip']=$_REQUEST['get_zip'];
			$order['get_building']=$_REQUEST['get_building'];
			$order['get_time']=$_REQUEST['get_time'];
			$order['order_price']=$_REQUEST['order_total'];
			$order['product_price']=$_REQUEST['product_price'];
			$order['send_price']=$_REQUEST['send_price'];
			$order['order_message']=$_REQUEST['order_message'];
			$order['order_fp']=$_REQUEST['order_fp'];
			
			//2.购买商品信息
			
			//2.1.需要购买的商品ID
			$order_item = $_REQUEST['order_item'];
            //2.2.单个商品件数
            $order_num = $_REQUEST['order_num'];
            //2.3.单个商品价格
            $order_price = $_REQUEST['order_price'];
			
            $array_products = split(',',$order_item);
			$array_nums = split(',',$order_num);
			$array_price =  split(',',$order_price);
			
			if(count($array_nums)==count($array_products) &&  count($array_nums)==count($array_price)){
				
				$params_array = array();
				
				$params_array['products'] = $array_products;
				$params_array['nums'] = $array_nums;
				$params_array['price'] = $array_price;
				
				$ret = checkOrderCode($order['order_code']);
				
				if(is_numeric($ret) && $ret==0){
					$ret = createOrder($order,$params_array);
				}
				
				require('_session.php');
			
				if($ret>0){
					$smarty->assign('product_name','生鲜网订单');
					$smarty->assign('order_price',$order['order_price']);
					$smarty->assign('order_time',date('y-m-d h:i:s',time()));
					$smarty->assign('order_address',$order['get_address']);
					$smarty->assign('order_phone',$order['get_phone']);
					$smarty->assign('order_tel',$order['get_tel']);
					$smarty->assign('order_code',$order['order_code']);
					$smarty->assign('order_user',$order['get_name']);
					
					$smarty->display('core/templates/order_ok.tpl',md5($_SERVER["REQUEST_URI"]));		
				}else{
					$smarty->display('core/templates/order_fail.tpl',md5($_SERVER["REQUEST_URI"]));
				}
			}
				
		}else if(is_numeric($amount)){
			
			$price_array  = array();
			
			//单件物品购买
			if($amount==1){
				//商品ID
				$id = $_REQUEST['order_item'];
				//商品单价
				$price = $_REQUEST['order_price'];
				
				$price_str = split(',',$price);
				
				$price_total = 0;
				
				foreach ($price_str as $p){
					$price_total = $price_total+$p;
				}
				
				//商品列表
				$list = getProductListForOrder($id);
				$smarty->assign("list",$list);
				
				//产品对应的购买数量表
				$price_array[$_REQUEST['order_item']] = $_REQUEST['order_num'];
				
				$smarty->assign("price_array",$price_array); 
				$smarty->assign("order_total",$price_total);
				$smarty->assign("order_item",$id);
				$smarty->assign("order_num",$_REQUEST['order_num']);
				$smarty->assign("order_price",$price);
			}
			//多件商品购买
			else{
				//1.需要购买的商品ID
				$order_item = $_REQUEST['order_item'];
				//2.所有商品总价
				$order_total = $_REQUEST['order_total'];
	            //3.单个商品件数
	            $order_num = $_REQUEST['order_num'];
	            //4.单个商品价格
	            $order_price = $_REQUEST['order_price'];
	            //5.总件数
	            $order_amount = $_REQUEST['order_amount'];
	            
	            //商品列表
	            $list = getProductListForOrder($order_item);
				
				$smarty->assign("list",$list);
				
				//产品对应的购买数量表
				$products = split(',',$order_item);
				$nums = split(',',$order_num); 
				
				for($i=0;$i<count($products);$i++){
					$price_array[$products[$i]] = $nums[$i];
				}
				
				$smarty->assign("price_array",$price_array);
				$smarty->assign("order_total",$order_total);
				$smarty->assign("order_item",$order_item);
				$smarty->assign("order_num",$order_num);
				$smarty->assign("order_price",$order_price);
			}
			
			//1.收货地址
			$addresslist = getMemberAddressList($_SESSION['_shop_login_id']);
			$smarty->assign("addresslist",$addresslist);
			
			$order_code = getTimeSort();
			$smarty->assign("order_code",$order_code);
			
			require('_session.php');
			$smarty->display('core/templates/order.tpl',md5($_SERVER["REQUEST_URI"]));
		}	
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
	
?>
