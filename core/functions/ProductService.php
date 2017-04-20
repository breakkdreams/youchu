<?php
/**
 * 商品管理
 */


/**
 * 添加商品
 * @param $product
 */
function saveProduct($product){
	$sql = "insert into shop_product(	product_name,			product_title,				product_code,		product_describe,	product_prompt,
										product_place,			product_scope,				product_self,		product_morning,	product_type1,
										product_type2,			product_type3,				product_type4,		brand_id,			product_price1,
										product_price2,			product_weight,				product_amount,		discount_amount,	discount_price,
										add_point1,				add_point2,					temp_price,			product_temp,		temp_date1,
										temp_date2,				product_content,			product_top,		product_units,		product_logo5,
										product_logo4,			product_logo3,				product_logo2,		product_logo,		product_pic,
										product_time,			product_qrcode,				product_pack,		product_recommend1,	product_recommend2,
										product_recommend3,		product_recommend4,			product_recommend5,	product_recommend6,	product_license,
										product_ecoding,		s_id,						product_online,		product_delete,		product_vip) 
			values(	?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?)";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);
	//绑定参数
	$stmt->bind_param('sssssssiiiiiiidddiidiidisssissssssssssiiiiiissiiid',
																			$product['product_name'],
																			$product['product_title'],
																			$product['product_code'],
																			$product['product_describe'],
																			$product['product_prompt'],
																			
																			$product['product_place'],
																			$product['product_scope'],
																			$product['product_self'],
																			$product['product_morning'],
																			$product['product_type1'],
																			
																			$product['product_type2'],
																			$product['product_type3'],
																			$product['product_type4'],
																			$product['brand_id'],
																			$product['product_price1'],
																			
																			$product['product_price2'],
																			$product['product_weight'],
																			$product['product_amount'],
																			$product['discount_amount'],
																			$product['discount_price'],
																			
																			$product['add_point1'],
																			$product['add_point2'],
																			$product['temp_price'],
																			$product['product_temp'],
																			$product['temp_date1'],
																			
																			$product['temp_date2'],
																			$product['product_content'],
																			$product['product_top'],
																			$product['product_units'],
																			$product['product_logo5'],
																			
																			$product['product_logo4'],
																			$product['product_logo3'],
																			$product['product_logo2'],
																			$product['product_logo'],
																			$product['product_pic'],
																			
																			$product['product_time'],
																			$product['product_qrcode'],
																			$product['product_pack'],
																			$product['product_recommend1'],
																			$product['product_recommend2'],
																			
																			$product['product_recommend3'],
																			$product['product_recommend4'],
																			$product['product_recommend5'],
																			$product['product_recommend6'],
																			$product['product_license'],
																			
																			$product['product_ecoding'],
																			$product['s_id'],
																			$product['product_online'],
																			$product['product_delete'],
																			$product['product_vip']);

    $stmt->execute();
    
   
    return $stmt->insert_id;
}

/**
 * 更新商品
 * @param $product
 */
function updateProduct($product){

	$sql = "update shop_product set product_name=?,product_title=?,product_code=?,product_describe=?,product_prompt=?,product_place=?,product_scope=?,product_self=?,product_morning=?,product_type1=?,product_type2=?,product_type3=?,product_type4=?,brand_id=?,product_price1=?,product_price2=?,product_weight=?,product_amount=?,discount_amount=?,discount_price=?,add_point1=?,add_point2=?,temp_price=?,product_temp=?,temp_date1=?,temp_date2=?,product_content=?,product_top=?,product_units=?,product_logo5=?,product_logo4=?,product_logo3=?,product_logo2=?,product_logo=?,product_pic=?,product_time=?,product_qrcode=?,product_pack=?,product_recommend1=?,product_recommend2=?,product_recommend3=?,product_recommend4=?,product_recommend5=?,product_recommend6=?,product_license=?,product_ecoding=?,s_id=?,product_online=?,product_delete=?,product_vip=? where product_id=?";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('sssssssiiiiiiidddiidiidisssissssssssssiiiiiissiiidi', $product['product_name'],
																			$product['product_title'],
																			$product['product_code'],
																			$product['product_describe'],
																			$product['product_prompt'],
																			$product['product_place'],
																			$product['product_scope'],
																			$product['product_self'],
																			$product['product_morning'],
																			$product['product_type1'],
																			$product['product_type2'],
																			$product['product_type3'],
																			$product['product_type4'],
																			$product['brand_id'],
																			$product['product_price1'],
																			$product['product_price2'],
																			$product['product_weight'],
																			$product['product_amount'],
																			$product['discount_amount'],
																			$product['discount_price'],
																			$product['add_point1'],
																			$product['add_point2'],
																			$product['temp_price'],
																			$product['product_temp'],
																			$product['temp_date1'],
																			$product['temp_date2'],
																			$product['product_content'],
																			$product['product_top'],
																			$product['product_units'],
																			$product['product_logo5'],
																			$product['product_logo4'],
																			$product['product_logo3'],
																			$product['product_logo2'],
																			$product['product_logo'],
																			$product['product_pic'],
																			$product['product_time'],
																			$product['product_qrcode'],
																			$product['product_pack'],
																			$product['product_recommend1'],
																			$product['product_recommend2'],
																			$product['product_recommend3'],
																			$product['product_recommend4'],
																			$product['product_recommend5'],
																			$product['product_recommend6'],
																			$product['product_license'],
																			$product['product_ecoding'],
																			$product['s_id'],
																			$product['product_online'],
																			$product['product_delete'],
																			$product['product_vip'],
																			$product['product_id']);

    $stmt->execute();
    
    return $stmt->affected_rows;
}

