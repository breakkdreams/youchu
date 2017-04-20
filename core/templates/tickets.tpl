<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include file="core/templates/header.tpl"}
<link href="css/groupbuy.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="headerBox">
    {include file="core/templates/top.tpl"}
</div>
<div class="mainBox">
	{include file="core/templates/menu.tpl"}
    <div class="ticket">
    	<div class="ticketBanner"></div>	
    </div>
    <div class="ticketBox">
    	<div class="ticketMain">
        	<div class="ticketUp">
        		<div class="ticketText">
            		<p>提货券</p><input type="text" />
            	</div>
            	<div class="ticketText">
            		<p>密码</p><input type="text" />
            	</div>
                <div class="ticketText">
            		<input style="margin-left:110px;" type="image" src="images/querentianjia.png" />
            	</div>
            </div>
            <div class="ticketList">
            	<p class="total">共计<span>0</span>张</p>
                <div class="ticketTable">
                	<div class="ticket_title">
                    	<p class="p01">序号</p>
                        <p class="p02">提货券号码</p>
                        <p class="p03">有效期</p>
                        <p class="p04">操作</p>
                    </div>
                    <div class="ticket_content">
                    	<p class="p01">01</p>
                        <p class="p02">GHDJXUU000562</p>
                        <p class="p03">2016-03-25</p>
                        <p class="p04"><a href="#">操作</a></p>
                    </div>
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
