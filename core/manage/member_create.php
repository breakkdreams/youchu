<?php 
	require_once("check2.php");
	
	if("save"==$_REQUEST["operator"]){
		$loginname=$_REQUEST["loginname"];
		$password=md5($_REQUEST["password"]);
		$realname = $_REQUEST["realname"];
		$phone = $_REQUEST["phone"];
		$email = $_REQUEST["email"];
		$level = $_REQUEST["level"];
		$vip = $_REQUEST["vip"];
		$member["member_login"]=$loginname;
		$member["member_password"]=$password;
		$member["member_realname"]=$realname;
		$member["member_phone"]=$phone;
		$member["member_email"]=$email;
		$member["level_id"]=$level;
		$member["vip"]=$vip;
		
		$ret = saveMember($member);
		
		echo '<script>';
		echo $ret==1?"alert('保存成功');":"alert('保存失败');";
		echo 'window.location="member_list.php";';
		echo '</script>';
	}else if("update"==$_REQUEST["operator"]){
		$loginname=$_REQUEST["loginname"];
		if(!empty($_REQUEST["password"])){
		    $password=md5($_REQUEST["password"]);
		    $member["member_password"]=$password;
		}
		$realname = $_REQUEST["realname"];
		$phone = $_REQUEST["phone"];
		$email = $_REQUEST["email"];
		$level = $_REQUEST["level"];
		$id = $_REQUEST["id"];
		$vip = $_REQUEST["vip"];
		$member["member_login"]=$loginname;
		$member["member_realname"]=$realname;		
		$member["member_phone"]=$phone;
		$member["member_email"]=$email;
		$member["level_id"]=$level;
		$member['member_id']=$id;
		$member["vip"]=$vip;

		$ret = updateMember($member);
		
		echo '<script>';
		echo $ret==1?"alert('保存成功');":"alert('保存失败');";
		echo 'window.location="member_list.php";';
		echo '</script>';
	}

	//栏目内容
$menulist = getMenuList();

if(!empty($_REQUEST["id"])){
	$member = getMemberInfo($_REQUEST["id"]);
	if(!empty($member)){
		foreach($member as $map){
			
		}
	}
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
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" src="js/popup.js"></script>  
<script type="text/javascript" src="js/popupclass.js"></script>
<script type="text/javascript">
	function check(){
		
		var loginname = document.getElementById("loginname").value;
		var password = document.getElementById("password").value;

		if(loginname.length==0){
			alert("请输入用户名");
			return false;
		}else if(password.length==0){
			if($("$password").attr("disabled")==false){
			    alert("请输入密码");
			    return false;
			}	
		}
		return true;
	}
	
	$(document).ready(function(){
		<?php if($_REQUEST["cmd"]=="update"){?>
		$("#pswdmodify").change(function(){
			if(this.checked){
				$("#password").val("");
				$("#password").attr("disabled",false);
			}
			else{
				$("#password").attr("disabled",true);
			}
			});
		<?php }?>
		$("#loginname").blur(function(){
			if($(this).val()!=""){
			$.ajax({
		         url: "ajax_php.php",
		         type: "POST",
		         async:false,
		         data:{ cmd:"loginnamecheck", loginname: $(this).val() },
		         //dataType: "json",
		         error: function () {
		             alert('Error loading XML document');
		         },
		         success: function (data, status) {
			         if(data>0){
				         $("#logincheck").html("<font color='red'>该用户名已存在，不可用</font>");
			         }
			         else{
			        	 $("#logincheck").html("<font color='green'>该用户名可用</font>");
			         }
		         }
		     });
			}
			});
	});
</script>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">添加会员</div></td>
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
      <form action="" method="post" style="margin: 0px;" onsubmit="return check();">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left">
        	<table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;" border="0">
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">会员账号:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="loginname" id="loginname" value="<?php echo $map["member_login"];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt" id="logincheck">* 用于用户登录的用户名</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">密码:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="password" name="password" id="password" <?php if($_REQUEST["cmd"]=="save"){ echo 'value="123456"';}else echo 'value="'.$map["member_password"].'" disabled';?> class="ipt1"/>&nbsp;
        			<?php if($_REQUEST["cmd"]=="update"){?>
        			<span class="left_txt">* 修改</span>
        			<input type="checkbox" id="pswdmodify">
        			<?php }?>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">真实姓名:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="realname" id="realname" value="<?php echo $map["member_realname"];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt"></span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">手机号码:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="phone" id="phone" value="<?php echo $map["member_phone"];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt"></span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">电子邮箱:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="email" id="email" value="<?php echo $map["member_email"];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt"></span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">会员等级:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="level" id="level" value="<?php echo $map["level_id"];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt"></span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">VIP等级:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="vip" id="vip" value="<?php echo $map["member_vip"];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt"></span>
        			</td>
        		</tr>
        		<tr>
        			<td>&nbsp;</td>
        			<td>&nbsp;
        				<input type="hidden" name="operator" value="<?php echo $_REQUEST["cmd"];?>"/>
        				<input type="hidden" name="id" value="<?php echo $_REQUEST["id"];?>"/>
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
