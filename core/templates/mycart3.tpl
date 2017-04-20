<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include file="header.tpl"}
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/color.css" rel="stylesheet" type="text/css" />
<link href="css/link.css" rel="stylesheet" type="text/css" />
<link href="css/lrtk.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.2.6.pack.js" type=text/javascript></script>
<script src="js/base.js" type=text/javascript></script>
<script type="text/javascript" src="js/js.js"></script>
<script>
function odCancel(){
	if (!confirm("是否确认删除？")){ 
        
    }else{
    	document.getElementById("orderCancel").submit();
    }
}
</script>
</head>

<body>
{include file="menu.tpl"}



<div class="container" id="main">
<div class="mycart_title">
<div class="ding"><img src="images/ding3.gif" width="657" height="32" /></div>
完成定单
</div>

<div class="mycart3">
{if 1==$order['pay_type']}
<div class="gwc2">
      <div class="gwc2_t" >亲，您的订单已生效，我们将尽快送达收货人，感谢您再次光临水果网！</div>
      <div class="gwc2_p"><span>货物将寄送至:</span>{$order['get_address']} {$order['get_name']}收 {$order['get_phone']}</div>
</div>
{/if}
{if 0==$order['pay_type']}
<p>您已成功提交定单，需要付款<span style="font-size:24px; color:#F00;">{$order['order_price']}元！</span></p>
<div><p>寄送至:{$order['get_address']}  {$order['get_name']}收 {$order['get_phone']} {$order['get_tel']}</p></div>
<div class="mycart3_link">
<form name="orderCancel" id="orderCancel" action="shop_do.php" method="post">
<input type="hidden" name="order_id" value={$order_id} />
<input type="hidden" name="act" value="orderCancel"/>
<a href="javascript:odCancel();">删除订单</a> | <a href="#">订单详情</a> | <a href="#">联系卖家</a>
</form></div>
{/if}
</div>
<div class="clear"></div>
{if $order['order_state']=='0'} 
    <form name="kqPay" action="https://www.99bill.com/gateway/recvMerchantInfoAction.htm" method="post">
		<input type="hidden" name="inputCharset" value="{$inputCharset}" />
		<input type="hidden" name="pageUrl" value="{$pageUrl}" />
		<input type="hidden" name="bgUrl" value="{$bgUrl}" />
		<input type="hidden" name="version" value="{$version}" />
		<input type="hidden" name="language" value="{$language}" />
		<input type="hidden" name="signType" value="{$signType}" />
		<input type="hidden" name="signMsg" value="{$signMsg}" />
		<input type="hidden" name="merchantAcctId" value="{$merchantAcctId}" />
		<input type="hidden" name="payerName" value="{$payerName}" />
		<input type="hidden" name="payerContactType" value="{$payerContactType}" />
		<input type="hidden" name="payerContact" value="{$payerContact}" />
		<input type="hidden" name="orderId" value="{$orderId}" />
		<input type="hidden" name="orderAmount" value="{$orderAmount}" />
		<input type="hidden" name="orderTime" value="{$orderTime}" />
		<input type="hidden" name="productName" value="{$productName}" />
		<input type="hidden" name="productNum" value="{$productNum}" />
		<input type="hidden" name="productId" value="{$productId}" />
		<input type="hidden" name="productDesc" value="{$productDesc}" />
		<input type="hidden" name="ext1" value="{$ext1}" />
		<input type="hidden" name="ext2" value="{$ext2}" />
		<input type="hidden" name="payType" value="{$payType}" />
		<input type="hidden" name="bankId" value="{$bankId}" />
		<input type="hidden" name="redoFlag" value="{$redoFlag}" />
		<input type="hidden" name="pid" value="{$pid}" />	
		<div class="mycart2_submit"><input type="submit" name="submit" class="button7" value="";/></div>
	</form>
    <div class="clear"></div>
    <!-- <div class="btn"><img src="images/zifu.gif" width="134" height="39" /></div> -->
    {/if}
</div>

{include file="footer.tpl"}
</body>
</html>
