<?php

/**
 * 检测邮件地址合法性
 * @param $inAddress
 */
function checkEmail($inAddress)
{
	return (ereg("^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+",$inAddress));
}

/**
 * 截取中文字符串
 * @param $str
 * @param $start
 * @param $len
 */
function msubstr($str, $start, $len) {
    $tmpstr = "";
    $strlen = $start + $len;
    for($i = 0; $i < $strlen; $i++) {
        if(ord(substr($str, $i, 1)) > 0xa0) {
            $tmpstr .= substr($str, $i, 2);
            $i++;
        } else
            $tmpstr .= substr($str, $i, 1);
    }
    return $tmpstr;
}

/**
 * 截取中文字符串 UTF-8
 * @param $string
 * @param $length
 */
function cutstr($string, $length) {
        preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $info);  
        for($i=0; $i<count($info[0]); $i++) {
                $wordscut .= $info[0][$i];
                $j = ord($info[0][$i]) > 127 ? $j + 2 : $j + 1;
                if ($j > $length - 3) {
                        return $wordscut." ...";
                }
        }
        return join('', $info[0]);
}

/**
 * 获取客户IP地址
 */
function GetIP(){ 
	if(!empty($_SERVER["HTTP_CLIENT_IP"])){
	  $cip = $_SERVER["HTTP_CLIENT_IP"];
	 }
	 elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
	  $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	 }
	 elseif(!empty($_SERVER["REMOTE_ADDR"])){
	  $cip = $_SERVER["REMOTE_ADDR"];
	 }
	 else{
	  $cip = "无法获取！";
	 }
	 return $cip;
} 

/**
 * 获取唯一文件名
 */
function createFileName(){
	$str = microtime ().'-'.rand(0,99999);
	
	//md5($str);
	return substr(md5($str),8,16); 
}

/**
 * 获取文件后缀名
 * @param $file_name
 */
function getFileType($file_name)  
{  
	$retval="";  
	$pt=strrpos($file_name, ".");  
	if ($pt) $retval=substr($file_name, $pt+1, strlen($file_name) - $pt);  
	return ($retval);  
}  

/**
 * 获取中文分页信息
 * @param $page当前页
 * @param $allpage 总记录数
 * @param $where url查询条件参数
 */
function getPageStr($page,$_count,$where,$pagesize){
	$_pageadd=1;
	$_pagered=1;
	$allpage = 1;
	$page_str = '<div class="manu" style="text-align: right">';

	if(($page-1)>=1){
		$page_str = $page_str.'<a href="?page='.($page-1).$where.'"> <  上一页</a>';
	}else{
		$page_str = $page_str.'<span class="disabled"> <  上一页</span>';
	}
 
	if($_count%$pagesize==0){
		$allpage=$_count/$pagesize;	
	}else{
		$allpage=intval($_count/$pagesize)+1;
	}
	
	$page_ary1 = array(0=>0,
					   1=>0,
					   2=>0);
	
    if(($page-3)>1){
    	$page_str = $page_str.'<a href="?page=1'.$where.'">1</a>';
    	$page_str = $page_str.'...';
    }
					   
	for($i=($page-1);$i>0;$i--){
		//echo '<a href="?page='.$i.'">'.$i.'</a>';
		$_pagered++;
		$page_ary1[($_pagered-1)] = $i;
		if($_pagered>3){
			break;
		}
	}
	
	for($i=2;$i>=0;$i--){
		if($page_ary1[$i]!=0){
			$page_str = $page_str.'<a href="?page='.$page_ary1[$i].$where.'">'.$page_ary1[$i].'</a>';	
		}
	}
	
	for($i=$page;$i<$allpage;$i++){
		
		if($i==$page){
			$page_str = $page_str.'<span class="current">'.$page.'</span>';
		}else{
			$page_str = $page_str.'<a href="?page='.$i.$where.'">'.$i.'</a>';
		}
		
		$_pageadd++;
		
		if($_pageadd>3){
			break;
		}
	}
	
	if(($allpage-$page)>2){
		$page_str = $page_str.'...';
	}
		
	if($page==$allpage){
		$page_str = $page_str.'<span class="current">'.$allpage.'</span>';
	}else{
		$page_str = $page_str.'<a href="?page='.$allpage.$where.'">'.$allpage.'</a>';	
	}
	
	
	if(($page+1)<=$allpage){
		$page_str = $page_str.'<a href="?page='.($page+1).$where.'">下一页  > </a>';
	}else{
		$page_str = $page_str.'<span class="disabled">下一页  > </span>';
	}
	$page_str = $page_str.'</div>';
	
	return $page_str;
}

