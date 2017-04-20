<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:07:51
         compiled from "core\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2577458f817f76e8721-00766015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82e4f1a594001f7fe1e6a301f915416ae384881d' => 
    array (
      0 => 'core\\templates\\index.tpl',
      1 => 1463196587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2577458f817f76e8721-00766015',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'item' => 0,
    'ad' => 0,
    'list1' => 0,
    'list2' => 0,
    'list3' => 0,
    'list4' => 0,
    'list5' => 0,
    'list6' => 0,
    'list7' => 0,
    'list8' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58f817f7ab8619_68749914',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f817f7ab8619_68749914')) {function content_58f817f7ab8619_68749914($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $_smarty_tpl->getSubTemplate ("core/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link href="css/index.css" rel="stylesheet" type="text/css" />
<LINK rel=stylesheet type=text/css href="css/main.css">
</head>

<body>







<?php echo $_smarty_tpl->getSubTemplate ("core/templates/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="mainBox">
	<?php echo $_smarty_tpl->getSubTemplate ("core/templates/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="mainBody">
    	<div class="mainUp"><!--
        	<div class="nav_list">
            	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
        		<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']=='1'){?>
            	<div class="list1">
                	<div class="list1_up"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_photo'];?>
" /><p class="titleP"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
</a></p></div>
                </div>
                <?php }?>
                <?php } ?>               
            </div>
--><!--            <div class="banner">
            	<img src="images/banner.png" />
            </div>-->
            <!-- 代码 开始 -->
  <div id="playBox">
    <div class="pre"></div>
    <div class="next"></div>
    <div class="smalltitle">
      <ul>
        <li class="thistitle"></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
    <ul class="oUlplay">
    	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ad']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
    		<?php if ($_smarty_tpl->tpl_vars['item']->value['ad_id']==2){?>
       		<li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['d_url'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['d_pic'];?>
" style="width:590px;height: 240px;"/></a></li>
       		<?php }?>
       	<?php } ?>
    </ul>
  </div>
<!-- 代码 结束 --><a name="main_sale"></a>
            <div class="activity">
            	<img style="margin-left:45px; margin-bottom:5px;" src="images/kaituanla.png" />
                <p>阳澄湖大闸蟹 10只/箱</p>
                <p>原价<span>660.00元</span></p>	
                <p class="changeP">惊爆价<span>450.00元</span></p>
                <img style="margin-left:40px;" src="images/zhaxie.png" />	
            </div>
            <div class="guanggao"><a href=""><img src="images/guanggao2.png" /></a></div>
            <div class="xuanchuan"><a href=""><img src="images/img1.png" /></a><a href=""><img src="images/img2.png" /></a><a href=""><img src="images/img3.png" /></a></div>
            <div class="gonggao">
            	<img src="images/gonggao.png" /><img style="margin-left:10px; margin-top:5px;" src="images/fangxin.png" />
                <p><a href="">吃货狂欢周 邀您来享用</a></p>
                <p><a href="">99元鲜活龙虾上市</a></p>
                <p><a href="">红心蜜柚买一送一 快来购买</a></p>
                <p><a href="">更多优惠活动 敬请关注</a></p>
            </div>
        </div>
        <div class="main_sale">            
            <div class="nTab">
            <!-- 标题开始 -->
            <div class="sale_title">
                <ul id="myTab0">
                    <li class="active" onclick="nTabs(this,0);"><a href="#main_sale">限时抢购</a></li>
                    <li class="normal" onclick="nTabs(this,1);"><a href="#main_sale">猜您喜欢</a></li>
                    <li class="normal" onclick="nTabs(this,2);"><a href="#main_sale">超值热销</a></li>
                    <li class="normal" onclick="nTabs(this,3);"><a href="#main_sale">新品上架</a></li>
                </ul>
            </div>
            <!-- 内容开始 -->
            
            <div class="TabContent">
                <div class="sale_list" id="myTab0_Content0">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['list']['iteration']==1){?>
                <div class="sale_product" style="margin-left:0px;">
                <?php }else{ ?>
                <div class="sale_product">
                <?php }?>            	
                	<a href="detail_<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
.html"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_pic'];?>
" /></a>
                    <p><a href=""><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</a></p>
                    <p class="pro_1">抢购价：<span>￥<?php echo $_smarty_tpl->tpl_vars['item']->value['temp_price'];?>
</span><span style="font-family:'微软雅黑';font-size:14px; color:#4c4c4c; text-decoration:line-through">￥<?php echo $_smarty_tpl->tpl_vars['item']->value['product_price2'];?>
</span></p>
                    <p class="pro_2"><img src="images/time.png" />剩余<span>9</span>小时<span>49</span>分<span>20</span>秒</p>
                </div>
                <?php } ?>
            </div>
                <div class="sale_list none" id="myTab0_Content1">
            	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['list']['iteration']==1){?>
                <div class="sale_product" style="margin-left:0px;">
                <?php }else{ ?>
                <div class="sale_product">
                <?php }?>            	
                	<a href="detail_<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
