<?php 
	require_once("check2.php");
	
	if("save"==$_REQUEST["operator"]){
		$name=$_REQUEST["name"];
		$link=$_REQUEST["link"];
		$photo = $_REQUEST["photo"];
		$order = empty($_REQUEST['order'])?"0":$_REQUEST['order'];
		$m_id = $_REQUEST["m_id"];
		$describe = $_REQUEST["describe"];
		$ret = createFocus($photo,$name,$order,$link,$describe,$m_id);
		
		echo '<script>';
		echo $ret==1?"alert('保存成功');":"alert('保存失败');";
		echo '</script>';
	}else if("update"==$_REQUEST["operator"]){
		$name=$_REQUEST["name"];
		$link=$_REQUEST["link"];
		$photo = $_REQUEST["photo"];
		$order = empty($_REQUEST['order'])?"0":$_REQUEST['order'];
		$m_id = $_REQUEST["m_id"];
		$describe = $_REQUEST["describe"];
		$id = $_REQUEST["id"];
		
		$ret = updateFocus($id,$photo,$name,$order,$link,$describe,$m_id);
		
		echo '<script>';
		echo $ret==1?"alert('保存成功');":"alert('保存失败');";
		echo '</script>';
	}

	//栏目内容
$menulist = getMenuList();

if(!empty($_REQUEST["id"])){
	$focus = getFocusById($_REQUEST["id"]);
	
	if(!empty($focus)){
		foreach($focus as $map){
			
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
<script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" src="js/popup.js"></script>  
<script type="text/javascript" src="js/popupclass.js"></script>
<script type="text/javascript">
	function check(){
		var name = document.getElementById("name").value;
		var link = document.getElementById("link").value;
		var photo = document.getElementById("photo").value;
		var mid = document.getElementById("m_id").value;

		if(mid.length==0){
			alert("请选择广告栏目");
			return false;
		}else if(name.length==0){
			alert("请输入广告标题");
			return false;
		}else if(link.length==0){
			alert("请输入链接地址");
			return false;
		}else if(photo.length==0){
			alert("请上传广告图片");
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
        <td height="31"><div class="titlebt">添加广告</div></td>
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
        			<td align="right" class="td1"><span class="td1_bt">栏目类别:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="m_id" id="m_id">
        					<option value="0">请选择</option>
        					<option value="1">网页顶部</option>
        					<option value="2">轮播大图</option>
        					<option value="3">轮播下小图</option>
        					<option value="4">右侧广告</option>
        					<option value="5">大背景广告</option>
        				</select>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">广告标题:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="name" id="name" value="<?php echo $map[2];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 广告显示的新闻标题</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">链接地址:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="link" id="link" value="<?php echo $map[4];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 广告链接地址，例如：http://www.0573sg.com/item-688.html</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">广告图片:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="photo" id="photo" value="<?php echo $map[1];?>" class="ipt1"/>
        				<input type="button" value="添加" onclick="ShowIframe('添加文件','upload.php?cloum=photo',400,150)"/>
        				<span class="left_txt">* 允许上传文件类型为：png / jpg ，文件大小请控制在200kb以内</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">排序:</span>&nbsp;</td>
        			<td class="td1"><input type="text" name="order" id="order" value="<?php echo $map[3];?>" maxlength="4" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 填写阿拉伯数字，数字越大排名越靠前</span></td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">描述:</span>&nbsp;</td>
        			<td class="td1">
        				<textarea rows="6" cols="45" name="describe" id="describe"><?php echo $map[7];?></textarea>
        				<span class="left_txt">* 请控制在200个汉字以内</span>
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
