<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include file="core/templates/header.tpl"}
<link href="css/myaccount.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/lrtk.js"></script>

</head>

<body>
<div class="headerBox">
    {include file="core/templates/top.tpl"}
</div>
<div class="mainBox">
	{include file="core/templates/menu.tpl"}
    <div class="mainBody">
    	<div class="accountLeft">
        	<div class="myaccount"><p>我的帐户</p></div>
            {include file="core/templates/member_left.tpl"}
        </div>
        <div class="accountRight">
        	<div class="account_location">
            	<p><a href="">首页</a>
                ><a href="">我的账户</a>><a href="">我的订单</a>><a href="">订单详情</a></p>
            </div>
        	<div class="detail_main">
        		{if $error eq true}
        			<div class="noresult">
	                	<img src="images/unhappy.png" />
	                    <p>没有查询到相应的订单</p>
	                </div>
        		{else}
        			<div class="addressBox">
                    	<p class="sh_P">收货地址：</p>
                        <p class="sh_Text">{$map['get_name']}，{$map['get_phone']} {$map['get_tel']}，{$map['get_address']}</p>
                    </div>
                    <div class="addressBox" style="border:none">
                    	<p class="sh_P">订单信息</p>
                        <div class="ddBox">
                        	<p class="dd_Text">交易号：{$map['order_code']}</p>
                        	<p class="dd_Text">创建时间：{$map['order_time']}</p>
                        	<p class="dd_Text">发货时间：{$map['send_time']}</p>
                        	<p class="dd_Text">付款时间：{$map['pay_time']}</p>
                        </div>
                    </div>
                	<div class="account_list">
	            		<div class="list_title2">
	                		<p class="p01">商品信息</p>	
	                    	<p class="p02">单价（元）</p>
	                    	<p class="p03">数量</p>
	                    	<p class="p04">状态</p>
	                    	<p class="p05">商品总价</p>
	                	</div>
	                	<div class="list_infor2" >
	                    	<div class="infor_left">
	                    	{foreach name=list item=item from=$list}
	                        {if $smarty.foreach.dlist.iteration==1}
					        <div class="infor_Collect">
					        {else}
					        <div class="infor_Collect" style="border-top:solid 1px #e5e5e5">
					        {/if}
		                        <div class="child">
			                    	<img src="{$item['product_pic']}"/>
			                    	<p class="p_01" style="text-align:left"><a href="">{$item['product_name']}</a><br /><span>{$item['product_pack']}</span></p>
			                    </div>
	                    		<div class="child "><p class="p02">{$item['product_price1']}</p></div>
	                    		<div class=" child "><p class="p03">{$item['product_acount']}</p></div>
	                    		<div class="child " style="border:none">
	                    			<p class="p04">
	                    				{if $map['pay_time'] eq ''}
				                      	待支付
				                      	{else if $map['order_state'] eq '0'}
				                      	未发货
				                      	{else if $map['order_state'] eq '1'}
				                      	已发货
				                      	{else if $map['order_state'] eq '2'}
				                      	已完成
				                      	{else if $map['order_state'] eq '3'}
				                      	退货中
				                    	{/if}
	                    			</p>
	                    		</div>
	                        </div>
	                        {/foreach}
	                        </div>
	                        <div class="infor_right">
	                        	<div class="child" style="border:none"><p class="p05">{$map['order_price']}元</p><p class="p05"></p></div>
	                        </div> 
	                	</div>
	        		</div>
	        		{if $map['pay_time'] eq ''}
					
					{else}
            		<p class="priceOK">实付款：<span>￥{$map['order_price']}</span>元</p>
            		{/if}
        		{/if}
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
