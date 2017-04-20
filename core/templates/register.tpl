<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include file="core/templates/header.tpl"}
<link href="css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="headerBox">
{include file="core/templates/top.tpl"}
</div>
<div class="loginBox">
	<div class="loginline"></div>
    <div class="login_main">
		<div class="registerBox">
        	<div class="register_text">
            	<div class="register_title"><img style="margin-left:280px;" src="images/shouji.png" /><p>手机注册</p>
                <img style="margin-left:180px; margin-top:10px;" src="images/greenLine.png" /></div>
                <form action="" method="post" id="form1">
                <div class="register_main">
                	<div class="textOne">
                    	<p>手机号</p>
                        <input type="text" name="register_name" id="register_name" placeholder="&nbsp;请输入手机号码" />
                    </div><!--
                    <div class="textOne">
                    	<p>验证码</p>
                        <input style="width:153px;" type="text" name="verifycode" id="verifycode" placeholder="&nbsp;请输入验证码" />
                        <input class="get" type="button" />
                    </div>
                    --><div class="textOne">
                    	<p>设置密码</p>
                        <input type="password" name="password" id="password" placeholder="&nbsp;6-20位字符，可由英文、数字、符号组成" />
                    </div>
                    <div class="textOne">
                    	<p>确认密码</p>
                        <input type="password" placeholder="&nbsp;请再次输入密码" name="password_ok" id="password_ok"/>
                    </div>
                    <div class="textTwo">
                    	<input name="protocol" type="checkbox" id="protocol"/>
                        <p>我已阅读并接受<a href="">《生鲜网服务条款》</a>。</p>
                    </div>
                    <input type="hidden" name="act" value="register" /> 
                    <input class="zhuce" type="button" id="submit_button" />
                </div>
            </div>
            </form>
            <div class="register_right">
            	<p>已有账号?</p><input type="button"  onclick="window.location.href='index.html'"/><!--
                <div class="hezuo">
                	<p>使用其他合作网站账号一键登陆</p>
                    <img src="images/pic01.png" />
                    <img src="images/pic02.png" />
                    <img src="images/pic03.png" />
                    <img src="images/pic04.png" />
                </div>
            --></div>
        </div>
		
    </div>
</div>
  {include file="core/templates/copyright.tpl"}
<script>
var error = '{$error}';
$(document).ready( function() {
	$("#submit_button").click( function() {
		if($("#protocol").is(":checked")){
	     	var register_name=$.trim($("#register_name").val());
	         if(register_name=="" || register_name.length!=11){
	             jAlert('请输入手机号');
	         }
	         else if($("#password").val()=="" || $("#password").val().length<6 || $("#password").val().length>16){
	         	jAlert('请输入登录密码');
	         }
	         else if($("#password_ok").val()=="" || $("#password_ok").val().length<6 || $("#password_ok").val().length>16){
	         	jAlert('请输入确认密码');
	         }
	         else if($("#password").val()!=$("#password_ok").val()){
	         	jAlert('两次密码输入不一致，请重输');
	         }
	         else{
	        	document.getElementById("form1").submit();
	         }
	         return false;
	    }else{
	    	jAlert('请查看生鲜网交易条款');
	    }
	    return false;
	});
	
});

if(1==error){
	jAlert('该手机号已经存在！');
}else if(2==error){
	jAlert('网络不给力，注册失败，请重试！');
}
</script>
</body>
</html>