.html"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_pic'];?>
" /></a>
                    <p><a href=""><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</a></p>
                    <p class="pro_1">抢购价：<span>￥<?php echo $_smarty_tpl->tpl_vars['item']->value['temp_price'];?>
</span><span style="font-family:'微软雅黑';font-size:14px; color:#4c4c4c; text-decoration:line-through">￥<?php echo $_smarty_tpl->tpl_vars['item']->value['product_price2'];?>
</span></p>
                    <p class="pro_2"><img src="images/time.png" />剩余<span>9</span>小时<span>49</span>分<span>20</span>秒</p>
                </div>
                <?php } ?>
            </div>
            	<div class="sale_list none" id="myTab0_Content2">
            	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['list']['iteration']==1){?>
                <div class="sale_product" style="margin-left:0px;">
                <?php }else{ ?>
                <div class="sale_product">
                <?php }?>            	
                	<a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_pic'];?>
" /></a>
                    <p><a href="detail_<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</a></p>
                    <p class="pro_1">抢购价：<span>￥<?php echo $_smarty_tpl->tpl_vars['item']->value['temp_price'];?>
</span><span style="font-family:'微软雅黑';font-size:14px; color:#4c4c4c; text-decoration:line-through">￥<?php echo $_smarty_tpl->tpl_vars['item']->value['product_price2'];?>
</span></p>
                    <p class="pro_2"><img src="images/time.png" />剩余<span>9</span>小时<span>49</span>分<span>20</span>秒</p>
                </div>
                <?php } ?>
            </div>
            	<div class="sale_list none" id="myTab0_Content3">
            	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list4']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['list']['iteration']==1){?>
                <div class="sale_product" style="margin-left:0px;">
                <?php }else{ ?>
                <div class="sale_product">
                <?php }?>            	
                	<a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_pic'];?>
" /></a>
                    <p><a href="detail_<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</a></p>
                    <p class="pro_1">抢购价：<span>￥<?php echo $_smarty_tpl->tpl_vars['item']->value['temp_price'];?>
</span><span style="font-family:'微软雅黑';font-size:14px; color:#4c4c4c; text-decoration:line-through">￥<?php echo $_smarty_tpl->tpl_vars['item']->value['product_price2'];?>
</span></p>
                    <p class="pro_2"><img src="images/time.png" />剩余<span>9</span>小时<span>49</span>分<span>20</span>秒</p>
                </div>
                <?php } ?>
            </div>
            </div>
        </div>
        <script type="text/javascript">
            function nTabs(thisObj, Num) {
                if (thisObj.className == "active") return;
                var tabObj = thisObj.parentNode.id;
                var tabList = document.getElementById(tabObj).getElementsByTagName("li");
                for (i = 0; i < tabList.length; i++) {
                    if (i == Num) {
                        thisObj.className = "active";
                        document.getElementById(tabObj + "_Content" + i).style.display = "block";
                    } else {
                        tabList[i].className = "normal";
                        document.getElementById(tabObj + "_Content" + i).style.display = "none";
                    }
                }
            }
        </script>
        </div>
        <div class="goods_first">
        	<div class="goods_title">
            	<p>1F</p><p class="chineseP">粮油调味</p>
                <ul>
                	<li><a href="#">有机蔬菜</a></li>
                    <li><a href="#">国产水果</a></li>
                    <li><a href="#">进口水果</a></li>
                    <li><a href="#">查看更多>></a></li>
                </ul>
            </div>
            <div class="goods_main">
            	<div class="goods_left">
                	<img src="images/shucaibg.png" />
                    <div class="goods_sale">
                    	<img src="images/mangguo.png" />
                        <div class="jiage"><p class="jiage_up">￥48</p><p>市场价<span>￥78</span></p></div>
                        <p class="biaoti"><a href="#">新鲜水果攀枝花爱文芒果5斤</a></p>
                        <input type="button" value="立即抢购" />
                    </div>
                </div>
                <div class="goods_list">
                	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list5']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
                	<div class="shangpin">
                    	<a href="detail_<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
