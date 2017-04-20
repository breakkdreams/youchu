<?php

	/**
	 * 检查map,如果没有值则设置为''
	 * @param $map
	 */
	function setDateState($map,$key){
		if(empty($map)||empty($key)){
			return $map;
		}
		$return = array();
		foreach ($map as $k=>$val) {
			foreach ($key as $k1s=>$val1) {
				$val[$val1.'_str']=date("Y-m-d",$val[$val1]);			
			}
			array_push($return,$val);
		}
		return $return;
	}