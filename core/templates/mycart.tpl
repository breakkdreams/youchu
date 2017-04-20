<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>购物车</title>
<link href="css/showcart.css" rel="stylesheet" type="text/css" />
<link href="css/all_global.css" rel="stylesheet" type="text/css" />
<link href="css/firstpage.css" rel="stylesheet" type="text/css" />
<style>
.mycartheight{ height:40px; line-height:40px;}
</style>
<script src="js/analytics.js"></script>
<script src="js/jquery-1.6.2.js" type="text/javascript"></script>
<script src="js/topnavi.js" type="text/javascript"></script>
<script charset="UTF-8" src="js/bundle.js"></script>
<script charset="UTF-8" src="js/iframeWidget.js"></script>
<script type="text/javascript" charset="UTF-8" src="js/bw.js"></script>
<script>
function cutnum(id){
	var num = document.getElementById("num_"+id).value;

	if(num>0){
		num = num*1-1;

		if(num==0){
			num=1;
		}
		
		document.getElementById("num_"+id).value=num;
	}

	checkInt(id, num);
}

function addnum(id){
	var num = document.getElementById("num_"+id).value;

	if(num>0){
		num = num*1+1;
		document.getElementById("num_"+id).value=num;
	}else if(num==0){
		document.getElementById("num_"+id).value=1;
	}

	checkInt(id, num);
}

function delitem(id){
	if (!confirm("是否确认删除？")){ 
        
    }else{
    	window.location="shop_do.php?act=delitem&session_id="+id;
    }
}

//计算购物车总价
function checkInt(id, value) {
    //如果为空，则通过校验 
    if (value == "")
        return true;

    if((value*1)<1){
		alert("数量必须大于0");
		if (document.getElementById(id) != null) {
            document.getElementById(id).focus();
        }
		return false;
    }else if (/^(\-?)(\d+)$/.test(value)) {


    	var cartlist = document.getElementById("cart_list").value;

		var item = cartlist.split(",");
		
		var _total = 0;
		
		if(item.length>0){
			
			for(var i=0;i<item.length;i++){
				var price = document.getElementById("price_"+item[i]).value;
				
				var num = document.getElementById("num_"+item[i]).value;
				
				var temp = (price*1)*num;

				_total = _total+temp;
				
			}

			document.getElementById("total_price").innerHTML=_total;
			document.getElementById("order_price").innerHTML=_total;
		}

		
        
        return true;
    } else {
        alert("该输入正确数量");
        if (document.getElementById(id) != null) {
            document.getElementById(id).focus();
        }
        return false;
    }
}
function check(){
	var name = document.getElementById("get_name").value;
	var phone = document.getElementById("get_phone").value;
	var tel = document.getElementById("get_tel").value;
	var address = document.getElementById("get_address").value;

	if(name.length==0){
		alert("请输入联系人");
		return false;
	}else if(phone.length==0 && tel.length==0){
		alert("请输入联系方式");
		return false;
	}else if(address.length==0){
		alert("请输入收货地址");
		return false;
	}
}
</script>
</head>

<body>
{include file="menu.tpl"}

<div class="showcartcon">
<div class="showcarttitle"><img src="images/logo_login.png"></div>
<div class="showall">
<div class="showalltitle">

<div class="showleft">我的购物车</div>
</div>
{if $total!=null}
<form name="form1" id="form1" action="shop_do.php" method="post" onsubmit="return check();">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
  <tr class="showtabletitle">
    <td width="11%" height="40"></td>
    <td width="27%" class="size14">商品</td>
    <td width="8%">规格</td>
    <td width="9%">原价</td>
    <td width="6%" class=" fontweight" style="font-size:14px;">单价</td>
    <td width="15%" colspan="3">数量</td>
    <td width="7%"> 操作 </td>
  </tr>
  {foreach name=list item=item from=$list}
  <tr class="tableline">
    <td height="90"><a href="item-{$item['product_id']}.html" target="_blank"><img src="{$item['product_pic']}" width="70" height="70" /></a></td>
    <td class="size14"><a href="item-{$item['product_id']}.html" target="_blank">{$item['product_name']}</a></td>
    <td>{$item['product_units']}</td>
    <td>￥{$item['product_price2']} </td>
   <td class="red fontweight">¥{if empty($item['type_price'])} {$item['product_price1']} {else}  {$item['type_price']} {/if}
    	<input type="hidden" name="price" id="price_{$item['cart_id']}" value="{if empty($item['type_price'])}{$item['product_price1']}{else}{$item['type_price']}{/if}"/></td>
    <td ><img onclick="cutnum({$item['cart_id']})" src="images/bag_close.gif" /></td>
    <td ><input id="num_{$item['cart_id']}" name="num_{$item['cart_id']}" type="text" value="{$item['cart_acount']}"  style="width:30px; text-align:center;"  onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"/></td>
   
    <td ><img onclick="addnum({$item['cart_id']})" src="images/bag_open.gif" /></td>
    
    <td><a href="javascript:void(0)" onclick="delitem('19821222i19830219_{$item['cart_id']}')" class="blue">删除</a></td>
  </tr>
  {/foreach}
