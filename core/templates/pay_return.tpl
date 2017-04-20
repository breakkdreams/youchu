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
            	<p><a href="index.php">首页</a>
                ><a href="">订单提交成功</a></p>
        </div>
        <div class="submitOrder" style="background-color:#eff9e5">
        	{if $ret eq '1'}
        	<div class="payment">	
                <p class="ok_p"><img style="margin-left:300px; margin-right:20px;" src="images/ok.png" />恭喜您订单支付成功!</p>
                <p class="ok_p2">您的订单号：<span>105222682224</span></p>
				<p class="ok_p2">如有疑问请拨打热线电话&nbsp;400-125-125&nbsp;&nbsp;QQ:1234567</p>
            </div>  
            {else}
            <div class="payment">	
                <p class="ok_p"><img style="margin-left:300px; margin-right:20px;" src="images/failno.png" />抱歉，支付失败!</p>
                <p class="ok_p2">您的订单号：<span>105222682224</span></p>
				<p class="ok_p2">如有疑问请拨打热线电话&nbsp;400-125-125&nbsp;&nbsp;QQ:1234567</p>
            </div>  
            {/if}
        </div>
		<div class="payWay">
        
        </div>
        <div class="payBox"></div>
    </div>
</div>
<div class="main_down">
	{include file="core/templates/bottom.tpl"}
    {include file="core/templates/copyright.tpl"}
</div>

<script>

</script>
</body>
</html>
