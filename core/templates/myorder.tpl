<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$head_title}</title>
<meta name="Keywords" content="{$WEB_KEYWORD}" />
<meta name="Description" content="{$WEB_DESCRIBE}" />
<link href="css/showcart.css" rel="stylesheet" type="text/css" />
<link href="css/all_global.css" rel="stylesheet" type="text/css" />
<link href="css/firstpage.css" rel="stylesheet" type="text/css" />
<script src="js/analytics.js"></script>
<script src="js/jquery-1.6.2.js" type="text/javascript"></script>
<script src="js/topnavi.js" type="text/javascript"></script>
<script charset="UTF-8" src="js/bundle.js"></script>
<script charset="UTF-8" src="js/iframeWidget.js"></script>
<script type="text/javascript" charset="UTF-8" src="js/bw.js"></script>
</head>

<body>
{include file="menu.tpl"}
<div class="showcartcon">
<div class="showcarttitle"><img src="images/logo_login.png" /></div>
<div class="showall">
<div  >

<div style="height:55px; line-height:55px; margin-top:10px; font-size:20px; background:url(images/win_top.jpg) no-repeat 5px; padding-left:65px;">您的订单已递交成功，订单号:<span class="green" style="font-weight:bold;">{$code}</span>&nbsp;&nbsp;支付金额:<span class="red" style="font-weight:bold; font-size:24px;">￥{$map['order_price']}</span>&nbsp;&nbsp;<a href="index.html" class="yellow">返回首页</a></div>
<div style="height:55px; line-height:55px; margin-top:10px; font-size:20px; ">
	&nbsp;支付方式1：货到付款 (默认)
</div>
<div style="height:55px; line-height:55px; margin-top:10px; font-size:20px; ">
	&nbsp;支付方式2：支付宝支付<img src="images/fu.png"/>&nbsp;&nbsp;<a href="javascript:validate();" class="red"><img src="images/just.jpg"/></a>
</div>
<div style="height:55px; line-height:55px; margin-top:10px; font-size:20px; ">
	&nbsp;<span style="color:#FF0000;">友情提醒：支付宝支付成功后请勿关闭网页。请耐心等待系统返回官网更新订单状态。</span>
</div>
<div style="height:55px; line-height:55px; margin-top:10px; font-size:20px; "><img src="images/png-0706.png" width="60" height="60" /> 联系电话:<span class="red" style="font-weight:bold; font-size:24px;">0573-83965184</span></div>
</div>




<div class="clear"></div>
</div>

{include file="footer.tpl"}
</div>
<form name="payto" id="payto" action="http://www.0573sg.com/alipay/alipayapi.php" method="post">
<input type="hidden" name="order_code" value="{$code}"/>
<input type="hidden" name="order_price" value="{$map['order_price']}"/>
<input type="hidden" name="order_user" value="{$map['get_name']}"/>
<input type="hidden" name="order_address" value="{$map['get_address']}"/>
<input type="hidden" name="order_tel" value="{$map['get_tel']}"/>
<input type="hidden" name="order_phone" value="{$map['get_phone']}"/>
</form>
<script>
function validate(){
  document.getElementById('payto').submit();
}
</script>
</body>
</html>
