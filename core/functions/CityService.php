<?php
/**
 * 城市列表
 * @param $brand
 */
function getCityList(){
	
	$sql = "select city_name,city_initial from shop_city order by city_initial ";
	
	return SQLHelper::getInstance()->query($sql);
}

/**
 * 省列表
 * @param $brand
 */
function getProvincesInfo(){
	
	$sql = "select  REGION_ID,REGION_NAME,PARENT_ID from t_area where region_level=1 ";
	
	return SQLHelper::getInstance()->query($sql);
} 
/**
 * 市列表
 * @param $brand
 */
function getCitiesList(){
	
	$sql = "SELECT  REGION_ID,REGION_NAME,PARENT_ID FROM t_area where region_level=2 ";
	
	return SQLHelper::getInstance()->query($sql);
}
/**
 * 区列表
 * @param $brand
 */
function getAreasList(){
	
	$sql = "SELECT  REGION_ID,REGION_NAME,PARENT_ID FROM t_area where region_level=3";
	
	return SQLHelper::getInstance()->query($sql);
}
