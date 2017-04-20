<?php 

require('../plugins.php');

$type=114;

if(!empty($_REQUEST['type'])){
	$type = $_REQUEST['type'];
}
$list = getProductList4($type);

?>
 
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<meta http-equiv="Cache-Control" content="no-cache"/>
<title><?php echo WEB_NAME;?></title>
<meta name="keywords" content="<?php echo WEB_KEYWORD;?>" />
<meta name="description" content="<?php echo WEB_DESCRIBE;?>" />
<meta name="apple-touch-fullscreen" content="yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="format-detection" content="telephone=no" />
<script src="http://www.0573sg.com/jquery-1.9.1.min.js" type="text/javascript" language="javascript"></script>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport">
<link href="css/wap_touch.css?_v=201401012"  rel="stylesheet" type="text/css" />
<script src="js/wap_touch.js?_v=20131204" type="text/javascript" language="javascript"></script>
</head>

<body>
<div style="padding:10px;">
	<div class="logo">
		<a href="" title="嘉兴水果网"><img src="http://www.0573sg.com/images/logo_green.png" height="35" alt="嘉兴水果网"/></a>
		<a href="list.php" class="abtd">首页</a>
	</div>
</div>
<img src="images/login.jpg" width="100%"/>
<div>
	<table aligh="center" style="padding-top:30px;padding-left:30px;">
		<tr>
			<td width="60" align="right">手机号:</td>
			<td><input type="text" name="mobile" id="mobile" value=""/></td>
		</tr>
		<tr>
			<td align="right">密码:</td>
			<td><input type="text" name="mobile" id="mobile" value=""/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="立刻登录"/></td>
		</tr>
	</table>
</div>
</body>
</html>
