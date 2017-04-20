<?php
//登陆信息
if(!empty($_SESSION["_shop_login_username"])){
	$smarty->assign('login_name',$_SESSION["_shop_login_username"]);
}else if(!empty($_SESSION["_shop_login_name"])){
	$smarty->assign('login_name',$_SESSION["_shop_login_name"]);
}

if(!empty($_SESSION['_shop_login_id'])){
	//购物车数量统计
	$shop_acount = countCart($_SESSION['_shop_login_id']);
	$smarty->assign('shop_acount',$shop_acount);
}


?>