<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>{$head_title}</title>
<meta name="Keywords" content="{$WEB_KEYWORD}" />
<meta name="Description" content="{$WEB_DESCRIBE}" />
{include file="member_head.tpl"}
</head>

<body>
<!--头部导航开始-->
{include file="menu.tpl"}
<!--头部导航开始-->

<!--用户中心开始-->
<div class="user-container">
     <div class="user-box">

          {include file="member_left.tpl"}    
          
          <div class="user-box-right">
               <div class="user-right-title">
                    <a href="">首页</a>
                    <span class="juli">&gt;</span>
                    <a href="#">我的账户</a>
                     &gt;   <a href="#">我关注的商品</a>
</div>

<div class="hometitle">我关注的商品</div>

<table width="935" height="243" border="0" cellpadding="0" cellspacing="1" class="guanzhu" >
  <tr class="guantitle" >
    <td width="422" height="35" >商品信息</td>
    <td width="150">关注时间</td>
    <td width="100">市场价</td>
    <td width="100">会员价</td>
    
    <td width="200">操作</td>
  </tr>
  {foreach name=list item=item from=$list}
  <tr bgcolor="#FFFFFF"  class="guancon" >
    <td height="105" class="jia"><a href="item-{$item['product_id']}.html" target="_blank"><img src="{$item['product_pic']}" width="60" height="60" /></a><span><a href="item-{$item['product_id']}.html" target="_blank">{$item['product_name']}</a></span></td>
    <td class="feng">{$item['focus_time']}</td>
    <td class="feng">￥{$item['product_price2']}</td>
    <td class="feng">￥<span style="color:red;font-size: 18px;font-weight:700">{$item['product_price1']}</span></td>
    <td class="feng"><a href="item-{$item['product_id']}.html" target="_blank">查看</a> | <a href="#">取消关注</a></td>
  </tr>
  {/foreach}
</table>



 

          </div>
     
     </div>
</div>
<!--用户中心结束-->


<!--footer  start-->
{include file="footer.tpl"}
<!--footer  end-->
</body></html>