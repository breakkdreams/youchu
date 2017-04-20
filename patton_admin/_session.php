<?php
	$smarty->assign('manage_right',$_SESSION["manage_right"]);
	$smarty->assign('product_right',$_SESSION["product_right"]);
	
	//echo $_SESSION["manage_right"];
	
	if($_SESSION["_id"]*1>1){
		$smarty->assign('manage_type','0');
	}else{
		$smarty->assign('manage_type','1');
	}
?>