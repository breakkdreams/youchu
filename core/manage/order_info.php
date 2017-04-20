<?php 
require_once("check2.php");

$order_info = getOrderInfo($_REQUEST['member_id'],$_REQUEST['id']);
			
if(!empty($order_info)){
	foreach($order_info as $_order){
		
	}
	
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>叮玲网水果商城</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

  
<table width="100%" align="center">
<tr>
<td>
<div class="gwc">
    <p class="gwc_add" style="padding:30px;font-size:14px;">配送至:<?php echo $_order["get_address"]?> 
    						  <?php echo $_order["get_name"]?>收 
    						  <?php echo $_order["get_phone"]?>
    						  </p>
   <table class="biaoge" style="border:1px solid #aacded; margin:0 auto;" width="94%" border="1" cellspacing="0" cellpadding="0">
  <tbody><tr style=" text-align:center; background:#ebf4fb;">
    <td width="7%" height="23">ID</td>
    <td>商品名称</td>
    <td width="15%">单价</td>
    <td width="10%">商品数量</td>
    <td width="11%">合计</td>
  </tr>  
  <?php foreach($order_info as $map){?>
  <tr>
    <td height="40">10</td>
    <td><?php echo $map["product_name"]?></td>
    <td>￥<?php echo $map["product_price1"]?></td>
    <td align="center" valign="middle"><?php echo $map["product_acount"]?></td>
    <td><a href="#">￥<?php echo ($map["product_price1"]*1)*$map["product_acount"]?></a></td>
  </tr>  
  <?php }?>
  <tr>
    <td height="52" colspan="7" style="text-align:right;background:#ebf4fb;">
      <p>订单总价：<span>￥<?php echo $_order["order_price"]?></span>元&nbsp;&nbsp;</p></td>
    </tr>
</tbody></table>
      
    
 </div>
</td>
</tr>
</table>
  



</body>
</html>
