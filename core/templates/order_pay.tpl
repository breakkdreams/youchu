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
         <div class="submitOrder">
          <div class="orderRight2">
           	  <div class="order_main2">
                	 <p>【订单详情】</p>
                    <div class="order_Text2" style="margin-left:0">
                    	<p>商品名称：<span>{$product_name}</span></p>
         				<p>订单号：<span>{$map['order_code']}</span></p>
                    </div>
                </div>
            </div>
             <div class="price_Box">
                	<p>{$map['order_price']}元</p>
                </div>
        </div>
        <div class="payWay">
        <p>选择支付方式</p>
        <div class="way_one"><input name="pay_type" type="radio" value="1" /><img src="images/zhifubao.png" /></div>
        <div  class="way_one"><input name="pay_type" type="radio" value="2" /><img src="images/tonglian.png" /></div>
        </div>
        <div class="payBox">
            	<input type="image" src="images/querenzhifu.png" onclick="pay()"/>
            </div>
    </div>
</div>
<div class="main_down">
	{include file="core/templates/bottom.tpl"}
    {include file="core/templates/copyright.tpl"}
</div>
<form name="payto" id="payto" action="http://www.sxking.com/alipay/alipayapi.php" method="post">
<input type="hidden" name="order_code" value="{$order_code}"/>
<input type="hidden" name="order_price" value="{$order_price}"/>
<input type="hidden" name="order_user" value="{$order_user}"/>
<input type="hidden" name="order_address" value="{$order_address}"/>
<input type="hidden" name="order_tel" value="{$order_tel}"/>
<input type="hidden" name="order_phone" value="{$order_phone}"/>
</form>
<script>
function pay(){
	var temp = document.getElementsByName("pay_type");
	var pay_type = "";
  	for(var i=0;i<temp.length;i++)
  	{
     	if(temp[i].checked)
     	{
     		pay_type = temp[i].value;
  		}
	}

	if(pay_type.length==0){
		jAlert("请选择支付方式");
	}
	else if(pay_type=="1"){
		validate();
	}
}
function validate(){
  document.getElementById('payto').submit();
}
</script>
</body>
</html>
