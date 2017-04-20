<?php
	require_once('check2.php');
	
	$cmd = $_POST["cmd"];

	if("updateMenuPhoto"==$cmd){
		$id = $_POST["id"];
		$photo = $_POST["photo"];
		$count = updateMenuPhoto($id,$photo);
		echo $count;
	}else if("getProductitem"==$cmd){
		$id = $_POST["id"];
		$itemlist=getProductitemList($id);
		foreach($itemlist as $value){
			$item[]=array('type_id'=>$value['type_id'],'type_name'=>$value['type_name']);
		}
		echo urldecode(json_encode($item));
	}else if("setProductType"==$cmd){
		$id = $_POST["id"];
		$itemlist=getSubproductList($id);
		foreach($itemlist as $value){
			$item[]=array('product_id'=>$value['product_id'],'product_name'=>$value['product_name']);
		}
		echo urldecode(json_encode($item));
	}else if("loginnamecheck"==$cmd){
		echo $check = checkMember($_POST["loginname"]);
	}
	else if("productchange"==$cmd){
		if("nameChange"==$_POST["method"]){
			echo nameChange($_POST["id"],$_POST["value"]);
		}
			if("priceChange"==$_POST["method"]){
			echo priceChange($_POST["id"],$_POST["value"]);
		}
			if("weightChange"==$_POST["method"]){
			echo weightChange($_POST["id"],$_POST["value"]);
		}
			if("amountChange"==$_POST["method"]){
			echo amountChange($_POST["id"],$_POST["value"]);
		}
	}
	else{
		echo $cmd;
	}
?>