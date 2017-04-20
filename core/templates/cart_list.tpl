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
                ><a href="">我的购物车</a></p>
        </div>
        {if $flag eq 'cart'}
        <div class="AddtoCart">
        	<div class="commodity">
            	<img src="{$add_pic}" />
                <p class="pone">{$add_name}</p>
                <p class="ptwo">{$add_title}</p>
        	</div>
        	<div  class="commodityOK">
                <div><p>商品已成功加入购物车</p>
                <img src="images/005.png" />
                </div>               
                <a href="#buy"><img src="images/101.png"  style="margin-top: 10px;"/></a>&nbsp;
                <a href="index.php"><img src="images/100.png" style="margin-top: 10px;"/></a>
            </div>
        </div>
        {/if}
        <a name="buy"></a>
        <div class="shopping_main">
        	<div class="shopping_title"  style="background-image:url(images/line.png); background-position:bottom; background-repeat:repeat-x">
              <p class="shopping_rightP" style="margin-left: 300px;float: right">已选商品（不含运费）<span>¥ <font id="total_price1">0.00</font></span></p>
                
            </div>
            <div class="shopping_Box" style=" border-bottom:dashed 1px #747474; padding-bottom:40px;">
            	<div class="shopping_list">
                	<div class="allchoose"><input name="allbox" type="checkbox" value="全选" onclick="checkALL(this.checked);"/><a class="allchooseA" href="#">全选</a></div>
                	<p class="p_1">商品信息</p>	
                    <p class="p_2">单价（元）</p>
                    <p class="p_3">数量</p>
                    <p class="p_4">金额（元）</p>
                    <p class="p_5">操作</p>
                </div>
                {foreach name=list item=item from=$list}
                {if $item['product_online'] eq '0'}
                <div class="shopping_infor fail">
                	<div class="allchoose"><p style="width:40px;">失效</p><img src={$item['product_pic']} /></div>
                	<p class="p_1" style="line-height:40px; float:left; margin-top:30px;">
                	<a class="inforA failText" style="float:left" href="">{$item['product_name']}</a>
                	<a>{$item['product_pack']}</a></p>
                    <p class="p_2 p_price_now">{$item['product_price1']}<span>{$item['product_price2']}</span></p>
                    <p class="p_3 failText">{$item['cart_acount']}</p>
                    <p class="p_4 p_price failText">￥<font style="font-size:16px;" id="p_{$item['product_id']}">{$item['product_price1']*1*$item['cart_acount']}</font></p>
                    <p class="p_5" style="margin-top:50px; width:90px;  margin-left:20px;"><a class="shoucangA" href="">删除</a></p>
                </div>  
                {else}
                <div class="shopping_infor">
                	<div class="allchoose"><input style="margin-top:68px;" name="carts" type="checkbox" value="{$item['product_id']}" onchange="checkItem()"/><img src="{$item['product_pic']}" /></div>
                	<p class="p_1" style="line-height:40px; float:left; margin-top:30px;">
                	<a class="inforA" style="float:left" href="">{$item['product_name']}</a>
                	<a>{$item['product_pack']}</a></p>
                    <p class="p_2 p_price_now">{$item['product_price1']}<span>{$item['product_price2']}</span></p>
                    <p class="p_3 number_p"><input type="button" value="-" onclick="jian({$item['product_id']});"/><input class="textInput" type="text" id="cp_{$item['product_id']}" value="{$item['cart_acount']}" onblur="blurPrice(this.value,{$item['product_id']});"/><input type="button" value="+" onclick="jia({$item['product_id']});"/></p>
                    <p class="p_4 p_price">￥<font style="font-size:16px;" id="p_{$item['product_id']}">{$item['product_price1']*1*$item['cart_acount']}</font></p>
                    <p class="p_5" style="margin-top:50px; width:90px; margin-left:20px;"><a class="shoucangA" href="">删除</a></p>
                    <input type="hidden" id="h_price_{$item['product_id']}" value="{$item['product_price1']}"/>
                </div>
                {/if}
                {/foreach}
                
                <form action="" id="delete_form" method="post">
              		<input type="hidden" name="delete_cmd" id="delete_cmd" value="delete"/>
                    <input type="hidden" name="delete_session_id" id="delete_session_id" value="0"/>
                </form>
                <form action="order.php" id="order_form" method="post">
              		<input type="hidden" name="order_cmd" id="order_cmd" value="order"/>
                    <input type="hidden" name="order_item" id="order_item" value=""/>
                    <input type="hidden" name="order_total" id="order_total" value="0"/>
                    <input type="hidden" name="order_num" id="order_num" value=""/>
                    <input type="hidden" name="order_amount" id="order_amount" value="0"/>
                    <input type="hidden" name="order_price" id="order_price" value=""/>
                </form>
                <script>
					function jia(id){
						//1.计算数量
						var num = document.getElementById("cp_"+id).value;
						num = num*1+1;
						document.getElementById("cp_"+id).value = num;

						//2.计算总价
						var price = document.getElementById("h_price_"+id).value;
						var total = num*price;

						document.getElementById("p_"+id).innerHTML=total.toFixed(1);
					}
				
					function jian(id){

						//1.计算数量
						var num = document.getElementById("cp_"+id).value;
				
						if(num<2){
				
						}else{
							num = num*1-1;
				
							document.getElementById("cp_"+id).value = num;
						}

						//2.计算总价
						var price = document.getElementById("h_price_"+id).value;
						var total = num*price;

						document.getElementById("p_"+id).innerHTML=total.toFixed(1);
					}

					function blurPrice(num,id){
						var price = document.getElementById("h_price_"+id).value;
						var total = num*price;

						document.getElementById("p_"+id).innerHTML=total.toFixed(1);

						checkItem();
					}
					
					//删除地址信息
					function deleteDetail(id){
						jConfirm('确认要删除吗?', '确认对话框', function(r) {
						    if(r){
						    	document.getElementById("session_id2").value = id;
						    	document.getElementById("form2").submit();
						    }
						});
					}
					function submitOrder(){
						var amount = document.getElementById("order_amount").value;

						if(amount.length==0 || amount<1){
							jAlert("请选择要购买的商品");
							return false;
						}else{
							document.getElementById("order_form").submit();
						}
					}
				</script>  
            </div>
            <div class="shopping_list" style="background-color:#eeeeee; border-bottom:none">
                	<div class="allchoose"  style="width:100px;"><input name="allbox" type="checkbox"  onclick="checkALL(this.checked);"/><a class="allchooseA" href="#">全选</a></div>
                	<div class="kinds">
                    	<a href="">删除</a><a href="">清除失效商品</a>
                        <p style="margin-left:150px;">已选择商品 0 件</p>
                        <p style="margin-left:20px;">合计（不含运费）：</p>
                        <p style="margin-left:5px;margin-right: 10px;color: #c40000;width: 100px;">¥ <font id="total_price2" style="font-size: 16px;font-weight: 700">0.00</font></p>
                        <input type="image" src="images/jiesuan2.png" onclick="submitOrder();"/>
                    </div>	
                </div>
        </div>
        <div class="accountDown">
   	    <div class="accountDown_title"><p>人气推荐</p></div>
                <div class="productList">
                {foreach name=list item=item from=$top}
                <div class="product_box" style="margin-left: 16px;">
                	<div class="product_img"><a href="detail_{$item['product_id']}.html"><img src="{$item['product_pic']}" /></a></div>
                    <p class="product_oneP"><a href="detail_{$item['product_id']}.html">{$item['product_name']}</a> </p>
                </div>
                {/foreach}
                </div>
        </div>
    </div>
