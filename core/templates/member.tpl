<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include file="core/templates/header.tpl"}
<link href="css/myaccount.css" rel="stylesheet" type="text/css" />
<style>

</style>
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
                ><a href="">我的账户</a></p>
            </div>
            <div class="account_infor">
            	<div class="account_head" style="background-image:url(images/touxiangbg.png)">
                	<img src="images/touxiang2.png" />
                </div>
                <div class="account_text">
                	<p style="margin-top: 30px;">生鲜达人</p>
                	<p style="width:200px; margin-top:10px; font-weight:bold;">{$login_name},<span>欢迎你</span></p>
                	<!-- 
                    <div class="account_yz"><img  class="theImg" src="images/dui.png" /><img src="images/qiye.png" /><p>企业已认证</p></div>
                    <div class="account_yz"><img class="theImg"  src="images/dui.png" /><img src="images/shouji2.png" /><p>手机已认证</p></div>
                    <div class="account_yz"><img class="theImg"  src="images/cuo.png" /><img src="images/youxiang.png" /><p>邮箱未认证</p></div>
                     -->
                </div>   
                <div class="account_consume">
                	<p class="P_title">会员等级</p>
                	<img src="images/dengji.png" />
                </div>
                <div class="account_consume2">
                	<p class="P_title2">已获积分</p>
                	<p>10分</p>
                </div>
                <div class="account_consume2">
                	<p class="P_title2">提货券</p>
                	<p>0张</p>
                </div>
            </div>
            <div class="account_list">
            	<div class="list_title">
                	<p class="p1">商品信息</p>	
                    <p class="p2">单价（元）</p>
                    <p class="p3">数量</p>
                    <p class="p4">实付款（元）</p>
                    <p class="p5">交易状态</p>
                    <p class="p6">操作</p>
                </div>
                {foreach name=list item=item from=$list}
             	 <div class="list_infor">
                	<div class="numbering">
                   	  <p>{$item['order_time']}</p>
                      <p>订单号：{$item['order_code']}</p>
                	</div>
                	
                	<div class="product_left">
                	{foreach name=dlist item=detail from=$info}
                	{if $detail['order_code'] eq $item['order_code']}
                	{if $smarty.foreach.dlist.iteration==1}
			        <div class="product_all">
			        {else}
			        <div class="product_all"  style="border-top:solid 1px #e5e5e5;">
			        {/if}
                   
                    	<div class="product_infor">
                    		<a href="#"><img src="{$detail['product_pic']}" /></a>
                           	<p class="P_name"><a href="">{$detail['product_name']}</a></p>	
                            <p class="P_name"><a href="">{$detail['product_pack']}</a></p>	
             			</div>
                  	 	<p class="p2">{$detail['product_price1']}</p>
                    	<p class="p3">{$detail['product_acount']}</p>
                    </div>
                    {/if}
                    {/foreach}
                    </div>
                    
                    
                    
                    <div class="product_right">
                    	<p class="p4">{$item['order_price']}</p>
                    	<div class="statusBox">
                    		<p class="p5">
                    			{if $item['pay_time'] eq ''}
		                      	待支付
		                      	{else if $item['order_state'] eq '0'}
		                      	未发货
		                      	{else if $item['order_state'] eq '1'}
		                      	已发货
		                      	{else if $item['order_state'] eq '2'}
		                      	已完成
		                      	{else if $item['order_state'] eq '3'}
		                      	退货中
		                    	{/if}
                    		</p>
                    		<p class="p5"><a href="member_order_detail.php?id={$item['order_id']}">订单详情</a></p>
                    		<p class="p5">
                    			{if $item['order_state'] eq '2' && $item['comment_state'] eq '0'}
                    			<a href="member_comment.php?id={$item['order_id']}">立即评论</a>
                    			{/if}
                    		</p>
                      </div>
                      	<p class="p6">
                      	  {if $item['pay_time'] eq ''}
                      	  <a href="member_order_pay.php?id={$item['order_id']}"><img src="images/caozuo1.png" width="68"/></a>
                      	  {/if}
                      	  {if $item['order_state'] eq '1'}
                    	  <a href="#" onclick="confirmOrder({$item['order_id']})"><img src="images/caozuo2.png" width="68"/></a>
                    	  {/if}
                    	</p>
                    </div>
                    
                </div>
                {/foreach}               
                <p class="moreP"><a href="member_order_list.php">更多>></a></p>
            </div>
        </div>
        <div class="accountDown">
            	<div class="accountDown_title"><p>最近浏览的商品</p></div>
                <div class="productList">
                <input style="float:left; margin-top:70px;  outline:none;" type="image" src="images/leftJ.png" />
                <div class="product_box">
                	<div class="product_img"><a href=""><img src="images/product1.png"/></a></div>
                    <p class="product_oneP"><a href="">1.2经典荔枝纹pu皮革面料 适合做各种休闲半定型女包</a> </p>
                    <p class="product_secondP" >¥5.60</p>
                    <p class="product_thirdP" >销量:258</p>
                </div>
                <div class="product_box">
                	<div class="product_img"><a href=""><img src="images/product1.png" /></a></div>
                    <p class="product_oneP"><a href="">1.2经典荔枝纹pu皮革面料 适合做各种休闲半定型女包</a> </p>
                    <p class="product_secondP" >¥5.60</p>
                    <p class="product_thirdP" >销量:258</p>
                </div>
                <div class="product_box">
                	<div class="product_img"><a href=""><img src="images/product1.png" /></a></div>
                    <p class="product_oneP"><a href="">1.2经典荔枝纹pu皮革面料 适合做各种休闲半定型女包</a> </p>
                    <p class="product_secondP" >¥5.60</p>
                    <p class="product_thirdP" >销量:258</p>
                </div>
                <div class="product_box">
                	<div class="product_img"><a href=""><img src="images/product1.png" /></a></div>
                    <p class="product_oneP"><a href="">1.2经典荔枝纹pu皮革面料 适合做各种休闲半定型女包</a> </p>
                    <p class="product_secondP" >¥5.60</p>
                    <p class="product_thirdP" >销量:258</p>
                </div>
                <div class="product_box">
                	<div class="product_img"><a href=""><img src="images/product1.png" /></a></div>
                    <p class="product_oneP"><a href="">1.2经典荔枝纹pu皮革面料 适合做各种休闲半定型女</a> </p>
                    <p class="product_secondP" >¥5.60</p>
                    <p class="product_thirdP" >销量:258</p>
                </div>
                <input style="float:left; margin-top:70px; outline:none; margin-left:8px;" type="image" src="images/rightJ.png" />
                </div>
        </div>
    </div>
</div>
<div class="main_down">
	{include file="core/templates/bottom.tpl"}
    {include file="core/templates/copyright.tpl"}
</div>
<form action="member_order_confirm.php" method="post" name="confirm_form" id="confirm_form">
<input type="hidden" name="confirm_cmd" value="confirm"/>
<input type="hidden" name="confirm_id" id="confirm_id" value=""/>
</form>
<script>
//确认收货
function confirmOrder(id){
	jConfirm('确认要收货吗?', '确认对话框', function(r) {
	    if(r){
	    	document.getElementById("confirm_id").value = id;
	    	document.getElementById("confirm_form").submit();
	    }
	});
}
</script>
</body>
</html>
