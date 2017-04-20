<?php
	/**
	 * 获取map中的数值类型的值
	 * @param $map
	 * @param $key
	 */
	function getNumber($map,$key){
		//如果map或key不存在返回0
		if(empty($map) || empty($key)){
			return '0';
		}
		$var = $map[$key];
		//判断值是不是数字，不是返回0
		if(!is_numeric($var)){
			return '0';
		}
		return $var;
	}
	
	/**
	 * 检查map,如果没有值则设置为''
	 * @param $map
	 */
	function checkMap($map){
		if(empty($return)){
			return $map;
		}
		//遍历map
		foreach ($map as $key => $val) {
			//如果没有值，则设为''
			if(!isset($val)&&empty($val)){
		   		$map[$key]="";
			}
		}
		return $map;
	}