/**
 * 获取中文分页信息 (英文版)
 * @param $page当前页
 * @param $allpage 总记录数
 * @param $where url查询条件参数
 */
function getPageStrEN($page,$_count,$where,$pagesize){
	$_pageadd=1; // 后续页面累计，3页内后续页面链接
	$_pagered=1; // 前页面累计，3页内前页面链接
	$allpage = 1; //总页数
	//计算总页数
	if($_count%$pagesize==0){
		$allpage=$_count/$pagesize;	
	}else{
		$allpage=intval($_count/$pagesize)+1;
	}
	
	$page_str = '<div class="manu" style="text-align: right">';

	//上一页链接判断
	if(($page-1)>=1){
		$page_str = $page_str.'<a href="?page='.($page-1).$where.'"> <  Prev</a>';
	}else{
		$page_str = $page_str.'<span class="disabled"> <  Prev</span>';
	}
 
	//前页链接存放数组，倒叙输出
	$page_ary1 = array(0=>0,
					   1=>0,
					   2=>0);
	
    if(($page-3)>1){
    	$page_str = $page_str.'<a href="?page=1'.$where.'">1</a>';
    	$page_str = $page_str.'...';
    }
					   
	for($i=($page-1);$i>0;$i--){
		//echo '<a href="?page='.$i.'">'.$i.'</a>';
		$_pagered++;
		$page_ary1[($_pagered-1)] = $i;
		if($_pagered>3){
			break;
		}
	}
	
	for($i=2;$i>=0;$i--){
		if($page_ary1[$i]!=0){
			$page_str = $page_str.'<a href="?page='.$page_ary1[$i].$where.'">'.$page_ary1[$i].'</a>';	
		}
	}
	
	//后续页面链接
	for($i=$page;$i<$allpage;$i++){
		
		if($i==$page){
			$page_str = $page_str.'<span class="current">'.$page.'</span>';
		}else{
			$page_str = $page_str.'<a href="?page='.$i.$where.'">'.$i.'</a>';
		}
		
		$_pageadd++;
		
		if($_pageadd>3){
			break;
		}
	}
	
	if(($allpage-$page)>2){
		$page_str = $page_str.'...';
	}
		
	//最后页链接
	if($page==$allpage){
		$page_str = $page_str.'<span class="current">'.$allpage.'</span>';
	}else{
		$page_str = $page_str.'<a href="?page='.$allpage.$where.'">'.$allpage.'</a>';	
	}
	
	//下一页链接判断	
	if(($page+1)<=$allpage){
		$page_str = $page_str.'<a href="?page='.($page+1).$where.'">Next  > </a>';
	}else{
		$page_str = $page_str.'<span class="disabled">Next  > </span>';
	}
	$page_str = $page_str.'</div>';
	
	return $page_str;
}

/**
 * 获取中文分页信息 (英文版)
 * @param $page当前页
 * @param $allpage 总记录数
 * @param $where url查询条件参数
 */
