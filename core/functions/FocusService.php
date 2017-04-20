<?php
/**
 * 焦点信息维护
 * Version: 1.0
 * Author: sunwei
 * Date: 2013-06-15
 */

/**
 * 创建焦点新闻
 * @param $f_name 焦点图片
 * @param $f_title 焦点标题
 * @param $f_set 焦点排序
 * @param $url 焦点链接
 * @param $describe 描述
 * @param $m_id 栏目ID
 */
function createFocus($f_name="",$f_title,$f_set='0',$url="",$describe="",$m_id='0'){
	$sql = "insert into t_focus(f_name,f_title,f_set,f_url,f_time,f_display,f_describe,m_id) 
			 values('$f_name','$f_title','$f_set','$url',now(),0,'$describe','$m_id')";
	
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 更新焦点新闻
 * @param $id
 * @param $f_name 焦点图片
 * @param $f_title 焦点标题
 * @param $f_set 焦点排序
 * @param $url 焦点链接
 * @param $describe 描述
 * @param $m_id 栏目ID
 */
function updateFocus($id,$f_name="",$f_title,$f_set='0',$url="",$describe="",$m_id='0'){
	$sql = "update t_focus set f_name='$f_name',f_title='$f_title',f_set='$f_set',
			f_url='$url',f_describe='$describe',m_id='$m_id' where f_id=".$id;
	
	$logger = Logger::getLogger("focus");
	$logger->debug($sql);
	
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 获取最新的焦点新闻
 * @param $limit
 */
function getFocusLimit($limit){
	$sql = "select f_id,f_name,f_title,f_set,f_url,f_time,f_display,f_describe from t_focus order by f_set desc,f_id desc limit ".$limit;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取指定类别的焦点新闻
 * @param $limit
 * @param $type
 */
function getFocusTypeLimit($limit,$type=''){
	$sql = "select f_id,f_name,f_title,f_set,f_url,f_time,f_display,f_describe from t_focus where m_id='$type' order by f_set desc,f_id desc limit ".$limit;
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 获取指定焦点信息
 * @param $id
 */
function getFocusById($id){
	$sql = "select f_id,f_name,f_title,f_set,f_url,f_time,f_display,f_describe,m_id from t_focus where f_id='$id' ";
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 删除焦点新闻
 * @param $id
 */
function deleteFocus($id){
	$sql = "delete from t_focus where f_id=".$id;
	
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 设置广告是否显示
 * @param $id
 * @param $v
 */
function updateFocusDisplay($id,$v='0'){
	
	$sql = "update t_focus set f_display='".$v."' where f_id=".$id;
	
	return SQLHelper::getInstance()->execute($sql);
}

/**
 * 获取要显示的焦点
 */
function getFocusDisplay(){
	$sql = "select f_id,f_name,f_title,f_set,f_url,f_time,f_display,f_describe,m_id from t_focus where f_display=1 order by f_set desc,f_id desc";
	
	return SQLHelper::getInstance()->query($sql);
}
?>