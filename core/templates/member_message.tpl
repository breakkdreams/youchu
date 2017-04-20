<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include file="core/templates/header.tpl"}
<link href="css/myaccount.css" rel="stylesheet" type="text/css" />
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
                ><a href="">我的账户</a>><a href="">站内消息</a></p>
            </div>
          <div class="noticeBox">
          	<div class="notice_text">
            	<p class="notice_p2"><a href="#">尊敬的会员，恭喜您注册成功，成为我们的会员，您将享受到不一样的优惠价格，我们保证快速送达，保证食品的新鲜。
                尊敬的会员，恭喜您注册成功，成为我们的会员，您将享受到不一样的优惠价格，我们保证快速送达，保证食品的新鲜。</a></p>
                <p>2015-05-18 15:20:20</p>
                <p class="operating"><a href="#">删除</a></p>
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
