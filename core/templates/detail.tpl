<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include file="header.tpl"}
<link href="css/product.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="headerBox">
     {include file="top.tpl"}
</div>
<div class="mainBox">
	{include file="menu.tpl"}
    <div class="mainBody">
    	<div class="main_right">
        
        	<div class="product_recent">
            	<p class="recentP">相关推荐</p>
                {foreach name=list item=item from=$list}
                <div class="pro_detail">
                	<a href="detail_{$item['product_id']}.html" target="_blank"><img src="{$item['product_pic']}" /></a>
                    <p><a href="detail_{$item['product_id']}.html" target="_blank">{$item['product_name']}</a></p>
                    <p style="color:#2a993a;">¥{$item['product_price1']}<span>¥{$item['product_price2']}</span></p>
                </div>
                {/foreach}
            </div>
        </div>
        <div class="main_Right">
        	<div class="location">
        	<p><a href="">首页</a><a href="">>&nbsp;蔬菜水果</a><a href="">>&nbsp;新鲜蔬菜</a><a style="color:#46b225;" href="">>&nbsp;【爱蔬鲜】秋葵</a></p>
        </div>
        	<div class="goodsBox">
            	<img src="{$map['product_pic']}" />
                <div class="right_text">
                	<p class="pone">{$map['product_name']}&nbsp;&nbsp;{$map['product_pack']}</p>
                    <p class="ptwo">{$map['product_title']}</p>
                    <div class="valueBox">
                    	<p class="retail">零售价:<span>¥{$map['product_price1']}</span></p>
                        <p class="retail_2">市场价::<span>¥{$map['product_price2']}</span></p>
                        <p class="addText">下载手机APP支付更优惠</p>
                        <div class="areaBox">
                        	<p>配送至:</p>
                            <select name="">
                            {foreach name=list item=item from=$area}
                            {if $map['product_scope']|strpos:$item['area_name']!==false}<option>{$item['area_name']}</option>{/if}
                            {/foreach}
                            </select>
                            <p>有货</p>
                        </div>
                    </div>
                    <div class="buyBox">
                     <div class="add addbig">
                            	<input class="jian" type="button" onclick="jian()"/>
                                <input class="text_number" type="text"  placeholder="1" id="p_number" value="1"/>
                                <input class="jia" type="button" onclick="jia()"/>
                      </div>
                      <input style="margin:5px 5px;" type="image" src="images/buy.png" onclick="doOrder();"/>
                      <input style="margin:5px 5px;" type="image" src="images/xihuan.png"  onclick="doCart();"/>
                     </div>
                </div>
                <form action="order.php" id="order_form" method="post">
                <input type="hidden" id="order_item" name="order_item" value="{$map['product_id']}"/>
                <input type="hidden" id="order_num" name="order_num" value="1"/>
                <input type="hidden" id="order_amount" name="order_amount" value="1"/>
                <input type="hidden" id="order_price" name="order_price" value="{$map['product_price1']}"/>
                </form>
                
                <form action="cart_list.php" id="cart_form" method="post">
                <input type="hidden" id="cart_item" name="cart_item" value="{$map['product_id']}"/>
                <input type="hidden" id="cart_num" name="cart_num" value="1"/>
                <input type="hidden" id="cart_total" name="cart_total" value="1"/>
                <input type="hidden" id="cart_title" name="cart_title" value="{$map['product_title']}"/>
                <input type="hidden" id="cart_name" name="cart_name" value="{$map['product_name']}"/>
                <input type="hidden" id="cart_pic" name="cart_pic" value="{$map['product_pic']}"/>
                <input type="hidden" id="cart_price" name="cart_price" value="{$map['product_price1']}"/>
                <input type="hidden" id="cart_cmd" name="cart_cmd" value="fromDetail"/>
                </form>
                
                <script>
                	function doOrder(){
                		document.getElementById("order_num").value=document.getElementById("p_number").value;
                		document.getElementById("order_form").submit();
                	}
                	function doCart(){
                		document.getElementById("cart_num").value=document.getElementById("p_number").value;
                		document.getElementById("cart_form").submit();
                	}
                </script>
            </div>
            <div class="select_detail">
            	<div class="detail_title">
                	<ul>
                    	<li class="chooseLi"><a class="theA" href="">商品详情</a></li>
                        <li><a href="">推荐菜谱</a></li>
                        <li><a href="">顾客评价</a></li>
                    </ul>
                </div>
                <div class="select_text">
                	{$map['product_content']}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main_down">
	{include file="bottom.tpl"}
    {include file="copyright.tpl"}
</div>
<script>
	function jia(){
		var num = document.getElementById("p_number").value;

		num = num*1+1;

		document.getElementById("p_number").value = num;
	}

	function jian(){
		var num = document.getElementById("p_number").value;

		if(num<2){

		}else{
			num = num*1-1;

			document.getElementById("p_number").value = num;
		}
	}

</script>
</body>
</html>