</table>

<div class="clear"></div>


<div class="add-cart-right">
<input type="hidden" name="order_price" id="order_price" value="{$total}"/>
<input type="hidden" name="product_list" id="product_list" value="{$cartlist}"/>
<input type="hidden" name="act" value="dobuy"/>
<input type="hidden" name="cart_list" id="cart_list" value="{$cartlist}"/>
<p><span id="basketListTotal"  style="line-height:30px;font-size:14px;">商品金额总计(不包含运费)：¥ <font color="red" style="font-size:18px;font-weight:700"><span id="total_price">{$total}</span>元</font></span></p>
</div>

<div class="showalltitle" style="border-top:1px dotted #ccc;">

<div class="showleft">填写并核对订单信息</div>
</div>
<div  style="border:2px solid #66b51c; height:auto; padding:10px 20px;">
<div class="showcart2title"><span class="fontweight">收货人信息</span></div>
<script>
	function changeAddress(id){
		document.getElementById("get_name").value=document.getElementById("name_"+id).value;
		document.getElementById("get_phone").value=document.getElementById("phone_"+id).value;
		document.getElementById("get_tel").value=document.getElementById("tel_"+id).value;
		document.getElementById("get_address").value=document.getElementById("address_"+id).value;
	}
</script>
  {foreach name=list item=item from=$addresslist}
  <div class="mycartheight">
<table width="870" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<td width="30"><input type="radio" name="address_radio" onclick="changeAddress('{$item['a_id']}')"/></td>
    <td width="90" class="fontweight">标记:{$item['a_mark']} </td>
    <td width="90">收货人:{$item['a_name']} </td>
    <td width="280">手机号：{$item['a_phone']}  &nbsp;联系电话: {$item['a_tel']}</td>
    <td width="516">收货地址:{$item['a_address']}
    	<input type="hidden" id="name_{$item['a_id']}" name="name_{$item['a_id']}" value="{$item['a_name']}"/>
    	<input type="hidden" id="tel_{$item['a_id']}" name="tel_{$item['a_id']}" value="{$item['a_tel']}"/>
    	<input type="hidden" id="phone_{$item['a_id']}" name="phone_{$item['a_id']}" value="{$item['a_phone']}"/>
    	<input type="hidden" id="address_{$item['a_id']}" name="address_{$item['a_id']}" value="{$item['a_address']}"/>
    </td>
  </tr>
  </table>
</div>
  {/foreach}


<div class="mycartheight"><span class="red">*</span>收 货 人：&nbsp;&nbsp;<input name="get_name" id="get_name" value="{$myinfo['member_realname']}" type="text"  style="border:1px solid #ccc; height:24px; line-height:24px;"/></div>
<div class="mycartheight"><span class="red">*</span>详细地址：<input name="get_address" id="get_address" type="text" value="{$myinfo['member_address']}" style="border:1px solid #ccc;  height:24px; line-height:24px; width:350px;"/></div>
<div class="mycartheight"><span class="red">*</span>手机号码：<input name="get_phone" id="get_phone" type="text" value="{$myinfo['member_phone']}" style="border:1px solid #ccc;  height:24px; line-height:24px;" />&nbsp;&nbsp;或固定电话：<input name="get_tel" id="get_tel" type="text" value="{$myinfo['member_tel']}" style="border:1px solid #ccc; height:24px; line-height:24px;"/>-两者至少填一项</div>
<div class="mycartheight">备&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注：<input name="note" id="note" type="text" style="border:1px solid #ccc;  height:24px; line-height:24px; width:350px;"/></div>

</div>
<div style="clear"></div>
<div class="add-cart">
<div class="add-cart-right">
<br>
<ul class="btn-add">
         <li><a href="index.html" class="btn-cart02"><img src="images/btn-cart02.jpg" /></a></li>              
           <li style="margin-right:0px;"><a href=""  class="btn-cart01"><input type="image" src="images/btn-cart01.jpg" /></a></li>
                 
        </ul>
      </div>
    </div>
</form>
{else}
<p style="padding-left: 20px;padding-bottom: 20px;"><span style="font-size:22px;color:green;">购物车中没有内容，赶紧去<a href="index.html" style="color:red;font-weight:800">逛逛</a>吧！</span></p>
{/if}
<div class="recommended">
<div class="rectitle">果友力荐凑单鲜果</div>
<div class="slider">
<ul>
{foreach name=list item=item from=$recommended}
<li>
<p><a href="item-{$item['product_id']}.html"><img src="{$item['product_pic']}" /></a></p>
<p class="big-zi"><a href="item-{$item['product_id']}.html">{$item['product_name']}</a></p>
<p>{$item['product_units']}</p>
<p class="green01"><span class="gray_jrz">￥{$item['product_price1']}</span></p> 
</li>
{/foreach}
</ul>
<div class="clear"></div>
</div>
</div>


</div>
</div>
{include file="footer.tpl"}
</body>
</html>
