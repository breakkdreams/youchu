<?php 
	session_start();
	/**
	 * 我的账户-我的评论列表
	 */
	require('plugins.php');
	
	
	
	if(!empty($_SESSION['_shop_login_id'])){
		$smarty = new Smarty;
		
		$smarty->debugging = _debugging;
		$smarty->caching = _caching;
		$smarty->cache_lifetime = _cache_lifetime;
		
		$smarty->assign("dir",WEB_PATH);
		$smarty->assign("head_title",'我的账户-我的评论-生鲜网 '.WEB_NAME);
		$smarty->assign("WEB_KEYWORD",WEB_KEYWORD);
		$smarty->assign("WEB_DESCRIBE",WEB_DESCRIBE);
		
		$smarty->assign("member_left_class2",'class="account_feature feature_choose"');
		
		require('_session.php');
		
		$cmd = $_POST['cmd'];
		
		//订单信息
		$order = array();
		$order['member_id'] = $_SESSION['_shop_login_id'];
		$order['order_id'] = $_REQUEST['id'];
		
		$check = commentCheck($order);
		
		//检测是否存在该用户的订单
		if($check==0){
			$smarty->assign('error','true');	
		}
		//用户提交评价信息
		else if('comment'==$cmd && $check==1){
		
			$product_count = $_POST['product_count'];
			
			$ret = 0;
			
			if(is_numeric($product_count) && $product_count>0){
			
				for($i=1;$i<$product_count+1;$i++){
					$comment = array();
			
					$comment['member_id'] = $_SESSION['_shop_login_id'];
					$comment['info_id'] = $_POST['info_id'.$i];
					$comment['comment_point'] = empty($_POST['comment_point'.$i])?5:$_POST['comment_point'.$i];
					$comment['comment_content'] = $_POST['comment_content'.$i];
					$comment['is_anonymous'] = empty($_POST['is_anonymous'.$i])?0:$_POST['is_anonymous'.$i];
					$comment['share_pic1'] = $_POST['h_'.$i.'_1'];
					$comment['share_pic2'] = $_POST['h_'.$i.'_2'];
					$comment['share_pic3'] = $_POST['h_'.$i.'_3'];
					$comment['share_pic4'] = $_POST['h_'.$i.'_4'];
					$comment['share_pic5'] = $_POST['h_'.$i.'_5'];
					
					$ret = commentOrder($comment);
					
					if($ret>0){
						$ret = commentOrderState($order['order_id']);
					}
				}
			}
			
			$smarty->assign('ret',$ret);
			
		}
		//显示用户评价界面
		else if(is_numeric($order['order_id'])){
			
			//订单信息
			$order = getOrderInfo($_SESSION['_shop_login_id'],$order['order_id']);
			
			if(!empty($order) && count($order)==1){

				$map = $order[0]; 
				
				//订单详细信息
				$list = getOrderInfoList($map['order_code']);
				
				$smarty->assign('map',$map);	
				$smarty->assign('list',$list);
				$smarty->assign('product_count',count($list));		
			}
		}
		
		$smarty->display('core/templates/member_comment.tpl',md5($_SERVER["REQUEST_URI"]));
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
	
?>