</div>
<div class="main_down">
	{include file="core/templates/bottom.tpl"}
    {include file="core/templates/copyright.tpl"}
</div>
<script>
	
	function checkItem(){

		//循环checkbox 
		var str=document.getElementsByName("carts");

		//商品ID
		var s_item = "";
		//商品数量
		var s_num = "";
		//商品单价
		var s_price = "";
		//总件数
		var s_amount = 0;
		//总价格
		var s_total = 0;
		
		for (i=0;i<str.length;i++)
		{
		  if(str[i].checked==true)
		  {		
			   
			  //1.选中的添加到商品ID集合
			  if(s_item==""){
				  s_item = str[i].value;
			  }else{
				  s_item = s_item+","+str[i].value;
			  }
			  
			  //2.选中的添加到商品数量
			  var num = document.getElementById("cp_"+str[i].value).value;
			  
			  if(s_num==""){
				  s_num = num;
			  }else{
				  s_num = s_num+","+num;
			  }
			  
			  //3.选中的添加到商品单价
			  var price = document.getElementById("h_price_"+str[i].value).value;
			  if(s_price==""){
				  s_price = price;
			  }else{
				  s_price = s_price+","+price;
			  }

			  //4.计算总件数
              s_amount = s_amount*1+num*1;
				
			  //5.计算总价格
		   	  s_total = s_total*1+(price*num);
		  }
		}

		document.getElementById("total_price1").innerHTML=s_total.toFixed(1);
		document.getElementById("total_price2").innerHTML=s_total.toFixed(1);

		document.getElementById("order_item").value=s_item;
		document.getElementById("order_num").value=s_num;
		document.getElementById("order_price").value=s_price;
		document.getElementById("order_total").value=s_total.toFixed(1);
		document.getElementById("order_amount").value=s_amount;
	}

	function checkALL(checked){
		var str=document.getElementsByName("carts");

		for (i=0;i<str.length;i++)
		{
			str[i].checked=checked;
		}

		var box=document.getElementsByName("allbox");

		for (i=0;i<box.length;i++)
		{
			box[i].checked=checked;
		}

		checkItem();
	}
</script>
</body>
</html>
