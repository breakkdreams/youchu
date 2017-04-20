<?php
/**
 * 新闻资讯信息维护
 * Version: 1.0
 * Author: sunwei
 * Date: 2013-06-15
 */

/**
 * 创建资讯内容
 * @param $news
 */
function createNews($news){
	$n_content = str_replace('\'','’',$news['n_content']);
	
	$sql = "insert into t_news(city_id,n_title,n_type1,n_type2,n_type3,n_content,n_hits,n_display,n_photo,n_source,n_author,n_file,n_red,n_keyword,n_describe,n_title2,n_recommend1,n_recommend2,n_recommend3,n_recommend4,n_recommend5,read_group_id,n_muban,n_comment,comment_group_id,n_state,n_html,n_htmlname,n_out,n_addtime,n_good, n_forwarding_number, n_bad) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),0,0,0)";
	
	$mysqli = SQLHelper::getInstance()->getConnection();
		
	//mysqli中有直接的方法可用
	$stmt = $mysqli->prepare($sql);

	//绑定参数
	$stmt->bind_param('isssssiissssisssiiiiiisiiisis', $news['city_id'],
														$news['n_title'],
														$news['n_type1'],
														$news['n_type2'],
														$news['n_type3'],
														$n_content,//$news['n_content'],
														$news['n_hits'],
														$news['n_display'],
														$news['n_photo'],
														$news['n_source'],
														$news['n_author'],
														$news['n_file'],
														$news['n_red'],
														$news['n_keyword'],
														$news['n_describe'],
														$news['n_title2'],
														$news['n_recommend1'],
														$news['n_recommend2'],
														$news['n_recommend3'],
														$news['n_recommend4'],
														$news['n_recommend5'],
														$news['read_group_id'],
														$news['n_muban'],
														$news['n_comment'],
														$news['comment_group_id'],
														$news['n_state'],
														$news['n_html'],
														$news['n_htmlname'],
														$news['n_out']);

    $stmt->execute();
    return $stmt->insert_id;
}

/**
 *  更新新闻内容
 * @param $id 资讯编号
 */
function updateNews($news){
	
	if(is_numeric($news['n_id']) && $news['n_id']>0){
		
		$n_content = str_replace('\'','’',$news['n_content']);
		
		$sql = "update t_news set n_title=?,n_type1=?,n_type2=?,n_type3=?,n_content=?,n_photo=?,n_source=?,n_author=?,n_file=?,n_keyword=?,n_describe=?,n_title2=?,n_out=?,n_order=? where n_id=?";
		
		$mysqli = SQLHelper::getInstance()->getConnection();
			
		//mysqli中有直接的方法可用
		$stmt = $mysqli->prepare($sql);
	
		//绑定参数
		$stmt->bind_param('sssssssssssssii', $news['n_title'],
											$news['n_type1'],
											$news['n_type2'],
											$news['n_type3'],
											$n_content,//$news['n_content'],
											$news['n_photo'],
											$news['n_source'],
											$news['n_author'],
											$news['n_file'],
											$news['n_keyword'],
											$news['n_describe'],
											$news['n_title2'],
											$news['n_out'],
											$news['n_order'],
											$news['n_id']);
	
	    $stmt->execute();
	    
	    return $stmt->affected_rows;
	}
	
}

/**
 * 获取资讯分页
 * @param $limit
 * @param $rowid
 * @param $n_type 资讯类别
 * @param $n_title 资讯标题
 */
