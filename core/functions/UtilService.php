<?php
/**
 * 工具类
 */

/**
 * 以逗号分隔的形式获取数组信息
 */
function getArrayStr($col,$colstr){
	foreach($col as $value){
		 if(''==$colstr){
			 $colstr.=$value;    	        	
		  }else{
			  $colstr.=",".$value;
	      }
	}
	return $colstr;
}
/**
 *拆分数组
 */
function getArray($array,&$arr1,$index1,&$arr2,$index2){
	foreach($array as $value){
		$arr1[]=$value[$index1];
		$arr2[]=$value[$index2];
	}
}
function getLength($num){
	$num=floor(abs($num));
	$countor=0;
	while($num/10>0){
		$countor++;
		$num/=10;
		$num=floor($num);
		if($countor>10){
			break;
		}	
	}
	return $countor;	
}
/**
 * 分页
 */
function getPage($page){
	if(is_numeric($page)){
		if($page<1){
			return ' limit 0,20 ';
		}else{
			return ' limit '.(($page-1)*20).',20 ';
		}
	}else{
		return ' limit 0,20 ';
	}
}
function myREQUEST($key){
	
	$v = $_REQUEST[$key];
	
	if(!empty($v)){
		
		if(!get_magic_quotes_gpc()){
			$lastname = addslashes($v);
		}else{
			$lastname = $v;
		}
		
		return htmlentities($lastname, ENT_QUOTES, 'UTF-8');
	}
	
	return '';
}

function myPOST($key){
	
	$v = $_POST[$key];
	
	if(!empty($v)){
		
		if(!get_magic_quotes_gpc()){
			$lastname = addslashes($v);
		}else{
			$lastname = $v;
		}
		
		return htmlentities($lastname, ENT_QUOTES, 'UTF-8');
	}else{
		if(is_numeric($v)&&$v==0){
			return 0;	
		}
	}
	
	return '';
}

function myGET($key){
	
	$v = $_GET[$key];
	
	if(!empty($v)){
		
		if(!get_magic_quotes_gpc()){
			$lastname = addslashes($v);
		}else{
			$lastname = $v;
		}
		
		return htmlentities($lastname, ENT_QUOTES, 'UTF-8');
	}
	
	return '';
}
?>