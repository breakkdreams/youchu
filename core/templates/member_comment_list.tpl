
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include file="core/templates/header.tpl"}
<link href="css/myaccount.css" rel="stylesheet" type="text/css" />
<link href="css/page.css" rel="stylesheet" type="text/css" />
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
                ><a href="">我的账户</a>><a href="">我的评价</a></p>
            </div>
            <div class="evaluate_body">
            	<div class="evaluate_title">
                	<p class="P_pj">评价内容</p>
                    <p class="P_sp">商品信息</p>
                </div>
                {foreach name=list item=item from=$list}
                <div class="evaluate_list">
                	<div class="listLeft">
                    	<div class="list_text">
                        	<p class="P_nr">{$item['comment_content']}</p>
                            <p>[{$item['comment_date']}]</p>
                        </div>
                        <div class="list_img">
                        	{if $item['share_pic1'] eq ''}
				            {else}<img src="{$item['share_pic1']}" style="height: 40px;"/>{/if}
				            
				            {if $item['share_pic2'] eq ''}
				            {else}<img src="{$item['share_pic2']}" style="height: 40px;"/>{/if}
				            
				            {if $item['share_pic3'] eq ''}
				            {else}<img src="{$item['share_pic3']}" style="height: 40px;"/>{/if}
				            
				            {if $item['share_pic4'] eq ''}
				            {else}<img src="{$item['share_pic4']}" style="height: 40px;"/>{/if}
				            
				            {if $item['share_pic5'] eq ''}
				            {else}<img src="{$item['share_pic5']}" style="height: 40px;"/>{/if}
                        </div>
                    </div>
                    <div class="listRight">
                    
                    	<p class="P_spinfor">{$item['product_name']}</p>
						<p class="P_jg">¥ {$item['product_price1']}</p>
                    </div>
                </div>
                {/foreach}
                
            </div>
        	<div class="pageNumber">
                {$pages}
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