.html"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_pic'];?>
" /></a>
                        <p><a href=""><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</a></p>
                        <p class="priceP">￥<?php echo $_smarty_tpl->tpl_vars['item']->value['product_price1'];?>
<span>￥<?php echo $_smarty_tpl->tpl_vars['item']->value['product_price2'];?>
</span> </p>
                    </div>
                    <?php } ?>
                </div>
                <div class="goods_hot">
                	<div class="hot_title"><p>热销排行</p></div>
                    <div class="ranking">	
                        <div class="top">
                    		<a href=""><img src="images/chelizi.png" /></a>
                            <img class="topImg" src="images/top.png" />
                            <p><a href="">美国西北车厘子500g/份</a></p>
                            <p>￥28.00</p>
                    	</div>
                        <div class="other">
                        	<p class="numberP">2</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other">
                        	<p class="numberP">3</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other">
                        	<p class="numberP">4</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other">
                        	<p class="numberP">5</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other" style="border-bottom:none;">
                        	<p class="numberP">6</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="goods_first">
        	<div class="goods_title2">
            	<p>2F</p><p class="chineseP">酒水饮料</p>
                <ul>
                	<li><a href="#">精选猪肉</a></li>
                    <li><a href="#">牛羊肉</a></li>
                    <li><a href="#">家禽蛋品</a></li>
                    <li><a href="#">查看更多>></a></li>
                </ul>
            </div>
            <div class="goods_main">
            	<div class="goods_left">
                	<img src="images/roubg.png" />
                    <div class="goods_sale">
                    	<img src="images/jidanbg.png" />
                        <div class="jiage"><p class="jiage_up">￥48</p><p>市场价<span>￥78</span></p></div>
                        <p class="biaoti"><a href="#">新鲜水果攀枝花爱文芒果5斤</a></p>
                        <input type="button" value="立即抢购" />
                    </div>
                </div>
                <div class="goods_list">
                	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list6']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
                	<div class="shangpin">
                    	<a href="detail_<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
.html" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_pic'];?>
" /></a>
                        <p><a href=""><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</a></p>
                        <p class="priceP">￥<?php echo $_smarty_tpl->tpl_vars['item']->value['product_price1'];?>
<span>￥<?php echo $_smarty_tpl->tpl_vars['item']->value['product_price2'];?>
</span> </p>
                    </div>
                    <?php } ?>
                </div>
                <div class="goods_hot">
                	<div class="hot_title"><p>热销排行</p></div>
                    <div class="ranking">	
                        <div class="top">
                    		<a href=""><img src="images/chelizi.png" /></a>
                            <img class="topImg" src="images/top.png" />
                            <p><a href="">美国西北车厘子500g/份</a></p>
                            <p>￥28.00</p>
                    	</div>
                        <div class="other">
                        	<p class="numberP">2</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other">
                        	<p class="numberP">3</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other">
                        	<p class="numberP">4</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other">
                        	<p class="numberP">5</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other" style="border-bottom:none;">
                        	<p class="numberP">6</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="goods_first">
        	<div class="goods_title3">
            	<p>3F</p><p class="chineseP">海鲜水产</p>
                <ul>
                	<li><a href="#">鱼</a></li>
                    <li><a href="#">虾</a></li>
                    <li><a href="#">蟹</a></li>
                    <li><a href="#">进口水产</a></li>
                    <li><a href="#">查看更多>></a></li>
                </ul>
            </div>
            <div class="goods_main">
            	<div class="goods_left">
                	<img src="images/xiabg.png" />
                    <div class="goods_sale">
                    	<img src="images/haixian.png" />
                        <div class="jiage"><p class="jiage_up">￥48</p><p>市场价<span>￥78</span></p></div>
                        <p class="biaoti"><a href="#">新鲜水果攀枝花爱文芒果5斤</a></p>
                        <input type="button" value="立即抢购" />
                    </div>
                </div>
                <div class="goods_list">
                	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list7']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
                	<div class="shangpin">
                    	<a href="detail_<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
