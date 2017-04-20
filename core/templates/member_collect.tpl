
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
                ><a href="">我的账户</a>><a href="">我的收藏</a></p>
            </div>
          <div class="collect_title">
          	<div class="allchoose">
            	<p><a class="greenA" href="#">全部 10</a></p>
                <p><a href="#">降价 5</a></p>
                <p><a href="#">失效 1</a></p>
                <input style="float:right; width:88px; height:28px; border:solid 1px #dbdbdb; background-color:#ffffff; line-height:30px; margin-top:8px;" type="button" value="批量管理" />
            </div>
            <ul>
            	<li><a href="#">全部 20</a></li>
                <li><a href="#">新鲜蔬果 5</a></li>
                <li><a href="#">肉类禽蛋 2</a></li>
                <li><a href="#">海鲜水产 8</a></li>
                <li><a href="#">办公用品 5</a></li>
            </ul>
          </div>
       	  <div class="Merchandise">
            	<div class="goods_list">
                	<a href="#"><img src="images/chelizi.png" /></a>
                    <input class="input_1" type="image" src="images/gouwuche_bg.png" />
                    <input class="input_2" type="image" src="images/lajitong_bg.png" />
                    <p><a href="#">新鲜蔬菜</a></p>
                    <p class="jq_p">¥5.60<span>¥5.60</span></p>
                </div>
                <div class="goods_list">
                	<a href="#"><img src="images/chelizi.png" /></a>
                    <input class="input_1" type="image" src="images/gouwuche_bg.png" />
                    <input class="input_2" type="image" src="images/lajitong_bg.png" />
                    <p><a href="#">新鲜蔬菜</a></p>
                    <p class="jq_p">¥5.60<span>¥5.60</span></p>
                </div>
             <div class="goods_list">
               	 <a href="#"><img src="images/chelizi.png" /></a>
                 <input class="input_1" type="image" src="images/gouwuche_bg.png" />
                    <input class="input_2" type="image" src="images/lajitong_bg.png" />
                    <p><a href="#">新鲜蔬菜</a></p>
                    <p class="jq_p">¥5.60<span>¥5.60</span></p>
                </div>
                
                <div class="goods_list">
                	<a href="#"><img src="images/chelizi.png" /></a>
                    <input class="input_1" type="image" src="images/gouwuche_bg.png" />
                    <input class="input_2" type="image" src="images/lajitong_bg.png" />
                    <p><a href="#">新鲜蔬菜</a></p>
                    <p class="jq_p">¥5.60<span>¥5.60</span></p>
                </div>
                <div class="goods_list">
                	<img class="shouqin" src="images/shouqin.png" />
                	<a href="#"><img src="images/chelizi.png" /></a>

                    <p><a href="#">新鲜蔬菜</a></p>
                    <p class="jq_p  shixiao"><img src="images/shixiao.png" />失效了</p>
                </div>
                <div class="goods_list"><a href="#"><img src="images/chelizi.png" /></a>
                  <input class="input_1" type="image" src="images/gouwuche_bg.png" />
                  <input class="input_2" type="image" src="images/lajitong_bg.png" />
                  <p><a href="#">新鲜蔬菜</a></p>
                  <p class="jq_p">¥5.60<span>¥5.60</span></p>
                </div>
                <div class="goods_list">
                	<a href="#"><img src="images/chelizi.png" /></a>
                    <input class="input_1" type="image" src="images/gouwuche_bg.png" />
                    <input class="input_2" type="image" src="images/lajitong_bg.png" />
                    <p><a href="#">新鲜蔬菜</a></p>
                    <p class="jq_p">¥5.60<span>¥5.60</span></p>
                </div>
                <div class="goods_list">
                	<a href="#"><img src="images/chelizi.png" /></a>
                    <input class="input_1" type="image" src="images/gouwuche_bg.png" />
                    <input class="input_2" type="image" src="images/lajitong_bg.png" />
                    <p><a href="#">新鲜蔬菜</a></p>
                    <p class="jq_p">¥5.60<span>¥5.60</span></p>
                </div>
                 <div class="pageNumber">
                <p><a href="#">上一页</a><a href="#">1</a><a href="#">2</a><a href="#">下一页</a> 共2页</p>
                <p>到第</p><input  type="text" placeholder="1"/><p>页<a href="#">确定</a></p>
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
