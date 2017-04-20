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
        	<div class="confirmBox">	
        		{if $ret eq '1'}
                <p class="confirm_p"><img style="margin-left:300px; margin-right:20px;" src="images/ok.png" />交易成功！宝贝等您来评价</p>
                <p class="confirm_p2">买家小伙伴很关注你的点评，帮助他们购买哦<a href="member_comment.php?id={$order_id}">【立即评价】</a></p>
				<p class="confirm_p2">亲，交易成功后，如果商品出现问题，请拨打<span>热线电话:&nbsp;400-125-125</span>&nbsp;&nbsp;或&nbsp;联系&nbsp;<span>QQ:1234567</span>，享受相应的售后服务。</p>
				{else if $ret eq '2'}
				<p class="confirm_p"><img style="margin-left:300px; margin-right:20px;" src="images/ok.png" />亲！宝贝已经确认。</p>
                <p class="confirm_p2">亲，交易成功后，如果商品出现问题，请拨打<span>热线电话:&nbsp;400-125-125</span>&nbsp;&nbsp;或&nbsp;联系&nbsp;<span>QQ:1234567</span>，享受相应的售后服务。</p>
				{else}
				<p class="confirm_p"><img style="margin-left:300px; margin-right:20px;" src="images/failno.png" />网络不给力，提交失败，请重试！</p>
                <p class="confirm_p2">亲，如果有问题，请拨打<span>热线电话:&nbsp;400-125-125</span>&nbsp;&nbsp;或&nbsp;联系&nbsp;<span>QQ:1234567</span>，享受相应的售后服务。</p>
				{/if}
            </div>  
        </div>
		<div class="payWay">
        
        </div>
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
