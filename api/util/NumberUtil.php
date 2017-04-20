<?php
/*	function setFloatToStringByList($list,$key){
		//判断list和key是否存在
		if(empty($list)||empty($key)){
			return $list;
		}
		$return = array();
		//遍历list
		foreach ($list as $map) {
			//遍历map
			foreach ($map as $k=>$val) {
				//遍历key
				foreach($key as $k1=>$val2){
					//判断key的val和map的key是否相等
					if($val2==$k){
						//获取float
						$money = $map[$k];
						//四舍五入存入map
						$map[$k]=sprintf("%.2f", $money);
					}
				}
			}
			array_push($return,$map);
		}
		return $return;
	}
	function setFloatToStringByMap($map,$key){
		//判断map和key是否存在
		if(empty($map)||empty($key)){
			return $map;
		}
		//遍历map
		foreach ($map as $k=>$val) {
			//遍历key
			foreach($key as $k1=>$val2){
				//判断key的val和map的key是否相等
				if($val2==$k){
					//获取float
					$money = $map[$k];
					//四舍五入存入map
					$map[$k]=sprintf("%.2f", $money);
				}
			}
		}
		return $map;
	}
*/
