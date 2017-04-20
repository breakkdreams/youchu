<?php
final class StringUtil {
	
	static public function pagePrint($str){
		print($str);
	} 
	
	static public function ihtmlspecialchars($string)
	{
	 $string = preg_replace('/&amp;((#(d{3,5}|x[a-fa-f0-9]{4})|[a-za-z][a-z0-9]{2,5});)/', '&\1',
	  str_replace( array('&amp;', '&quot;', '&lt;', '&gt;'),array('&', '"', '<', '>'), $string));
	  
	  return $string;
	}
	
	static public function unihtmlspecialchars($string)
	{
	 $string = preg_replace('/&amp;((#(d{3,5}|x[a-fa-f0-9]{4})|[a-za-z][a-z0-9]{2,5});)/', '&\1',
	  str_replace( array('&', '"', '<', '>'),array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
	  
	  return $string;
	}
	
	static public function unihtml($string)
	{
	 $string = str_replace("&amp;",'&',$string); 
	 $string = str_replace("&quot;",'"',$string);
	 $string = str_replace("&lt;",'<',$string);
	 $string = str_replace("&gt;",'>',$string);	
	 $string = str_replace("\\",'',$string);
	 
	  return $string;
	}
	
	static public function GBsubstr($string, $start, $length) {
		if(strlen($string)>$length){
		   $str=null;
		   $len=$start+$length;
		   for($i=$start;$i<$len;$i++){
		    if(ord(substr($string,$i,1))>0xa0){
		     $str.=substr($string,$i,2);
		     $i++;
		    }else{
		     $str.=substr($string,$i,1);
		    }
		   }
		   return $str.'...';
		}else{
		   return $string;
		}
	}
	
	static public function indexOf($str,$key){
		$pos = strpos($str, $key);
		return $pos;	
	}
	
	static function html2txt($document){
	  $search = array('@<script[^>]*?>.*?</script>@si', // 去掉脚本
	                 '@<style[^>]*?>.*?</style>@siU',    // 去掉css
	                 '@<[\/\!]*?[^<>]*?>@si',            // 去掉html
	                 '@<![\s\S]*?--[ \t\n\r]*>@'        // 去掉ddt头部
	  );
	  $text = preg_replace($search, '', $document);
	  $text = str_replace('\?',' ',$text);	  
	  return $text;
	} 
		
	
}