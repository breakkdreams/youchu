<?php
//  获取毫秒的时间戳  
$time = explode ( " ", microtime () );  
$time = $time [1] . ($time [0] * 1000);  
$time2 = explode ( ".", $time );  
$time = $time2 [0];  

echo $time;
?>