<?php
require_once("check2.php"); 


//新建品牌
if("save"==$_REQUEST["operator"]){
	$brand = array('brand_name'=>$_REQUEST["brand_name"],
				   'brand_web'=>$_REQUEST["brand_web"],
				   'brand_photo'=>$_REQUEST["brand_photo"],
				   'brand_describe'=>$_REQUEST["brand_describe"]);
	
	$ret = saveBrand($brand);
	
	echo '<script>';
	echo $ret==1?"alert('保存成功');":"alert('保存失败');";
	echo "window.location='brand_list.php'";
	echo '</script>';
}
//更新品牌
else if("update"==$_REQUEST["operator"]){
	$brand = array('brand_name'=>$_REQUEST["brand_name"],
				   'brand_web'=>$_REQUEST["brand_web"],
				   'brand_photo'=>$_REQUEST["brand_photo"],
				   'brand_describe'=>$_REQUEST["brand_describe"],
				   'brand_id'=>$_REQUEST["brand_id"]);
	
	$ret = updateBrand($brand);
	
	echo '<script>';
	echo $ret==1?"alert('保存成功');":"alert('保存失败');";
	echo "window.location='brand_list.php'";
	echo '</script>';
}

//编辑品牌信息
if(!empty($_REQUEST["id"])){
	$newsinfo = getBrandInfo($_REQUEST["id"]);
	
	if(!empty($newsinfo)){
		foreach($newsinfo as $map){
			
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/kesion.box.js"></script>
<script type="text/javascript">
	function check(){
		var n_type = document.getElementById("n_type").value;
		var n_title = document.getElementById("n_title").value;
		
		
		if(n_type.length==0){
			alert("请选择类别");
			return false;
		}else if(n_title.length==0){
			alert("请输入标题");
			return false;
		}

		return true;
	}

	function addPic(){new KesionPopup().PopupCenterIframe('品牌图片','upload.php?cloum=brand_photo',300,120,'auto');}
</script>  
<link rel="stylesheet" href="common.css" type="text/css" media="screen" />

<script type="text/javascript">
$(pageInit);
function pageInit()
{
	$.extend(xheditor.settings,{shortcuts:{'ctrl+enter':submitForm}});
	$('#elm2').xheditor({upLinkUrl:"editor_upload.php?immediate=1",upLinkExt:"zip,rar,txt",
						 upImgUrl:"editor_upload.php?immediate=1",upImgExt:"jpg,jpeg,gif,png",
						 upFlashUrl:"editor_upload.php?immediate=1",upFlashExt:"swf",
						 upMediaUrl:"editor_upload.php?immediate=1",upMediaExt:"wmv,avi,wma,mp3,mid"});
}
function insertUpload(arrMsg)
{
	var i,msg;
	for(i=0;i<arrMsg.length;i++)
	{
		msg=arrMsg[i];
		$("#uploadList").append('<option value="'+msg.id+'">'+msg.localname+'</option>');
	}
}
function submitForm(){
	//$('#frmDemo').submit();
	var str = document.getElementById("brand_describe").value;
	
	if(str==''){
		alert("请输入内容");
		return false;
	}else{
		$('#frmDemo').submit();
	}
}

function check(){
	setTimeout(submitForm,1000);
}
</script>
</head>
<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">添加内容</div></td>
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
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left">
        	<form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
        	<table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;" border="0">
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">品牌名称:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="brand_name" id="brand_name" value="<?php echo $map['brand_name'];?>" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">官方网址:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="brand_web" id="brand_web" value="<?php echo $map['brand_web'];?>" class="ipt1"/>&nbsp;
        				<span class="left_txt">* 例如: http://www.163.com</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">封面图:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="brand_photo" id="brand_photo" value="<?php echo $map['brand_photo'];?>" class="ipt1"/>
        				<input type="button" value="添加" onclick="addPic()"/>
        				<span class="left_txt">* 允许上传文件类型为：png / jpg ，文件大小请控制在200kb以内</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">描述:</span>&nbsp;</td>
        			<td class="td1">
        				<textarea name="brand_describe" id="brand_describe" style="width:720px;height:250px;"><?php echo $map['brand_describe'];?></textarea>
					</td>
        		</tr>
        		
        		<tr>
        			<td>&nbsp;</td>
        			<td>&nbsp;
        				<input type="hidden" name="operator" value="<?php echo empty($_REQUEST["id"])?"save":"update";?>"/>
        				<input type="hidden" name="brand_id" value="<?php echo $_REQUEST["id"];?>"/>
        				<input type="submit" name="" value="保存" />
        			</td>
        		</tr>
        	</table>
        	</form>
        </td>
      </tr>
      </table>
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
