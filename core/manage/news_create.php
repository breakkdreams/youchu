<?php
require_once("check2.php"); 


//新建资讯
if("save"==$_REQUEST["operator"]){
	$n_type = $_REQUEST["n_type"];
	$n_title = $_REQUEST["n_title"];
	$n_source = $_REQUEST['n_source'];
	$n_author = $_REQUEST['n_author'];
	$n_photo = $_REQUEST['n_photo'];
	$n_file = $_REQUEST['n_file'];
	$n_red = empty($_REQUEST['n_red'])?"0":$_REQUEST['n_red'];
	$content = $_REQUEST['elm2'];
	$n_order=$_REQUEST['n_order'];
	
	$ret = createNews($n_title,$n_type,'','',$content,$n_photo,$n_source,$n_author,$n_file,$n_red,$n_order);
	
	echo '<script>';
	echo $ret==1?"alert('保存成功');":"alert('保存失败');";
	echo "window.location='news.php?search1=".$n_type."'";
	echo '</script>';
}else //更新资讯
if("update"==$_REQUEST["operator"]){
	$n_type = $_REQUEST["n_type"];
	$n_title = $_REQUEST["n_title"];
	$n_source = $_REQUEST['n_source'];
	$n_author = $_REQUEST['n_author'];
	$n_photo = $_REQUEST['n_photo'];
	$n_file = $_REQUEST['n_file'];
	$n_red = empty($_REQUEST['n_red'])?"0":$_REQUEST['n_red'];
	$content = $_REQUEST['elm2'];
	//$content = str_replace('../../upload',WEB_PATH.'/upload/',$content);
	$n_id = $_REQUEST['id'];
	$n_order=$_REQUEST['n_order'];
	
	$ret = updateNews($n_id,$n_title,$n_type,'','',$content,$n_photo,$n_source,$n_author,$n_file,$n_red,$n_order);
	
	echo '<script>';
	echo $ret==1?"alert('保存成功');":"alert('保存失败');";
	echo "window.location='news.php?search1=".$n_type."'";
	echo '</script>';
}

//栏目内容
$menulist = getMenuList();

//编辑资讯信息
if(!empty($_REQUEST["id"])){
	$newsinfo = getNewsInfo($_REQUEST["id"]);
	
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
<script type="text/javascript" src="js/popup.js"></script>  
<script type="text/javascript" src="js/popupclass.js"></script>
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
</script>  
<link rel="stylesheet" href="common.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/xheditor-1.1.14-zh-cn.min.js"></script>
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
	var str = document.getElementById("elm2").value;
	alert(str);
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
        			<td align="right" class="td1"><span class="td1_bt">内容类别:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="n_type" id="n_type">
        					<option value="">请选择</option>
        					<?php 
        						if(!empty($menulist)){
        							foreach ($menulist as $m){
        								$selected='';
        						
		        						if($m[0]==$map[2]){
		        							$selected="selected='selected'";
		        						}else if($_REQUEST["type"]==$m[0]){
		        							$selected="selected='selected'";
		        						}
        						
        								if($m[3]==1)
        								{
        									echo '<option value="'.$m[0].'" '.$selected.'  style="color:red;">';	
        								}else{
        									echo '<option value="'.$m[0].'"  '.$selected.' style="color:black;">';
        								}
        								echo '|';
        								for($i=0;$i<$m[3];$i++){
        									echo '--';
        								}
        								echo $m[2];
        								echo '</option>';
        							}
        						}
        					?>
        				</select>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">内容名称:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="n_title" id="n_title" value="<?php echo $map[3];?>" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">来源:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="n_source" id="n_source" value="<?php echo $map[7];?>" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">发布人员:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="n_author" id="n_author" value="<?php echo $map[6];?>" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">封面图:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="n_photo" id="n_photo" value="<?php echo $map[9];?>" class="ipt1"/>
        				<input type="button" value="添加" onclick="ShowIframe('添加文件','upload.php?cloum=n_photo',400,150)"/>
        				<span class="left_txt">* 允许上传文件类型为：png / jpg ，文件大小请控制在200kb以内</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">视频文件:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="n_file" id="n_file" value="<?php echo $map[10];?>" class="ipt1"/>
        				<input type="button" value="添加" onclick="ShowIframe('添加文件','upload.php?cloum=n_file',400,150)"/>
        				<span class="left_txt">* 允许上传文件类型为：flv，建议文件大小请控制在20M以内</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">排序:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="n_order" id="n_order" value="<?php echo empty($map[13])?'0':$map[13];?>"/>&nbsp;
        				<span class="left_txt">* 输入阿拉伯数字，数字越大越靠前</span>
        			</td>
        		</tr>
        		<!-- 
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">加粗显示:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="checkbox" name="n_red" id="n_red" value="1"/>&nbsp;
        			</td>
        		</tr>
        		 -->
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">内容:</span>&nbsp;</td>
        			<td class="td1">
        				<textarea id="elm2" name="elm2" style="width:720px;height:250px;"><?php echo $map[8];?></textarea>
					</td>
        		</tr>
        		
        		<tr>
        			<td>&nbsp;</td>
        			<td>&nbsp;
        				<input type="hidden" name="operator" value="<?php echo $_REQUEST["cmd"];?>"/>
        				<input type="hidden" name="id" value="<?php echo $_REQUEST["id"];?>"/>
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
