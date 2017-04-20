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
<form action="" method="post" id="form1">
<div class="loginBox">
	<div class="loginline"></div>
    <div class="login_main">
    	<img style="float:left; margin-top:70px;" src="images/shengxian.png" />

		<div class="login_frame">
        	<div class="login_text">
            	<p>登录名：</p>
                <input type="text" placeholder="请输入手机号" name="mobile" id="mobile" class="alert_style_example" style="padding-left:5px;"/>
                <p>登录密码：</p>
                <input type="password" placeholder="请输入密码" name="password" id="password" style="padding-left:5px;"/>
                <input type="hidden" name="act" value="login" /> 
                <input class="loginButton" type="button" id="submit_button"/>
            </div>
            <div class="otherP">
                <input name="" type="checkbox" value="" />记住密码
                <p><a href="">忘记密码</a>
                <a style="color:#299009;" href="register.php">|免费注册</a></p>
             </div>
            <div class="partnerBox">
            	<p>合作网站用户登录</p>
                <div class="partner_img">
                <img src="images/pic01.png" />
                <img src="images/pic02.png" />	
                <img src="images/pic03.png" />	
                <img src="images/pic04.png" /></div>		
            </div>
        </div>

    </div>
</div>
</form>
  {include file="core/templates/copyright.tpl"}

<script>
$(document).ready( function() {
	$("#submit_button").click( function() {
		var register_name=$.trim($("#mobile").val());
        if(register_name=="" || register_name.length!=11){
            jAlert('请输入手机号');
        }
        else if($("#password").val()=="" || $("#password").val().length<6 || $("#password").val().length>16){
        	jAlert('请输入登录密码');
        }else{
        	document.getElementById("form1").submit();
        }
	});
	
});
</script>

</body>
</html>
