<?php
//1.进口水果 子类别
$type1 = getMenuListByParentId(47);
$type1_str = '';
foreach($type1 as $t){
	if($type1_str==''){
		$type1_str = $t['m_id'];
	}else{
		$type1_str = $type1_str.','.$t['m_id'];
	}
}

//2.国产水果 子类别
$type2 = getMenuListByParentId(48);
$type2_str = '';
foreach($type2 as $t){
	if($type2_str==''){
		$type2_str = $t['m_id'];
	}else{
		$type2_str = $type2_str.','.$t['m_id'];
	}
}
/*
//3.进口零食 子类别
$type3 = getMenuListByParentId(49);
$type3_str = '';
foreach($type3 as $t){
	if($type3_str==''){
		$type3_str = $t['m_id'];
	}else{
		$type3_str = $type3_str.','.$t['m_id'];
	}
}

//4.国产零食 子类别
$type4 = getMenuListByParentId(50);
$type4_str = '';
foreach($type4 as $t){
	if($type4_str==''){
		$type4_str = $t['m_id'];
	}else{
		$type4_str = $type4_str.','.$t['m_id'];
	}
}

//5.酒-饮料 子类别
$type5 = getMenuListByParentId(51);
$type5_str = '';
foreach($type5 as $t){
	if($type5_str==''){
		$type5_str = $t['m_id'];
	}else{
		$type5_str = $type5_str.','.$t['m_id'];
	}
}*/

$smarty->assign('type1',$type1);
$smarty->assign('type2',$type2);
/*$smarty->assign('type3',$type3);
$smarty->assign('type4',$type4);
$smarty->assign('type5',$type5);*/

?>