.html" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_pic'];?>
" /></a>
                        <p><a href=""><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</a></p>
                        <p class="priceP">￥<?php echo $_smarty_tpl->tpl_vars['item']->value['product_price1'];?>
<span>￥<?php echo $_smarty_tpl->tpl_vars['item']->value['product_price2'];?>
</span> </p>
                    </div>
                    <?php } ?>
                </div>
                <div class="goods_hot">
                	<div class="hot_title"><p>热销排行</p></div>
                    <div class="ranking">	
                        <div class="top">
                    		<a href=""><img src="images/chelizi.png" /></a>
                            <img class="topImg" src="images/top.png" />
                            <p><a href="">美国西北车厘子500g/份</a></p>
                            <p>￥28.00</p>
                    	</div>
                        <div class="other">
                        	<p class="numberP">2</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other">
                        	<p class="numberP">3</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other">
                        	<p class="numberP">4</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other">
                        	<p class="numberP">5</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other" style="border-bottom:none;">
                        	<p class="numberP">6</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="goods_first">
        	<div class="goods_title4">
            	<p>4F</p><p class="chineseP">办公用品</p>
                <ul>
                	<li><a href="#">文具</a></li>
                    <li><a href="#">设备</a></li>
                    <li><a href="#">装订用品</a></li>
                    <li><a href="#">笔</a></li>
                    <li><a href="#">查看更多>></a></li>
                </ul>
            </div>
            <div class="goods_main">
            	<div class="goods_left">
                	<img src="images/bangongbg.png" />
                    <div class="goods_sale">
                    	<img src="images/benzi.png" />
                        <div class="jiage"><p class="jiage_up">￥48</p><p>市场价<span>￥78</span></p></div>
                        <p class="biaoti"><a href="#">新鲜水果攀枝花爱文芒果5斤</a></p>
                        <input type="button" value="立即抢购" />
                    </div>
                </div>
                <div class="goods_list">
                	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list8']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
                	<div class="shangpin">
                    	<a href="detail_<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
.html" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_pic'];?>
" /></a>
                        <p><a href=""><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</a></p>
                        <p class="priceP">￥<?php echo $_smarty_tpl->tpl_vars['item']->value['product_price1'];?>
<span>￥<?php echo $_smarty_tpl->tpl_vars['item']->value['product_price2'];?>
</span> </p>
                    </div>
                    <?php } ?>
                </div>
                <div class="goods_hot">
                	<div class="hot_title"><p>热销排行</p></div>
                    <div class="ranking">	
                        <div class="top">
                    		<a href=""><img src="images/chelizi.png" /></a>
                            <img class="topImg" src="images/top.png" />
                            <p><a href="">美国西北车厘子500g/份</a></p>
                            <p>￥28.00</p>
                    	</div>
                        <div class="other">
                        	<p class="numberP">2</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other">
                        	<p class="numberP">3</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other">
                        	<p class="numberP">4</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other">
                        	<p class="numberP">5</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                        <div class="other" style="border-bottom:none;">
                        	<p class="numberP">6</p>
                            <p><a href="">新疆哈密瓜 买一送一</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="main_down">
	<?php echo $_smarty_tpl->getSubTemplate ("core/templates/bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("core/templates/copyright.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>

</body>
</html>
<?php }} ?>