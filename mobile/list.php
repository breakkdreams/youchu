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
<!--正式-->
<div class="topbar">
	<div class="s_t1">
		<img src="" width="2" height="44" border="0" />
		<span class="mycart_title">购物车</span>
		<img src="" width="2" height="44" border="0" />
		<input type="text" name="my_cart" id="my_cart" value="0" style="width:30px;"/>
		<img src="" width="2" height="44" border="0" />
		<span class="mycart_title">件</span>
		<a class="more" href="javascript:"><img src="images/s_t1_m.gif" width="43" height="32" border="0" onclick="toggle(this, 'popnav', '', '')" /></a>
	</div>
	<div id="popnav" class="popnav" style="display:none;">
		<div class="tag_con_a">
			<ul>
				<li class="pops"><a href="http://www.0573sg.com/mobile/list.php?type=113" $onpop[recipe]>国产类</a></li>
				<li><a href="http://www.0573sg.com/mobile/list.php?type=114" $onpop[recipetype]>进口类</a></li>
				<li><a href="http://www.0573sg.com/mobile/list.php?type=112" $onpop[collect]>鲜果区</a></li>
				<li><a href="" $onpop[search]>会员中心</a></li>
			 
				<li class=""><a href="http://www.0573sg.com/mobile/list.php?type=121" $onpop[ingredient]>宝宝类</a></li>
				<li><a href="http://www.0573sg.com/mobile/list.php?type=120" $onpop[shucailei]>孕妇类</a></li>
				<li><a href="http://www.0573sg.com/mobile/list.php?type=122" $onpop[rql]>老人类</a></li>
				<li><a href="http://www.0573sg.com/mobile/list.php?type=112" $onpop[mmdr]>上班族</a></li>

			</ul> 
		</div>
	</div>
</div>

<div class="header">
	<div class="logo"><a href="" title="嘉兴水果网"><img src="http://www.0573sg.com/images/logo_green.png" height="35" alt="嘉兴水果网"/></a></div>
	<div class="unav">
		<a href="login.php" class="abtd">登录</a> <a href="" class="abt">注册</a>
	</div>
</div>

<!--正式-->


	<h1>水果大全</h1>
	<fieldset class="tabline">
		<legend><a href=""  class="ontab">按发表时间</a> <a href="" >按热门度</a> <a href="" >精选果品</a></legend>
	</fieldset>
	
<div class="mlist">
	<ul>
		<?php 
		if(!empty($list)){
		
		foreach($list as $map){
		?>
		<li>
		<a href="">
			<div class="pic"><img src="http://www.0573sg.com/<?php echo $map['product_pic']?>" width="80" height="80" alt="" /></div>
			<div class="detail">
				<h2><?php echo $map['product_name'];?></h2>
				<p class="p2line"> 市场价:<?php echo $map['product_price2'];?>元 &nbsp; 网友价格:<span style="font-size:14px;color:red;font-weight:800"><?php echo $map['product_price1'];?></span>元 </p>
				<p class="p2view" style="line-height:25px;display:none;"><img src="http://www.0573sg.com/images/jia.jpg"  style="line-height:25px;"/></p>
			</div>
		</a>
		</li>
		<?php 
			}
		}
		?>
		</ul>
</div>
</body>
</html>