/**
 * 获取产品信息
 * @param unknown_type $id
 */
function getProductInfo($id){
	
	if(is_numeric($id)){
		$sql = "select p.*,b.brand_name,m.m_name 
			from shop_product p 
			left join shop_brand b on p.brand_id=b.brand_id 
			left join shop_product_menu m on p.product_type1=m.m_id where p.product_id='$id'";
	
		//echo $sql;
		
		return SQLHelper::getInstance()->query($sql);
	}
	return null;
}

/**
 * 获取要购买的商品集合
 * @param $ids
 */
function getProductListForOrder($ids){
	
	$sql = "select * from shop_product where product_id in (".$ids.")";
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 删除产品
 * @param $id
 */
function deleteProduct($id){

	if(is_numeric($id)){
		//$sql = "delete from shop_product where product_id=".$id;
		$sql = "update shop_product set product_delete=1 where product_id=".$id;
		return SQLHelper::getInstance()->execute($sql);
	}
	
	return 0;
}

function getProductLimit($limit,$type=''){
	$where=' where 1=1 ';

	if(!empty($type)){
		$where = $where.' and p.product_type1 in ('.$type.')';
	}
		
	$sql = "select p.*,b.brand_name,m.m_name 
			from shop_product p 
			left join shop_brand b on p.brand_id=b.brand_id 
			left join shop_product_menu m on p.product_type1=m.m_id ".$where." 
			and p.product_online=1 and product_delete=0 order by p.product_id limit ".$limit." ";

	//echo $sql;
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取商品分页
 * @param $limit
 * @param $rowid
 * @param $parms 
 */
function getProductPage($limit,$rowid,$params=''){
	$where=' where 1=1 ';

	if(is_array($params)){
		
		//1.是否上架
		if(is_numeric($params['product_online']) && $params['product_online']>=0){
			$where  = $where.' and product_online='.$params['product_online'];
		}
		
		//2.是否回收站商品
		if(is_numeric($params['product_delete']) && $params['product_delete']>=0){
			$where  = $where.' and product_delete='.$params['product_delete'];
		}
		
		//3.查询栏目内容
		if(!empty($params['m_floor'])){
			$where  = $where." and m.m_floor like '".$params['m_floor']."%' ";
		}
		
		//4.商品关键词
		if(!empty($params['product_name'])){
			$where  = $where." and p.product_name like '%".$params['product_name']."%' ";
		}
	}
	
	$sql = "select p.*,b.brand_name,m.m_name 
			from shop_product p 
			left join shop_brand b on p.brand_id=b.brand_id 
			left join shop_product_menu m on p.product_type1=m.m_id ".$where." 
			order by p.product_id limit ".$rowid.",".$limit." ";
	
	//echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取商品总数
 */
function getProductCount($params=''){
	$where=' where 1=1 ';

	if(is_array($params)){
		
		//1.是否上架
		if(is_numeric($params['product_online']) && $params['product_online']>=0){
			$where  = $where.' and product_online='.$params['product_online'];
		}
		
		//2.是否回收站商品
		if(is_numeric($params['product_delete']) && $params['product_delete']>=0){
			$where  = $where.' and product_delete='.$params['product_delete'];
		}
		
		//3.查询栏目内容
		if(!empty($params['m_floor'])){
			$where  = $where." and m.m_floor like '".$params['m_floor']."%' ";
		}
		
		//4.商品关键词
		if(!empty($params['product_name'])){
			$where  = $where." and p.product_name like '%".$params['product_name']."%' ";
		}
	}
	
	$sql = "select count(*)
			from shop_product p 
			left join shop_brand b on p.brand_id=b.brand_id 
			left join shop_product_menu m on p.product_type1=m.m_id ".$where;
	
	return SQLHelper::getInstance()->queryObject($sql);
}


/**
 * 设置产品是否参加活动
 * @param $type
 * @param $id
 * @param $v
 */
function updateProductType($type,$id,$v='0'){
	
	if(is_numeric($type) && is_numeric($id) && is_numeric($v)){
		$sql = "update shop_product set product_recommend".$type."='".$v."' where product_id=".$id;
	
		return SQLHelper::getInstance()->execute($sql);
	}
	
	return 0;
}

/**
 * 设置商品是否上架
 * @param $id
 * @param $v
 */
function updateProductOnline($id,$v='0'){
	if(is_numeric($id) && is_numeric($v)){
		$sql = "update shop_product set product_online='".$v."' where product_id=".$id;
	
		return SQLHelper::getInstance()->execute($sql);
	}
	
	return 0;
}

/**
 * 获取推荐商品
 * @param $limit 推荐数量
 * @param $type_in 所包含的的产品类
 */
function getRecommendProduct($limit='10',$type_in='1'){
	
	if(is_numeric($limit) && is_numeric($type_in)){
		$sql = "select * from shop_product where product_recommend".$type_in."=1 and product_online=1 order by product_id desc limit ".$limit;
		
		return SQLHelper::getInstance()->query($sql);
	}
	return null;
}
/**************************/
/*********首页  *************/
/**************************/

/**
 * 获取商品分页(分类)
 * @param $limit
 * @param $rowid
 * @param $parms 
 * @author 沈家盛
 */
function getProductPage2($product_type1='-1',$type='1',$groupId=0,$page='1'){
		try {
			$sql = "SELECT product_pack,product_name,product_id,";
				$sql = $sql."product_price1 product_price,";
			//企业价格
/*			if($groupId==3){
				$sql = $sql."product_vip product_price,";
			}
			//高级会员
			else if($groupId==2){
			} 
			//普通会员
			else if($groupId==1){
				$sql = $sql."product_price2 product_price,";
			}
			//游客
			else{
				$sql = $sql."product_price2 product_price,";
			}*/
			
			$sql = $sql."product_pic,product_title FROM shop_product s where ";
			
			//商品栏目
			$sql = $sql.' (product_type1 = '.$product_type1.' or product_type2 = '.$product_type1.' or product_type3 = '.$product_type1.' or product_type4 = '.$product_type1.') ';
			
			//上架商品
			$sql = $sql.'  and product_online=1 ';
			
			//不是回收站商品
			$sql = $sql.'  and product_delete=0 ';
		
			//$type 等于1 为新品， 等于2为热卖 ， 等于3是价格升序，等于4为价格降序
			if($type==1){
				$sql = $sql.' and product_recommend1 = 1 ';
			}else if($type==2){
				$sql = $sql.' and product_recommend2 = 1 ';
			}else if($type==3){
					$sql = $sql." order by product_price1 ";
				//企业价格
			/*	if($groupId==3){
					$sql = $sql." order by product_vip ";
				}
				//高级会员
				else if($groupId==2){
				} 
				//普通会员
				else if($groupId==1){
					$sql = $sql." order by product_price2 ";
				}
				//游客
				else{
					$sql = $sql." order by product_price2 ";
				}*/
			}else if($type==4){
					$sql = $sql." order by product_price1 desc ";
				/*//企业价格
				if($groupId==3){
					$sql = $sql." order by product_vip desc ";
				}
				//高级会员
				else if($groupId==2){
				} 
				//普通会员
				else if($groupId==1){
					$sql = $sql." order by product_price2 desc ";
				}
				//游客
				else{
					$sql = $sql." order by product_price2 desc ";
				}*/
			}else{
				$sql = $sql.' and (product_recommend1 = 1 or product_recommend2 = 1 or product_recommend3 = 1 or product_recommend4 = 1 or product_recommend5 = 1 or product_recommend6 = 1 )';
			}
			//分页
			$sql = $sql.getPage($page);
		} catch (Exception $e) {
			return null;
		}
        
		return SQLHelper::getInstance()->query($sql); 
}
/**
 * 获取商品分页(搜索)
 * @param $limit
 * @param $rowid
 * @param $parms 
 * @author 沈家盛
 */
function getProductPage3($product_name='',$groupId,$page='1'){
		try {
			$sql = "SELECT product_pack,product_name,product_id,product_pic,";
				$sql = $sql."product_price1 product_price,";
		/*	//企业价格
				$sql = $sql."product_vip product_price,";
			if($groupId==3){
			}
			//高级会员
			else if($groupId==2){
			} 
			//普通会员
			else if($groupId==1){
				$sql = $sql."product_price2 product_price,";
			}
			//游客
			else{
				$sql = $sql."product_price2 product_price,";
			}*/
			$sql = $sql."product_title FROM shop_product s where ";
			
			//商品栏目
			$sql = $sql.' (product_name like \'%'.$product_name.'%\' or product_title  like \'%'.$product_name.'%\' ) ';
			//上架商品
			$sql = $sql.'  and product_online=1 ';
			
			//不是回收站商品
			$sql = $sql.'  and product_delete=0 ';
		
			//分页
			$sql = $sql.getPage($page);
			
		} catch (Exception $e) {
			return null;
		}
		
		return SQLHelper::getInstance()->query($sql); 
}
/**
 * 获取热门商品分页
 * @param $limit
 * @param $rowid
 * @param $parms 
 * @author 沈家盛
 */
function getHotProductPage($groupId,$page='1'){
		try {
			$sql = "SELECT product_pack,product_name,product_id,product_pic,";
				$sql = $sql."product_price1 product_price,";
			//企业价格
/*			if($groupId==3){
				$sql = $sql."product_vip product_price,";
			}
			//高级会员
			else if($groupId==2){
			} 
			//普通会员
			else if($groupId==1){
				$sql = $sql."product_price2 product_price,";
			}
			//游客
			else{
				$sql = $sql."product_price2 product_price,";
			}*/
			$sql = $sql."product_title FROM shop_product s where 1=1 ";
			
			//上架商品
			$sql = $sql.'  and product_online=1 ';
			
			//不是回收站商品
			$sql = $sql.'  and product_delete=0 ';
			//不是回收站商品
			$sql = $sql.'  and product_delete=0 ';
			
			//热门商品
			$sql = $sql.'  and product_recommend3=1 ';
			
		
			//分页
			$sql = $sql.getPage($page);
		//	echo $sql;
		} catch (Exception $e) {
			return null;
		}
		
		return SQLHelper::getInstance()->query($sql); 
}
/**
 * 获取热门词汇
 * @param $m_fid
 * @author 沈家盛
 */
function getHotWord(){
	
	$sql = "select key_name from shop_hot_words ORDER BY key_top,RAND() LIMIT 8";
	
	return SQLHelper::getInstance()->query($sql); 
}
/**
 * 获取一级目录
 * @param $m_fid
 * @author 沈家盛
 */
function getProductRootMenu(){
	
	$sql = "select m_id,m_name,m_photo,m_photo2 from shop_product_menu where m_size=1";
	
	return SQLHelper::getInstance()->query($sql); 
}
/**
 * 获取二级目录
 * @param $m_fid
 * @author 沈家盛
 */
function getProductSecondMenu(){
		try {
			$sql = "SELECT m_id,m_fid,m_name,m_photo FROM shop_product_menu ";
		} catch (Exception $e) {
			return null;
		}
        
		return SQLHelper::getInstance()->query($sql); 
}
/**
 * 获取推荐商品(商品详情页)
 * @param $limit 推荐数量
 * @param $type_in 所包含的的产品类
 * @author 沈家盛
 */
function getRecommendProductOne(){
	
		$sql = "SELECT product_pic,product_id FROM shop_product ORDER BY RAND() LIMIT 1";
		
		return SQLHelper::getInstance()->queryForMap($sql);
}
/**
 * 获取产品信息(商品详情页)
 * @param unknown_type $id
 * @author 沈家盛
 */
function getProductInfo2($id,$groupId){
	
	if(is_numeric($id)){
		$sql = "select product_scope,product_amount,product_name,product_title,";
			$sql = $sql."product_price1 product_price,";
		//企业价格
		/*if($groupId==3){
			$sql = $sql."product_vip product_price,";
		}
		//高级会员
		else if($groupId==2){
		} 
		//普通会员
		else if($groupId==1){
			$sql = $sql."product_price2 product_price,";
		}
		//游客
		else{
			$sql = $sql."product_price2 product_price,";
		}*/
		$sql = $sql."product_pack,product_logo5,product_logo4,product_logo3,product_logo2,product_logo,product_pic from shop_product where product_id='$id'";
	
		//echo $sql;
		
		return SQLHelper::getInstance()->queryForMap($sql);
	}
	return null;
}

/**
 * 是否关注此产品(商品详情页)
 * @param unknown_type $id
 * @author 沈家盛
 */
function getCollectionState($product_id,$member_id=0){
	
	if(is_numeric($product_id)&&$product_id>0&&is_numeric($member_id)&&$member_id>0){
		$sql = "select * from shop_member_focus where product_id=".$product_id." and member_id=".$member_id;
	
		//echo $sql;
		
		return SQLHelper::getInstance()->query($sql);
	}
	return null;
}
/**
 * 后台所有二级分类
 * @param unknown_type $id
 * @author 沈家盛
 */
function getMenuByBackstage(){
	
		$sql = "SELECT m_id,m_name FROM shop_product_menu where m_size=2 ORDER BY m_fid";
		return SQLHelper::getInstance()->query($sql);
}
/**
 * 后台所有商品
 * @param unknown_type $id
 * @author 沈家盛
 */
function getProductByBackstage(){
	
		$sql = "select product_id,product_name,product_type1, product_type2,product_type3,product_type4 from shop_product where product_delete=0  ORDER BY product_id desc ";
		return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取商品分页(分类)
 * @param $limit
 * @param $rowid
 * @param $parms 
 * @author 沈家盛
 */
function getProductPageByType($type='1',$order='1',$groupId=0,$page='1'){
		try {
			$sql = "SELECT product_pack,product_name,product_id,";
				$sql = $sql."product_price1 product_price,";
			//企业价格
		/*	if($groupId==3){
				$sql = $sql."product_vip product_price,";
			}
			//高级会员
			else if($groupId==2){
			} 
			//普通会员
			else if($groupId==1){
				$sql = $sql."product_price2 product_price,";
			}
			//游客
			else{
				$sql = $sql."product_price2 product_price,";
			}*/
			
			$sql = $sql."product_pic,product_title FROM shop_product s where 1=1 ";
			
			//上架商品
			$sql = $sql.'  and product_online=1 ';
			
			//不是回收站商品
			$sql = $sql.'  and product_delete=0 ';
		
			//$type 等于1 为新品， 等于2为热卖 ，等于3为猜你喜欢  等于3是价格升序，等于4为价格降序
			if($type==1){
				$sql = $sql.' and product_recommend2 = 1';
			}else if($type==2){
				$sql = $sql.' and product_recommend3 = 1 ';
			}else if($type==3){
				$sql = $sql.' and product_recommend4 = 1 ';
			}
			//等于1是价格升序，等于2为价格降序
			if($order==1){
					$sql = $sql." order by product_price1 ";
				//企业价格
			/*	if($groupId==3){
					$sql = $sql." order by product_vip ";
				}
				//高级会员
				else if($groupId==2){
				} 
				//普通会员
				else if($groupId==1){
					$sql = $sql." order by product_price2 ";
				}
				//游客
				else{
					$sql = $sql." order by product_price2 ";
				}*/
			}else if($order==2){
					$sql = $sql." order by product_price1 desc ";
				//企业价格
	/*			if($groupId==3){
					$sql = $sql." order by product_vip desc ";
				}
				//高级会员
				else if($groupId==2){
				} 
				//普通会员
				else if($groupId==1){
					$sql = $sql." order by product_price2 desc ";
				}
				//游客
				else{
					$sql = $sql." order by product_price2 desc ";
				}*/
			}else{
				$sql = $sql.' and (product_recommend1 = 1 or product_recommend2 = 1 or product_recommend3 = 1 or product_recommend4 = 1 or product_recommend5 = 1 or product_recommend6 = 1 )';
			}
			//分页
			$sql = $sql.getPage($page);
		} catch (Exception $e) {
			return null;
		}
        
		return SQLHelper::getInstance()->query($sql); 
}
?>
