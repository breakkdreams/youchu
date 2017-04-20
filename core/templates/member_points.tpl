
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
                ><a href="">我的账户</a>><a href="">我的积分</a></p>
            </div>
            <div class="integral_title">
            	<ul>
                	<li><a class="chooseitem" href="#">积分明细</a></li>
                    <li><a href="#">积分收入</a></li>
                    <li><a href="#">积分支出</a></li>
                </ul>
            </div>
            <div class="integral_infor">
            	<div class="list_one">
                	<p>可用积分</p>
                    <p class="number_one">4</p>
                </div>
                <div class="list_one">
                	<p>将要过期积分</p>
                    <p class="number_one">0</p>
                </div>
                <div class="list_two">
					<input type="image" src="images/duihuan.png" />
                </div>
            </div>
        	<div class="account_list" style="border-bottom:dashed 1px #cccccc;">
            	<div class="jifen_title">
                	<p class="jifen_p1">来源/用途</p>	
                    <p class="jifen_p2">积分变化</p>
                    <p class="jifen_p3">日期</p>
                    <p class="jifen_p4">备注</p>

                </div>
                <div class="jifen_infor">
                	<div class="jifen_name">
                    	<img src="images/jitui.png" /><p class="jifen_p5"><a href="">【东升】莴笋750g</a></p><p class="jifen_p5">编号：11203909080</p>
                    </div>	
                    <p class="jifen_p6">+1</p>
                    <p class="jifen_p3">2015年12月12日 12:15:20</p>
                    <p class="jifen_p4">交易获得</p>
                </div>
                <div class="jifen_infor">
                	<div class="jifen_name">
                    	<img src="images/banana.png" /><p class="jifen_p5"><a href="">菲律宾香蕉 3支装</a></p><p class="jifen_p5">编号：11203909080</p>
                    </div>	
                    <p class="jifen_p6">+1</p>
                    <p class="jifen_p3">2015年12月12日 12:15:20</p>
                    <p class="jifen_p4">交易获得</p>
                </div>
                <div class="jifen_infor">
                	<div class="jifen_name">
                    	<img src="images/jitui.png" /><p class="jifen_p5"><a href="">步步高HCD007(159)TSD电话炫黑</a></p><p class="jifen_p5">编号：11203909080</p>
                    </div>	
                    <p class="jifen_p6">+1</p>
                    <p class="jifen_p3">2015年12月12日 12:15:20</p>
                    <p class="jifen_p4">交易获得</p>
                </div>
                <div class="jifen_infor">
                	<div class="jifen_name">
                    	<img src="images/banana.png" /><p class="jifen_p5"><a href="">【东升】莴笋750g</a></p><p class="jifen_p5">编号：11203909080</p>
                    </div>	
                    <p class="jifen_p6">+1</p>
                    <p class="jifen_p3">2015年12月12日 12:15:20</p>
                    <p class="jifen_p4">交易获得</p>
                </div>              
                <div class="pageNumber">
                <p><a href="#">上一页</a><a href="#">1</a><a href="#">2</a><a href="#">下一页</a> 共2页</p>
                <p>到第</p><input class="shuru" type="text" placeholder="1"/><p>页<a href="#">确定</a></p>
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
