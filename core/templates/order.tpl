
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
                ><a href="">提交订单</a></p>
        </div>
        <div class="shopping_address">
        	<p class="shP">收货地址</p>
        	{foreach name=list item=item from=$addresslist}
        	<div class="addressList ">
            <input name="address" type="radio" value="{$item['a_name']},{$item['a_phone']},{$item['a_tel']},{$item['a_address']},{$item['a_mark']}" onchange="selectAddress(this.value)"/>
            <img src="images/fu.png" />
            <p class="peopleP xuanzeP">{$item['a_name']}</p>
            <p  class="phoneP xuanzeP">{$item['a_phone']} {$item['a_tel']}</p>
            <p class="address xuanzeP" >{$item['a_address']}</p>
            </div>            
            {/foreach}
            <input style=" margin-left:550px; margin-right:400px;" type="image" src="images/add.png" onclick="window.location.href='member_address.php'"/>
        </div>
        <div class="shopping_main">
        	<div class="shopping_title"  style="background-image:url(images/line.png); background-position:bottom; background-repeat:repeat-x">
            	<p class=" chooseP shoppingP"><a class="shoppingA" href="">确认订单</a></p>
            </div>
            <div class="shopping_Box" style="padding-bottom:40px; margin-top:0">
            	<div class="shopping_list">
                	<p class="p_one">商品信息</p>	
                    <p class="p_two">单价（元）</p>
                    <p class="p_three">数量</p>
                    <p class="p_four">小计（元）</p>
                </div>
                {foreach name=list item=item from=$list}
                <div class="shopping_infor">
                	<p class="p_one" style="line-height:40px; float:left;">
                    	<img src="{$item['product_pic']}" /><a class="inforA" style="float:left" href="">{$item['product_name']}</a>
                    </p>
                    <p class="p_two p_price_now">{$item['product_price1']}<span>{$item['product_price2']}</span></p>
                    <p class="p_three ">{$price_array[$item['product_id']]}</p>
                    <p class="p_four p_price">￥<font style="font-size:16px;" id="p_{$smarty.foreach.list.iteration}">{$price_array[$item['product_id']]*$item['product_price1']}</font></p>
                </div>
                {/foreach}
                
                 <div class="supplement">
                	<div class="buyersMessage">
                		<p>买家留言：</p>
                    	<div><textarea class="message_text" name="message" id="message" placeholder="选填，可填写您的要求"></textarea></div>
                	</div>
                    <div class="alldetail">
                    	<div class="detail_item">
                        	<p class="item_P">配送方式：</p>
                            <div class="itemBox">
                            <div class="delivery"><input name="send_type" type="radio" value="快递配送" onchange="selectSendType(1)"/>快递配送
                            <p class="fareP" id="wlf">0元</p>
                            </div>
                            <div class="delivery"><input name="send_type" type="radio" value="货到付款" checked="checked" onchange="selectSendType(0)"/>货到付款</div>
                            </div>
                        </div>
                        <div class="detail_item">
                        	<p class="item_P">发货时间：</p>
                            <div class="itemBox">
                            	<p class="rightText">卖家承诺在买家付款后，24小时内发货</p>
                            </div>
                        </div>
                        <div class="detail_item">
                        	<p class="item_P">发票抬头：</p>
                            <div class="itemBox">
                            	<p id="fp_show" class="rightText">嘉兴巴顿软件科技有限公司</p>
                            	<input id="fp_text" type="text" name="fp" id="fp" value="嘉兴巴顿软件科技有限公司" style="width:200px;display:none"/>
                            	<input id="fp_btn" type="button" value="修改" style="display: none" onclick="javascript:changeFP(2)"/>
                            	<p class="rightText" id="fp_a">&nbsp;<a href="javascript:changeFP(1)">修改</a></p>
                            	<script>
                            		function changeFP(i){
										if(i==1){
											document.getElementById("fp_text").style.display="";
											document.getElementById("fp_btn").style.display="";
											document.getElementById("fp_show").style.display="none";
											document.getElementById("fp_a").style.display="none";
										}else{
											document.getElementById("fp_text").style.display="none";
											document.getElementById("fp_btn").style.display="none";
											document.getElementById("fp_show").style.display="";
											document.getElementById("fp_a").style.display="";

											document.getElementById("fp_show").innerHTML=document.getElementById("fp_text").value;
										}
                            		}
                            	</script>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="shopping_list" style="background-color:#eeeeee; border-bottom:none; height:90px;">
                	<div class="clearBox">
                    	<div class="leftDiv">
                        		
                        </div>
                        <div class="rightDiv">
                        	<p>已选商品（不含运费）<span>￥{$order_total}元</span></p>
                        </div>
                    </div>	
            </div>
            <div class="submitDD">
            	<p><a href="index.php">继续逛逛</a></p>
                <input type="image" src="images/sumitdingdan.png" onclick="check();"/>
            </div>
        </div> 

    </div>
