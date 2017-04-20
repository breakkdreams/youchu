<?php 
	header("Content-Type: text/html; charset=utf-8");
	session_start();
	require_once("check2.php");
	
	if("save"==$_REQUEST["cmd"]){
		$username = $_REQUEST['username'];
		$oldpassword=$_REQUEST["old_pass"];
		$newpassword=$_REQUEST["new_pass"];
		$id = $_REQUEST['id'];
		
		$ret = changePassword($id,$username,$newpassword,$oldpassword);
		
		echo '<script>';
		echo $ret==1?"alert('保存成功');":"alert('保存失败');";
		echo '</script>';
		
		$_SESSION["_username"] = $username;
	}
	
?>
<html>
<head>
<link href="images/skin.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #EEF2FB;
}
.ipt1{
	width:350px;
}
.td1{
	border-bottom:1px solid #cabfbf;
}
.td1_bt {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bold;
	color: #395a7b;
}
-->
</style>
<script type="text/javascript">
	function check(){
		var old_pass = document.getElementById("old_pass").value;
		var new_pass = document.getElementById("new_pass").value;
		var new_pass2 = document.getElementById("new_pass2").value;

		if(old_pass.length==0){
			alert("请输入旧密码");
			return false;
		}
		else if(new_pass.length<6 || new_pass.length>15){
			alert("请正确输入新密码");
			return false;
		}
		else if(new_pass2.length<6 || new_pass2.length>15){
			alert("请正确输入确认密码");
			return false;
		}
		else if(new_pass!=new_pass2){
			alert("新密码不一致，请从新输入");
			return false;
		}


		return true;
	}
</script>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">管理员</div></td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="images/mail_rightbg.gif"><img src="images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td valign="middle" background="images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" valign="top">&nbsp;</td>
        <td>&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
      </table>
      <form action="" method="post" style="margin: 0px;" onsubmit="return check()">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left">
        	<table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;" border="0">
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">登陆账号:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="name" id="name" value="<?php echo $_SESSION["_name"]?>" readonly="readonly" class="ipt1"/>&nbsp;
        			
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">姓名:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="username" id="username" value="<?php echo $_SESSION["_username"]?>" class="ipt1"/>&nbsp;
        			
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">旧密码:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="password" name="old_pass" id="old_pass" value="" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">新密码:</span>&nbsp;</td>
        			<td class="td1"><input type="password" name="new_pass" id="new_pass" value="" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 新密码长度为6-15</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">确认密码:</span>&nbsp;</td>
        			<td class="td1"><input type="password" name="new_pass2" id="new_pass2" value="" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		<tr>
        			<td>&nbsp;</td>
        			<td>&nbsp;
        				<input type="hidden" name="id" value="<?php echo $_SESSION["_id"];?>"/>
        				<input type="hidden" name="cmd" value="save"/>
        				<input type="submit" name="" value="保存">
        			</td>
        		</tr>
        	</table>
        	
        </td>
      </tr>
      </table>
      </form>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="40" colspan="4"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
          <tr>
            <td></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="2%">&nbsp;</td>
        <td width="51%" class="left_txt"><img src="images/icon-mail2.gif" width="16" height="11"> 客户服务邮箱：39980128@qq.com<br>
              <img src="images/icon-phone.gif" width="17" height="14"> 技术支持QQ：39980128</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td background="images/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom" background="images/mail_leftbg.gif"><img src="images/buttom_left2.gif" width="17" height="17" /></td>
    <td background="images/buttom_bgs.gif"><img src="images/buttom_bgs.gif" width="17" height="17"></td>
    <td valign="bottom" background="images/mail_rightbg.gif"><img src="images/buttom_right2.gif" width="16" height="17" /></td>
  </tr>
</table>
</body>
</html>
