<?php 
require_once("check2.php");

/**
 * 新浪博客编辑器PHP版封装类调用方法
 * 
 */

include_once('sinaEditor.class.php');

extract($_POST);
extract($_GET);
unset($_POST,$_GET);

$editor=new sinaEditor('gently_editor');
$editor->Value='';
$editor->BasePath='.';
$editor->Height=560;
$editor->Width=621;
$editor->AutoSave=false;


//更新企业信息
if("save"==$_REQUEST["cmd"]){
	$b_company = $_REQUEST["b_company"];
	$b_address = $_REQUEST["b_address"];
	$b_tel = $_REQUEST['b_tel'];
	$b_fox = $_REQUEST['b_fox'];
	$b_code = $_REQUEST['b_code'];
	$b_email = $_REQUEST['b_email'];
	$b_info2 = $_REQUEST['b_info2'];
	$content = htmlspecialchars($gently_editor);
	
	$ret = updateBasic2($b_company,$b_address,$b_tel,$b_fox,$b_code,$b_email,$content,$b_info2,'','');
	
	echo '<script>';
	echo "alert('$ret');";
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
        <td height="31"><div class="titlebt">企业信息</div></td>
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
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">企业名称:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="b_company" id="b_company" value="<?php echo $b[12];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 企业全称，例如：阿斯利康(北京)贸易有限公司</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">联系地址:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="b_address" id="b_address" value="<?php echo $b[13];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 企业地址，例如：北京市东城区鼓楼外大街00号万网大厦一层</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">联系电话:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="b_tel" id="b_tel" value="<?php echo $b[14];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 座机或者手机号码，例如：0573-82888888</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">传真号码:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="b_fox" id="b_fox" value="<?php echo $b[21];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 公司传真号码，例如：0573-82888888</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">邮政编码:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="b_code" id="b_code" value="<?php echo $b[15];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 企业所在区域邮编，例如：314001</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">E-Mail:</span>&nbsp;</td>
        			<td class="td1" style="padding-top: 5px;"><input type="text" name="b_email" id="b_email" value="<?php echo $b[16];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 企业联系电子邮件地址，例如：admin@vip.com</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">企业文化:</span>&nbsp;</td>
        			<td class="td1" style="padding-top: 5px;padding-bottom: 5px;">
        				<textarea style="width:550px;height:90px;" name="b_info2" id="b_info2"><?php echo $b[20];?></textarea>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">企业简介:</span>&nbsp;</td>
        			<td class="td1">
        				<?php
							$content = StringUtil::unihtml($b[17]);
							$editor->Value=$content;
							$editor->Create();
						?>		
					</td>
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