</div>
<div class="main_down">
	{include file="core/templates/bottom.tpl"}
    {include file="core/templates/copyright.tpl"}
</div>
<form action="" name="do_form" id="do_form" method="post">
<input type="hidden" name="order_cmd" value="dosubmit"/>
<input type="hidden" name="get_name" id="get_name" value=""/>
<input type="hidden" name="get_address" id="get_address" value=""/>
<input type="hidden" name="get_tel" id="get_tel" value=""/>
<input type="hidden" name="get_phone" id="get_phone" value=""/>
<input type="hidden" name="get_qq" id="get_qq" value=""/>
<input type="hidden" name="get_zip" id="get_zip" value=""/>
<input type="hidden" name="get_building" id="get_building" value=""/>
<input type="hidden" name="get_time" id="get_time" value=""/>
<input type="hidden" name="order_total" id="order_total" value="{$order_total}"/>
<input type="hidden" name="product_price" id="product_price" value="{$order_total}"/>
<input type="hidden" name="send_price" id="send_price" value="0"/>
<input type="hidden" name="order_message" id="order_message" value=""/>
<input type="hidden" name="order_item" id="order_item" value="{$order_item}"/>
<input type="hidden" name="order_num" id="order_num" value="{$order_num}"/>
<input type="hidden" name="order_price" id="order_price" value="{$order_price}"/>
<input type="hidden" name="order_fp" id="order_fp" value=""/>
<input type="hidden" name="order_code" id="order_code" value="{$order_code}"/>

</form>
<script>
	//选择地址
	function selectAddress(v){
		var item = v.split(',');

		if(item.length==5){
			document.getElementById("get_name").value=item[0];
			document.getElementById("get_phone").value=item[1];
			document.getElementById("get_tel").value=item[2];
			document.getElementById("get_address").value=item[3];
			document.getElementById("get_building").value=item[4];
		}
	}

	//选择物流方式
	function selectSendType(type){
		var p2=0;
		if(1==type){
			p2=5;
			document.getElementById("send_price").value="5";
			document.getElementById("wlf").innerHTML="5元";
		}else{
			document.getElementById("send_price").value="0";
			document.getElementById("wlf").innerHTML="0元";
		}
		
		var p1 = document.getElementById("product_price").value;

		document.getElementById("order_price").value=p1*1+p2;
	}
	
	function check(){
		var get_name = document.getElementById("get_name").value;
		var product_price = document.getElementById("product_price").value;

		if(get_name.length==0){
			jAlert("请填选收货地址信息");
			return false;
		}else if(product_price*1>0){
			document.getElementById("order_fp").value = document.getElementById("fp_show").innerHTML;
			document.getElementById("order_message").value = document.getElementById("message").value;

			document.getElementById("do_form").submit();
		}
	}
</script>
</form>
</body>
</html>