function getNewsPage($limit,$rowid,$params=''){
	$where=' where 1=1 ';

	if(!empty($params['n_type'])){
		$where=$where." AND n.n_type1 in (".$params['n_type'].") ";
	}
	
	if(!empty($params['n_title'])){
		$where=$where." AND (n.n_title like '%".$params['n_title']."%' or n.n_content like '%".$params['n_title']."%')";
	}	
		
	$sql = "SELECT n.n_id,m1.m_name menu,n.n_title,n.n_addtime,n.n_hits,n.n_author,n.n_source,n.n_photo from t_news n left join t_news_menu m1 on n.n_type1=m1.m_id ".$where." order by n_id desc,n.n_order desc limit ".$rowid.",".$limit." ";

	//echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取相关新闻总数
 * @param $n_type 资讯类别
 * @param $n_title 资讯标题
 */
function getNewsCount($params=''){
	$where=' where 1=1 ';

	if(!empty($params['n_type'])){
		$where=$where." AND n.n_type1 in (".$params['n_type'].") ";
	}
	
	if(!empty($params['n_title'])){
		$where=$where." AND (n.n_title like '%".$params['n_title']."%' or n.n_content like '%".$params['n_title']."%')";
	}	
		
	$sql = "SELECT count(*) from t_news n left join t_menu m1 on n.n_type1=m1.m_id ".$where;
	
	return SQLHelper::getInstance()->queryObject($sql);
}

/**
 * 获取最新的N条资讯
 * @param $limit 记录数
 * @param $n_type 类别
 */
function getNewsLimit($limit,$params=''){
	$where=' where 1=1 ';

	if(!empty($params['n_type'])){
		$where=$where." AND n.n_type1 in (".$params['n_type'].") ";
	}
	
	if(!empty($params['n_title'])){
		$where=$where." AND (n.n_title like '%".$params['n_title']."%' or n.n_content like '%".$params['n_title']."%')";
	}
	
	$sql = "SELECT n.n_id,m1.m_name menu,n.n_title,n.n_addtime,n.n_hits,n.n_author,n.n_source,n_photo,n_content from t_news n left join t_menu m1 on n.n_type1=m1.m_id ".$where." order by n_order desc,n.n_id desc limit ".$limit." ";

//	echo $sql;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取资讯内容
 * @param $id 资讯编号
 */
function getNewsInfo($id){
	
	if(is_numeric($id)){
		$sql="SELECT m1.m_name menu,n.* from t_news n left join t_menu m1 on n.n_type1=m1.m_id where n.n_id=".$id;
	
		return SQLHelper::getInstance()->query($sql);	
	}
	
	return null;
}


/**
 * 更新点击率
 * @param $id
 */
function updateHits($id){
	
	if(is_numeric($id)){
		$sql = "update t_news set n_hits=n_hits+1 where n_id=".$id;
	
		return SQLHelper::getInstance()->execute($sql);
	}
	
	return 0;
}

/**
 * 删除资讯
 * @param $id 资讯编号
 */
function deleteNews($id){
	
	if(is_numeric($id)){
		$sql = "delete from t_news where n_id=".$id;
	
		return SQLHelper::getInstance()->execute($sql);	
	}
	return 0;
}

/**
 * 下一条内容
 * @param $type 类别ID
 * @param $id 当前ID
 */
function findNext($type='',$id){
	
	if(is_numeric($id)){
		$sql = "select n_id,n_title from t_news where n_type1 in (".$type.") and n_id>".$id." limit 1";
	
		$array = SQLHelper::getInstance()->query($sql);
		
		if(!empty($array) && count($array)>0){
			foreach($array as $item){
				
			}
			return $item;
		}
		else{
			return '';
		}
	}else{
		return '';
	}
}

/**
 * 上一条内容
 * @param $type 类别ID
 * @param $id 当前ID
 */
function findPrev($type='',$id){
	
	if(is_numeric($id)){
		$sql = "select n_id,n_title from t_news where n_type1 in (".$type.") and n_id<".$id." limit 1";
	
		$array = SQLHelper::getInstance()->query($sql);
		
		if(!empty($array) && count($array)>0){
			foreach($array as $item){
				
			}
			
			return $item;
		}
		else{
			return '';
		}
	}
	else{
		return '';
	}
	
}
/**
 * 获取新闻
 * @author 沈家盛
 */
function getCommunityNews($page){
	$sql = "SELECT n.n_good,n.n_forwarding_number,n.n_bad,n.n_title,n.n_photo FROM t_news_menu m LEFT JOIN t_news n on m.m_id=n.n_type1 where m.m_name='社区新闻' ORDER BY n_id DESC ".getPage($page);
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 更新点赞
 * @param $id
 * @author 沈家盛
 */
function updateGood($id){
	
	if(is_numeric($id)){
		$sql = "update t_news set n_good=n_good+1 where n_id=".$id;
	
		return SQLHelper::getInstance()->execute($sql);
	}
	
	return 0;
}
/**
 * 更新点踩
 * @param $id
 * @author 沈家盛
 */
function updateBad($id){
	
	if(is_numeric($id)){
		$sql = "update t_news set n_bad=n_bad+1 where n_id=".$id;
	
		return SQLHelper::getInstance()->execute($sql);
	}
	
	return 0;
}
/**
 * 更新转发
 * @param $id
 * @author 沈家盛
 */
function updateForwarding($id){
	
	if(is_numeric($id)){
		$sql = "update t_news set n_forwarding_number=n_forwarding_number+1 where n_id=".$id;
	
		return SQLHelper::getInstance()->execute($sql);
	}
	
	return 0;
}

?>