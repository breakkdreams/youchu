<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:07:52
         compiled from "core\templates\top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:354858f817f80baf36-24200127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '012cb7b5539c573e5f5581ccb1d75780578eed23' => 
    array (
      0 => 'core\\templates\\top.tpl',
      1 => 1451443675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '354858f817f80baf36-24200127',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'login_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58f817f8122b05_01356736',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f817f8122b05_01356736')) {function content_58f817f8122b05_01356736($_smarty_tpl) {?><div class="headerBox">
    <div class="headerNav">
        <div class="headerText">
        	<div class="leftNav">
            <p>您好<?php echo $_smarty_tpl->tpl_vars['login_name']->value;?>
，欢迎光临生鲜网！</p>
            <?php if ($_smarty_tpl->tpl_vars['login_name']->value==''){?>
            <p><a href="login.php">登陆</a></p>
            <p><a href="register.php">注册</a></p>   
            <?php }else{ ?>
            <p><a href="logout.php">退出</a></p>
            <?php }?>
            <p><a href=""><img src="images/shoucang.png" />收藏网站</a></p>
        </div>
        
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript">
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

function jsddm_open()
{	jsddm_canceltimer();
	jsddm_close();
	ddmenuitem = $(this).find('ul').eq(0).css('visibility', 'visible');}

function jsddm_close()
{	if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}

function jsddm_timer()
{	closetimer = window.setTimeout(jsddm_close, timeout);}

function jsddm_canceltimer()
{	if(closetimer)
	{	window.clearTimeout(closetimer);
		closetimer = null;}}

$(document).ready(function()
{	$('#jsddm > li').bind('mouseover', jsddm_open);
	$('#jsddm > li').bind('mouseout',  jsddm_timer);});

document.onclick = jsddm_close;
  </script>
        	<div class="rightNav">
           <!-- <p><a href="">我的账户</a><img class="jiantou" src="images/jiantou.png" /></p>-->
              <ul id="jsddm">
	<li><a href="member.php">我的账户<img style="float:right; margin-right:10px;" class="jiantou" src="images/jiantou.png" /></a>
		<ul>
			<li><a style="padding:0 8px;" href="member.php">我的订单</a></li>
			<li><a style="padding:0 8px;" href="cart_list.php">我的购物车</a></li>
			<li><a style="padding:0 8px;" href="#">我的帮助</a></li>
		</ul>
	</li>
</ul>
<div class="clear"> </div>
            <p><a href="">帮助中心</a></p>
            <p><a href="">配送范围</a></p>
            <img src="images/weixin.png" />
            <img src="images/weibo.png" />
            <img src="images/tengxun.png" />
        </div>
        </div>
    </div>
    <div style="width:100%;height:60px; background-image:url(images/guanggao.png); float:left;margin-bottom:5px;"></div>
    <div class="headerMain">
        	<a href="index.php"><img src="images/logo.png" /></a>
            <div class="searchBox">
            	<input class="textInput" type="text" name="top_key" id="top_key" placeholder="热带进口水果" style="padding-left: 5px;"/>
            	<input class="searchInput" type="button" value="搜索" onclick="topSearch();"/>
                <p>热门搜索：<a href="list.php?key=达利园">达利园</a><a href="list.php?key=大闸蟹">大闸蟹</a><a href="list.php?key=番茄">番茄</a></p>
                <form action="list.php" method="post" name="topSearchForm" id="topSearchForm">
                <input type="hidden" name="key" id="search_key" value=""/>
                </form>
                <script type="text/javascript">
                	function topSearch(){
						if(document.getElementById("top_key").value.length>0){
							document.getElementById("search_key").value=document.getElementById("top_key").value;
							document.getElementById("topSearchForm").submit();
						}else{
							jAlert("请输入查询商品名称");
						}
                	}
                </script>
            </div>
            <div class="slogan">
            	<p>免费配送&nbsp;&nbsp;农场直供&nbsp;&nbsp;冷链配送</p>
                <p class="telP"><img src="images/phone.png" />4006-123-123</p>
            </div>
    </div>
</div><?php }} ?>