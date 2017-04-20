<?php 
	require_once('check2.php');
	
	if("save"==$_REQUEST["cmd"]){
		$b_www = $_REQUEST["b_www"];	
		$b_website = $_REQUEST['b_website'];
		$b_title = $_REQUEST['b_title'];
		$b_keyword = $_REQUEST["b_keyword"];
		$b_describe = $_REQUEST["b_describe"];
		$b_admin = $_REQUEST["b_admin"];
		$b_number = $_REQUEST["b_number"];
		
		$ret = updateBasic1($b_www,$b_website,$b_title,$b_keyword,$b_describe,'','','','',$b_admin,$b_number);
		
		echo '<script>';
		echo "alert('保存成功');";
		echo '</script>';
	}
	
	$array = getBasic();
	if(!empty($array)){
	   foreach ($array as $b) {
	   	
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
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">基础信息</div></td>
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
      <form action="" method="post" style="margin: 0px;">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left">
        	<table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;" border="0">
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">站点名称:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="b_www" id="b_www" value="<?php echo $b[1];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 网站名称，例如：百度</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">域名:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="b_website" id="b_website" value="<?php echo $b[2];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 域名，例如：baidu.com，不需要http://www.</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">网站标题:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="b_title" id="b_title" value="<?php echo $b[3];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 网站标题，例如：百度_文章管理系统</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">网站关键字:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="b_keyword" id="b_keyword" value="<?php echo $b[4];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 首页关健字，显示在标题和Keywords中，例如：cms,mycms,多个关健字用‘，’或‘|’隔开</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">网站描述:</span>&nbsp;</td>
        			<td class="td1" style="padding-top: 5px;"><textarea rows="5" cols="68" name="b_describe" id="b_describe"><?php echo $b[5];?></textarea><br>
        			<span class="left_txt">* 首页描述，显示在首页description中，例如：cms是一款简易的PHP内容管理程序，体积小，功能强大...字数控制在200个以内。</span></td>
        		</tr>
        		<!-- 
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">英文站名称:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="b_website2" id="b_website2" value="" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 网站标题，例如：百度_文章管理系统</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">英文站标题:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="b_title2" id="b_title2" value="" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 网站标题，例如：百度_文章管理系统</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">英文站关键字:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="b_keyword2" id="b_keyword2" value="" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 首页关健字，显示在标题和Keywords中，例如：cms,mycms,多个关健字用‘，’或‘|’隔开</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">英文站描述:</span>&nbsp;</td>
        			<td class="td1" style="padding-top: 5px;"><textarea rows="5" cols="68" name="b_describe2" id="b_describe2"></textarea><br>
        			<span class="left_txt">* 首页描述，显示在首页description中，例如：mycms是一款简易的PHP内容管理程序，体积小，功能强大...字数控制在200个以内。</span></td>
        		</tr>
        		 -->
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">管理员邮箱:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="b_admin" id="b_admin" value="<?php echo $b[10];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 管理员邮箱，例如：admin@vip.com</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">备案号:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="b_number" id="b_number" value="<?php echo $b[11];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 网站备案号</span></td>
        		</tr>
        		<tr>
        			<td>&nbsp;</td>
        			<td>&nbsp;
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