function getHtmlPageStrEN($page,$_count,$where,$pagesize){
	$_pageadd=1; // 后续页面累计，3页内后续页面链接
	$_pagered=1; // 前页面累计，3页内前页面链接
	$allpage = 1; //总页数
	//计算总页数
	if($_count%$pagesize==0){
		$allpage=$_count/$pagesize;	
	}else{
		$allpage=intval($_count/$pagesize)+1;
	}
	
	$page_str = '<div class="manu" style="text-align: center">';

	//上一页链接判断
	if(($page-1)>=1){
		$temp = str_replace("#page#",($page-1),$where);
		$page_str = $page_str.'<a href="'.$temp.'"> <  Prev</a>';
	}else{
		$page_str = $page_str.'<span class="disabled"> <  Prev</span>';
	}
 
	//前页链接存放数组，倒叙输出
	$page_ary1 = array(0=>0,
					   1=>0,
					   2=>0);
	
    if(($page-3)>1){
    	$temp = str_replace("#page#","1",$where);
    	$page_str = $page_str.'<a href="'.$temp.'">1</a>';
    	$page_str = $page_str.'<span style="border:none">...</span>';
    }else if(($page-3)==1){
    	$temp = str_replace("#page#","1",$where);
    	$page_str = $page_str.'<a href="'.$temp.'">1</a>';
    }
					   
	for($i=($page-1);$i>0;$i--){
		//echo '<a href="?page='.$i.'">'.$i.'</a>';
		$_pagered++;
		$page_ary1[($_pagered-1)] = $i;
		if($_pagered>3){
			break;
		}
	}
	
	for($i=2;$i>=0;$i--){
		if($page_ary1[$i]!=0){
			$temp = str_replace("#page#",$page_ary1[$i],$where);
			$page_str = $page_str.'<a href="'.$temp.'">'.$page_ary1[$i].'</a>';	
		}
	}
	
	//后续页面链接
	for($i=$page;$i<$allpage;$i++){
		
		if($i==$page){
			$page_str = $page_str.'<span class="current">'.$page.'</span>';
		}else{
			$temp = str_replace("#page#",$i,$where);
			$page_str = $page_str.'<a href="'.$temp.'">'.$i.'</a>';
		}
		
		$_pageadd++;
		
		if($_pageadd>3){
			break;
		}
	}
	
	if(($allpage-$page)>4){
		$page_str = $page_str.'<span style="border:none">...</span>';
	}
		
	//最后页链接
	if($page==$allpage){
		$page_str = $page_str.'<span class="current">'.$allpage.'</span>';
	}else{
		$temp = str_replace("#page#",$allpage,$where);
		$page_str = $page_str.'<a href="'.$temp.'">'.$allpage.'</a>';	
	}
	
	//下一页链接判断	
	if(($page+1)<=$allpage){
		$temp = str_replace("#page#",($page+1),$where);
		$page_str = $page_str.'<a href="'.$temp.'">Next  > </a>';
	}else{
		$page_str = $page_str.'<span class="disabled">Next  > </span>';
	}
	$page_str = $page_str.'</div>';
	
	return $page_str;
}

/**
 * 获取中文分页信息 (中文版)
 * @param $page当前页
 * @param $allpage 总记录数
 * @param $where url查询条件参数
 */
function getHtmlPageStrCN($page,$_count,$where,$pagesize){
	$_pageadd=1; // 后续页面累计，3页内后续页面链接
	$_pagered=1; // 前页面累计，3页内前页面链接
	$allpage = 1; //总页数
	//计算总页数
	if($_count%$pagesize==0){
		$allpage=$_count/$pagesize;	
	}else{
		$allpage=intval($_count/$pagesize)+1;
	}
	
	$page_str = '<div class="manu" style="text-align: center" id="pagelist">';

	//上一页链接判断
	if(($page-1)>=1){
		$temp = str_replace("#page#",($page-1),$where);
		$page_str = $page_str.'<a href="'.$temp.'"> <  上一页</a>';
	}else{
		$page_str = $page_str.'<span class="disabled"> <  上一页</span>';
	}
 
	//前页链接存放数组，倒叙输出
	$page_ary1 = array(0=>0,
					   1=>0,
					   2=>0);
	
    if(($page-3)>1){
    	$temp = str_replace("#page#","1",$where);
    	$page_str = $page_str.'<a href="'.$temp.'">1</a>';
    	$page_str = $page_str.'<span style="border:none">...</span>';
    }else if(($page-3)==1){
    	$temp = str_replace("#page#","1",$where);
    	$page_str = $page_str.'<a href="'.$temp.'">1</a>';
    }
					   
	for($i=($page-1);$i>0;$i--){
		//echo '<a href="?page='.$i.'">'.$i.'</a>';
		$_pagered++;
		$page_ary1[($_pagered-1)] = $i;
		if($_pagered>3){
			break;
		}
	}
	
	for($i=2;$i>=0;$i--){
		if($page_ary1[$i]!=0){
			$temp = str_replace("#page#",$page_ary1[$i],$where);
			$page_str = $page_str.'<a href="'.$temp.'">'.$page_ary1[$i].'</a>';	
		}
	}
	
	//后续页面链接
	for($i=$page;$i<$allpage;$i++){
		
		if($i==$page){
			$page_str = $page_str.'<span class="current">'.$page.'</span>';
		}else{
			$temp = str_replace("#page#",$i,$where);
			$page_str = $page_str.'<a href="'.$temp.'">'.$i.'</a>';
		}
		
		$_pageadd++;
		
		if($_pageadd>3){
			break;
		}
	}
	
	if(($allpage-$page)>4){
		$page_str = $page_str.'<span style="border:none">...</span>';
	}
		
	//最后页链接
	if($page==$allpage){
		$page_str = $page_str.'<span class="current">'.$allpage.'</span>';
	}else{
		$temp = str_replace("#page#",$allpage,$where);
		$page_str = $page_str.'<a href="'.$temp.'">'.$allpage.'</a>';	
	}
	
	//下一页链接判断	
	if(($page+1)<=$allpage){
		$temp = str_replace("#page#",($page+1),$where);
		$page_str = $page_str.'<a href="'.$temp.'">下一页  > </a>';
	}else{
		$page_str = $page_str.'<span class="disabled">下一页  > </span>';
	}
	$page_str = $page_str.'</div>';
	
	return $page_str;
}

