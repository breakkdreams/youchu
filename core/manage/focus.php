<?php 
require_once("check2.php");

if("delete"==$_REQUEST["operator"] && !empty($_REQUEST["id"])){
	$delete_id = $_REQUEST["id"];
	deleteFocus($delete_id);
}else if("type"==$_REQUEST["operator"] && !empty($_REQUEST["id"])){
	
	$id = $_REQUEST["id"];
	$checked = "true"==$_REQUEST["check"]?'1':'0';
	
	$ret = updateFocusDisplay($id,$checked);
	echo '<script>';
	echo $ret==1?"alert('保存成功');":"alert('保存失败');";
	echo "window.location='focus.php?page=".$_REQUEST["page"]."';";
	echo '</script>';
}

$array = getFocusLimit(20);
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

<script type="text/javascript" src="js/popup.js"></script>  
	<script type="text/javascript" src="js/popupclass.js"></script>  
	<style type="text/css">
		.search_td{
			width:65px;text-align: center	
		}
		<!--
		A:link{text-decoration:none}
		A:visited{text-decoration:none}
		A:hover {color: #ff00ff;text-decoration:underline}
		 -->
		<!--
		body {
			margin-left: 0px;
			margin-top: 0px;
			margin-right: 0px;
			margin-bottom: 0px;
		}
		.STYLE0 {font-size: 12px;color:#525252;}
		.STYLE1 {font-size: 12px}
		.STYLE3 {font-size: 12px; font-weight: bold; }
		.STYLE4 {
			color: #03515d;
			font-size: 12px;
		}
		.operator{
			color:#000;
			font-size: 13px;
		}
		.nohref{
			color:#C7C8C5;
			font-size: 13px;
		}
		-->
	</style>
	<script>
		function deleteNews(id){
			if (!confirm("是否确认删除？")){ 
		        
		    }else{
		    	window.location="?operator=delete&id="+id;
		    }
		}
		function setType(id,checked){
			var page = '<?php echo $_REQUEST["page"];?>';
			window.location="?operator=type&id="+id+"&check="+checked+"&page="+page;
		}
	</script>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">焦点管理</div></td>
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
	
	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="b5d6e6" onmouseover="changeto()"  onmouseout="changeback()" >
          <tr style="font-weight: 800">
            <td width="3%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">序号</span></div></td>
            <td width="40%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">标题</span></div></td>
            <td width="13%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">添加日期</span></div></td>
            <td width="13%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">照片</span></div></td>
            <td width="13%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">前台显示</span></div></td>
            <td width="14%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF" class="STYLE1"><div align="center">基本操作</div></td>
          </tr>
          <?php 
          	$num = 1;
          	
          	if(!empty($array)){
          	foreach ($array as $b) {  
				$m_id=$b[0];
				
				?>
				<tr>
		            <td height="22" bgcolor="#FFFFFF"><div align="center" class="STYLE1">
		              <div align="center"><?php echo $num;?></div>
		            </div></td>
		            <td height="22" bgcolor="#FFFFFF"><div align="left"><span class="STYLE1">&nbsp;<a href="<?php echo $b[4];?>" target="_blank"><?php echo $b[2];?></a></span></div></td>
		            <td height="22" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?php echo $b[5];?></span></div></td>
		            <td height="22" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><a href="../../<?php echo $b[1];?>" target="_blank">查看</a></span></div></td>
		            <td height="22" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><input type="checkbox" name="box3" value="<?php echo $b['f_id']?>" onclick="setType(this.value,this.checked);" <?php if($b['f_display']=="1"){echo 'checked="checked"';}?>/></span></div></td>
		            <td height="22" bgcolor="#FFFFFF">
		            	<div align="center">
		            	<span class="STYLE4">
		            	<img src="tab/images/edt.gif" width="16" height="16" /><a href="focus_create.php?cmd=update&id=<?php echo $b[0];?>" class="operator">查看明细</a>|
		            	<img src="tab/images/del.gif" width="16" height="16" /><a href="javascript:deleteNews('<?php echo $b[0];?>')" class="operator">删除</a>
		            	</span>
		            	</div>
		            </td>
		          </tr>
				<?php 
				$num++;
			}  
          	}
          ?>
        </table>
    
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
