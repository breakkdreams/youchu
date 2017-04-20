<?php
/**
 * 套餐服务类
 */


/**
 * 创建套餐
 * @param $item
 */
function createTaocan($item){
	
	$sql = "insert into shop_product_taocan(t_name,p_id1,p_id2,p_id3,p_id4,p_id5,p_id6,t_id1,t_id2,t_id3,t_id4,
			t_price1,t_price2,t_order,t_aviable) 
			values('".$item['t_name']."',
				   '".$item['p_id1']."',
				   '".$item['p_id2']."',
				   '".$item['p_id3']."',
				   '".$item['p_id4']."',
				   '".$item['p_id5']."',
				   '".$item['p_id6']."',
				   '".$item['t_id1']."',
				   '".$item['t_id2']."',
				   '".$item['t_id3']."',
				   '".$item['t_id4']."',
				   '".$item['t_price1']."',
				   '".$item['t_price2']."',
				   '".$item['t_order']."',
				   '".$item['t_aviable']."')";
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 更新套餐
 * @param $item
 */
function updateTaocan($item){
	
	$sql = "update shop_product_taocan set t_name='".$item['t_name']."',
										   p_id1='".$item['p_id1']."',
										   p_id2='".$item['p_id2']."',
										   p_id3='".$item['p_id3']."',
										   p_id4='".$item['p_id4']."',
										   p_id5='".$item['p_id5']."',
										   p_id6='".$item['p_id6']."',
										   t_id1='".$item['t_id1']."',
										   t_id2='".$item['t_id2']."',
										   t_id3='".$item['t_id3']."',
										   t_id4='".$item['t_id4']."',
										   t_price1='".$item['t_price1']."',
										   t_price2='".$item['t_price2']."',
										   t_order='".$item['t_order']."',
										   t_aviable='".$item['t_aviable']."' where t_id=".$item['t_id'];
				   
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 删除套餐
 * @param $id
 */
function deleteTaocan($id){
	$sql = "delete from shop_product_taocan where t_id=".$id;
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 获取商品分页
 * @param $limit
 * @param $rowid
 * @param $parms 
 */
function getTaocanPage(){
		
	$sql = "SELECT s.t_id,s.t_name,s.t_price1,s.t_price2,p_id1,p_id2,p_id3,p_id4,
			p1.product_name as product_name1,p1.product_price1 as price11,p1.product_price2 as price12,p1.product_pic as product_pic1,
			p2.product_name as product_name2,p2.product_price1 as price21,p2.product_price2 as price22,p2.product_pic as product_pic2,
			p3.product_name as product_name3,p3.product_price1 as price31,p3.product_price2 as price32,p3.product_pic as product_pic3,
			p4.product_name as product_name4,p4.product_price1 as price41,p4.product_price2 as price42,p4.product_pic as product_pic4
			FROM shop_product_taocan s
			left join shop_product p1 on s.p_id1=p1.product_id
			left join shop_product p2 on s.p_id2=p2.product_id
			left join shop_product p3 on s.p_id3=p3.product_id
			left join shop_product p4 on s.p_id4=p4.product_id";

	//echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}

function getTaocanLimit($limit,$type=''){
	$where=' where 1=1 ';

	if(!empty($type)){
		$where = $where.' and p.product_type1 in ('.$type.')';
	}
		
	$sql = "select p.*,b.brand_name,m.m_name 
			from shop_product p 
			left join shop_brand b on p.brand_id=b.brand_id 
			left join t_menu m on p.product_type1=m.m_id ".$where." 
			order by p.product_id limit ".$limit." ";

	//echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取商品总数
 */
function getTaocanCount($search1='',$search2='',$search3=''){
	$where=' where 1=1 ';

	if(!empty($search1) && $search1!='0'){
		$where = $where.' and p.product_type1 in ('.$search1.')';
	}
	
	$sql = "select count(1) 
			from shop_product p 
			left join shop_brand b on p.brand_id=b.brand_id 
			left join t_menu m on p.product_type1=m.m_id $where ";
	
	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 获取套餐内容
 * @param $id
 */
function getTaocanInfo($id){
	$sql = "select * from shop_product_taocan where t_id=".$id;
	return SQLHelper::getInstance()->query($sql);
}
?>