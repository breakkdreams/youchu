<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include file="core/templates/header.tpl"}
<link href="css/shoppingcar.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="headerBox">
    {include file="core/templates/top.tpl"}
</div>
<div class="mainBox">
	{include file="core/templates/menu.tpl"}
    <div class="bigBox">
    	<div class="shopping_location">
            	<p><a href="">首页</a>
                ><a href="">订单提交失败</a></p>
        </div>
        <div class="submitOrder">
        	<div class="orderLeft" style="margin-top:60px;">
            	<img src="images/failno.png" />
                <p class="order_title">订单提交失败</p>
                <p class="backCar">返回<a href="cart_list.php">购物车</a></p>
            </div>
            <div class="orderRight">
            	<div class="order_main">
                    <div class="order_Text">
                    	<p>失败原因：<span>系统繁忙/库存不足</span></p>
         				<p style="margin-top:20px;">请重新操作</p>
         				<p>或咨询在线客服</p>
                        <p>欢迎致电<img src="images/phone2.png" /><span class="telSpan">4008-112-555</span></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="main_down">
	{include file="core/templates/bottom.tpl"}
    {include file="core/templates/copyright.tpl"}
</div>

</body>
</html>
