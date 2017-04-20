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
                ><a href="">我的账户</a>><a href="">密码修改</a></p>
            </div>
            <form action="" method="post" id="form1" onsubmit="return check();">
          <div class="informationBox">
           	  <div class="fillBox">
                			<div class="fillText">
                			  <div class="firstFill">
                        			<div class="fillName"><p>原始密码：</p></div>
                            		<input class="inputBox" type="password" placeholder="&nbsp;请输入当前密码" name="old_password" id="old_password"/>
                			  </div>
                              <div class="firstFill">
                        			<div class="fillName"><p>新密码：</p></div>
                            		<input class="inputBox" type="password" placeholder="&nbsp;请输入您新密码" name="new_password1" id="new_password1"/>
                			  </div>
                              <div class="firstFill">
                        			<div class="fillName"><p>确认新密码：</p></div>
                            		<input class="inputBox" type="password" placeholder="&nbsp;请输入您新密码" name="new_password2" id="new_password2"/>
                			  </div>
                          	  <input style="margin:50px 150px;" type="image" id="submit_button" src="images/tijiao_button.png" />
               			  </div>
           	  		  </div>
            </div>
            <input type="hidden" name="cmd" value="update"/>
            </form>
        </div>
    </div>
</div>
<div class="main_down">
	{include file="core/templates/bottom.tpl"}
    {include file="core/templates/copyright.tpl"}
</div>
<script>
$(document).ready( function() {
	$("#submit_button").click( function() {
		
		if($("#old_password").val()=="" || $("#old_password").val().length<6 || $("#old_password").val().length>16){
        	jAlert('请正确输入旧密码');
        	return false;
        }else if($("#new_password1").val()=="" || $("#new_password1").val().length<6 || $("#new_password1").val().length>16){
        	jAlert('请正确输入新密码');
        	return false;
        }else if($("#new_password2").val()=="" || $("#new_password2").val().length<6 || $("#new_password2").val().length>16){
        	jAlert('请正确输入确认密码');
        	return false;
        }else if($("#new_password1").val()!=$("#new_password2").val()){
        	jAlert('新密码不一致');
        	return false;
        }else{
        	document.getElementById("form1").submit();
        }

		return false;
	});
	
});

var ret = '{$ret}';

if(ret*1==1){
	jAlert('密码更新成功');
}else if(ret*1==0 && ret!=''){
	jAlert('密码更新失败');
}
</script>
</body>
</html>