/**
 * 检测文件真实类型
 * @param $filename
 */
function file_type($filename)
{
    $file = fopen($filename, "rb");
    $bin = fread($file, 2); //只读2字节
    fclose($file);
    $strInfo = @unpack("C2chars", $bin);
    $typeCode = intval($strInfo['chars1'].$strInfo['chars2']);
    $fileType = '';
    switch ($typeCode)
    {
        case 7790:
            $fileType = 'exe';
            break;
        case 7784:
            $fileType = 'midi';
            break;
        case 8297:
            $fileType = 'rar';
            break;        
		case 8075:
            $fileType = 'zip';
            break;
        case 255216:
            $fileType = 'jpg';
            break;
        case 7173:
            $fileType = 'gif';
            break;
        case 6677:
            $fileType = 'bmp';
            break;
        case 13780:
            $fileType = 'png';
            break;
        default:
            $fileType = 'unknown: '.$typeCode;
    }

	//Fix
	if ($strInfo['chars1']=='-1' AND $strInfo['chars2']=='-40' ) return 'jpg';
	if ($strInfo['chars1']=='-119' AND $strInfo['chars2']=='80' ) return 'png';

    return $fileType;
}

function getTimeSort(){
	//  获取毫秒的时间戳  
	$time = explode ( " ", microtime () );  
	$time = $time [1] . ($time [0] * 1000);  
	$time2 = explode ( ".", $time );  
	$time = $time2 [0];  
	
	return $time;	
}

function isMobile() {
	// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
	if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
		return true;
	}
	//如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	if (isset ($_SERVER['HTTP_VIA'])) {
		//找不到为flase,否则为true
		return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
	}
	//脑残法，判断手机发送的客户端标志,兼容性有待提高
	if (isset ($_SERVER['HTTP_USER_AGENT'])) {
		$clientkeywords = array (
				'nokia',
				'sony',
				'ericsson',
				'mot',
				'samsung',
				'htc',
				'sgh',
				'lg',
				'sharp',
				'sie-',
				'philips',
				'panasonic',
				'alcatel',
				'lenovo',
				'iphone',
				'ipod',
				'blackberry',
				'meizu',
				'android',
				'netfront',
				'symbian',
				'ucweb',
				'windowsce',
				'palm',
				'operamini',
				'operamobi',
				'openwave',
				'nexusone',
				'cldc',
				'midp',
				'wap',
				'mobile'
		);
		// 从HTTP_USER_AGENT中查找手机浏览器的关键字
		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
			return true;
		}
	}
	//协议法，因为有可能不准确，放到最后判断
	if (isset ($_SERVER['HTTP_ACCEPT'])) {
		// 如果只支持wml并且不支持html那一定是移动设备
		// 如果支持wml和html但是wml在html之前则是移动设备
		if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
			return true;
		}
	}
	return false;
}
?>