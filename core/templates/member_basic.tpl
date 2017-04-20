
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
                ><a href="">我的账户</a>><a href="">基本资料</a></p>
            </div>
          <div class="informationBox">
            	<div class="information_right">
            	<form action="" method="post">
                	<div class="information_main">
                    	<div class="mainone">
                        	<p class="userName">昵称：</p>
                            <div class="mainone_input"><input class="longInput" type="text" name="member_name" id="member_name" value="{$map['member_name']}"/></div>
                        </div>
                       
                        <div class="mainone">
                           <p class="userName">性别：</p>
                          <div class="mainone_right">
                          <div class="mainone_input">
                            <form id="form1" name="form1" method="post" action="">
                              <p>
                                <label>
                                  <input class="radioBox" type="radio" name="member_sex" value="1" {if $map['member_sex'] eq '1'}checked="checked"{/if}/>
                                <img src="images/nan.png" /></label>
                                <label>
                                  <input class="radioBox"  type="radio" name="member_sex" value="2"  {if $map['member_sex'] eq '2'}checked="checked"{/if}/>
                                <img src="images/nv.png" /></label>
                              </p>
                            </form>
                          </div>
                          </div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">邮箱：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="member_email" id="member_email" value="{$map['member_email']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">联系电话：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="member_tel" id="member_tel" value="{$map['member_tel']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">手机号：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="member_phone" id="member_phone" value="{$map['member_phone']}" readonly="readonly"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">邮编：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="member_zip" id="member_zip" value="{$map['member_zip']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">地址：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="member_address" id="member_address" value="{$map['member_address']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">生日：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="member_birthday" id="member_birthday" value="{$map['member_birthday']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">姓名：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="member_realname" id="member_realname" value="{$map['member_realname']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">所在城市：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="member_city" id="member_city" value="{$map['member_city']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">QQ：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="member_qq" id="member_qq" value="{$map['member_qq']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">微信：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="member_weixin" id="member_weixin" value="{$map['member_weixin']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">旺旺：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="member_wang" id="member_wang" value="{$map['member_wang']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">微博：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="member_weibo" id="member_weibo" value="{$map['member_weibo']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">职业：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="member_job" id="member_job" value="{$map['member_job']}"/></div>
                        </div>
                        
                        <div class="mainlast">
                         <!-- <p>企业未认证</p>
                          <p class="change"><a href="">企业认证</a></p>-->
                          <img src="images/001.jpg" />
                          <div class="qiyebg">
                          	<p>认证成为企业会员
                            </br>价格更加优惠</p>
                            <p><a href="#">立即认证</a></p>
                          </div>
                        </div>
                        <input type="hidden" name="cmd" value="edit"/>
                        <input style="margin-top:20px; margin-left:150px;" type="image" src="images/baocun.png" onclick="check();"/>
                    </div>
                </div>
                </form>
                <div class="information_left">
                	<div class="head_kuang" style="background-image:url(images/touxiangbg.png)">
                    	<img src="images/head.png" />                    
                    </div>
                    <div class="head_text">
                    <input type="image" src="images/xuanzetupian.png" />
                    </div>
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
<script>
var ret = '{$ret}';

if(ret>0){
	jAlert('更新成功');
}
</script>
</body>
</html>
