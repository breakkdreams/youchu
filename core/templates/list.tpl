
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include file="core/templates/header.tpl"}
<link href="css/product.css" rel="stylesheet" type="text/css" />
<link href="css/page.css" rel="stylesheet" type="text/css" />
<LINK rel=stylesheet type=text/css href="css/main.css">
</head>

<body>
<div class="headerBox">
 {include file="core/templates/top.tpl"}
</div>
<div class="mainBox">
	{include file="core/templates/menu.tpl"}
    <div class="mainBody">
    	<div class="main_right">
        	<div class="mainUp">
        	<!--<div class="nav_list">
        		{foreach name=list item=item from=$menu}
        		{if $item['m_size'] eq '1'}
            	<div class="list1">
                	<div class="list1_up"><img src="{$item['m_photo']}" /><p class="titleP"><a href="#">{$item['m_name']}</a></p></div>
                    <p class="fenlei">
                    	{foreach name=clist item=citem from=$menu}
                    	{if $citem['m_fid'] eq $item['m_id']}
                    	<a href="list.php?f={$citem['m_floor']}">{$citem['m_name']}</a>
                    	{/if}
                    	{/foreach}
                    </p>
                </div>
                {/if}
                {/foreach}             
            </div>

        --></div>
            <div class="product_recent">
            	<p class="recentP">人气推荐</p>
                {foreach name=list item=item from=$left}
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
        	<p><a href="">首页</a><a href="">>&nbsp;蔬菜水果</a><a href="">>&nbsp;新鲜蔬菜</a></p>
            <p>商品筛选</p><p>共32个商品</p>
        </div>
        	<div class="selectBox">
            	<div class="select_one">
                	<p>品牌:</p>
                    <ul>
                    	<li><a class="currentA" href="">不限</a></li>
                    	<li><a href="">爱蔬鲜</a></li>
                        <li><a href="">菜总管</a></li>
                        <li><a href="">爱蔬鲜</a></li>
                        <li><a href="">爱蔬鲜</a></li>
                    </ul>
                </div>
                <div class="select_one select_second">
                	<p>品种:</p>
                    <ul>
                    	<li><a class="currentA" href="">不限</a></li>
                    	<li><a href="">叶菜</a></li>
                        <li><a href="">果蔬</a></li>
                        <li><a href="">根茎类</a></li>
                        <li><a href="">菌类</a></li>
                        <li><a href="">泡菜</a></li>
                        <li><a href="">组合蔬菜</a></li>
                        <li><a href="">其他</a></li>
                    </ul>
                </div>
                <div class="select_one">
                	<p>配送区域:</p>
                    <ul>
                    	<li><a class="currentA" href="">不限</a></li>
                    	<li><a href="">南湖区</a></li>
                        <li><a href="">秀洲区</a></li>
                        <li><a href="">海宁市</a></li>
                        <li><a href="">桐乡市</a></li>
                        <li><a href="">平湖市</a></li>
                        <li><a href="">海盐县</a></li>
                        <li><a href="">嘉善县</a></li>
                    </ul>
                </div>
                 <div class="select_one select_second">
                	<p>是否有机食品:</p>
                    <ul>
                    	<li><a href="">不限</a></li>
                    	<li><a class="currentA" href="">是</a></li>
                        <li><a href="">否</a></li>
                    </ul>
                </div>
            </div>
            <div class="pro_main">
            	<div class="pro_title">
                	<input class="search" type="text"  placeholder="在当前分类中搜索" />
                    <input class="okbutton" type="button" value="确定" />
                    <div class="condition">
                    	<a href="#">销量</a>
                        <a href="#">价格</a>
                        <a style="border-right:none" href="#">新品</a>
                    </div>
                </div>
            	<div class="pro_list">
            		{foreach name=list item=item from=$list}
            		<div class="pro_one" style="margin-left:15px;">
                    	<a href="detail_{$item['product_id']}.html"><img src="{$item['product_pic']}" /></a>
                    	<p class="mingzi"><a href="">{$item['product_name']}</a></p>
                        <center><p class="price_P">¥{$item['product_price1']}</p></center>
                    </div>
                    {/foreach}
                </div>
                <div class="pageNumber">
                {$pages}
                </div>
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
