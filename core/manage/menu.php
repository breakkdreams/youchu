<?php 
require_once("check2.php");

if("delete"==$_REQUEST["operator"] && !empty($_REQUEST["floor"])){
	$floor = $_REQUEST["floor"];
	deleteMenu($floor);
}
else if("newname"==$_REQUEST["operator"] && !empty($_REQUEST["id"]) && !empty($_REQUEST["name"])){
	$id = $_REQUEST["id"];
	$name = $_REQUEST["name"];
	updateMenuName($id,$name);
}
else if("present"==$_REQUEST["operator"] && !empty($_REQUEST["id"])){
	$id = $_REQUEST["id"];
	$order = $_REQUEST["order"];

	updateM_order($id,$order);
}

$array = getMenuList();

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
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/xheditor-1.1.14-zh-cn.min.js"></script>
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
	<script type="text/javascript">
		function changeName(id){
			var name = document.getElementById("newname"+id).value;

			if(name.length==0){
				alert("请输入新的栏目名称");
				return false;
			}else{
				window.location="?operator=newname&id="+id+"&name="+name;
			}
		}

		function deleteMenu(floor){
			if (!confirm("是否确认删除此栏目及所有子栏目？")){ 
		        
		    }else{
		    	window.location="?operator=delete&floor="+floor;
		    }
		}

		function updatePhoto(id){
			
			if(document.getElementById("photo_"+id)){
				var photo = document.getElementById("photo_"+id).value;
				
				if(photo.length==0){
					alert("请上传照片");
					return false;
				}else{
					$.ajax({
				         url: "ajax_php.php",  
				         type: "POST",
				         data:{cmd:"updateMenuPhoto",id:id,photo:photo},
				         //dataType: "json",
				         error: function(){  
				             alert('Error loading XML document');  
				         },  
				         success: function(data,status){//如果调用php成功    
				             //alert(unescape(data));//解码，显示汉字
				             //alert(data);
				             if(data==0){
				            	alert("保存失败 ");
				             }else{
								alert("保存成功");
				             }

				             window.location="?";
				         }
				     });	
				}
			}
		}
	//展示菜单提交
		function present(id,check){
		
			var m_order=0;
			if(check){
				m_order=1;
			}
			window.location="?operator=present&id="+id+"&order="+m_order;
		}
	</script>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">栏目管理</div></td>
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
            <td width="5%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">序号</span></div></td>
            <td width="5%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">栏目编号</span></div></td>
            <td width="15%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">栏目名称</span></div></td>
            <td width="28%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">封面图</span></div></td>
            <td width="10%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">展示</span></div></td>
            <td width="38%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF" class="STYLE1"><div align="center">基本操作</div></td>
          </tr>
          <?php 
          	$num = 1;
          	
          	if(!empty($array)){
          	foreach ($array as $b) {  
          		if($num%2==0){
          			$tr_class = " style=\"background-color: #d2ddec\"";
          		}else{
          			$tr_class = " style=\"background-color: #fff\"";
          		}
				?>
				<tr <?php echo $tr_class;?>>
		            <td height="22"><div align="center" class="STYLE1">
		              <div align="center"><?php echo $num;?></div>
		            </div></td>
		            <td height="22"><div align="center" class="STYLE1">
		              <div align="center"><?php echo $b[0];?></div>
		            </div></td>
		            <td height="22"><div align="left"><span class="STYLE1">
		            	&nbsp;&nbsp;
						<?php 
          					echo '|';
        					for($i=0;$i<$b[3];$i++){
        						echo '---';
        					}
        					
        					if($b[3]==1)
        					{
								echo '<b><font color=red>'.$b[2].'</font></b>';
        					}else if($b[3]==2)
        					{
								echo '<b>'.$b[2].'</b>';
        					}else{
        						echo $b[2];
        					}
							?>
	            	</span></div></td>
	            	<td height="22"><div align="center" class="STYLE1">
		              <div align="center">
		              	<?php 
		              		if(empty($b[5])){
		              			echo  "<span class='nohref'>查看</span>";	
		              		}else{
		              	?>
		              	<a href='../../<?php echo $b[5];?>' target="_blank">查看</a>
		              	<?php }?>
		              	<input type="text" id="photo_<?php echo $b[0];?>" name="photo_<?php echo $b[0];?>" value="" style="width:130px;"/>
		              	<input type="button" value="添加" onclick="ShowIframe('添加文件','upload.php?cloum=photo_<?php echo $b[0];?>',400,150)"/>
		              	<input type="button" value="更新"  onclick="updatePhoto('<?php echo $b[0];?>')"/>
		              </div>
		            </div></td>
		            <td height="22"><div align="center" class="STYLE1">
		            <input type="checkbox" name="m_<?php echo $b[0]?>" value='<?php echo $b[0]?>'  <?php if('1'==$b['m_order']){echo 'checked="checked"';}?> onclick="present(this.value,this.checked)"/>
                      </div>
		            </td>
		            <td height="22">
		            	<div align="center">
		            	<span class="STYLE4">
		            	<img src="tab/images/edt.gif" width="16" height="16" />
		            	<?php 
		            	/**
		            	 * <input type="text" name="newname<?php echo $b[0];?>" id="newname<?php echo $b[0];?>" style="height: 21px;width:100px;"/>
		            	<input type="button" value="更新" style="height: 21px;" onclick="changeName('<?php echo $b[0];?>')"/>
		            	 */
		            	?>
		            	<a href="menu_create.php?id=<?php echo $b[0];?>">修改</a>
		            	|
		            	<a href="menu_create.php?parentid=<?php echo $b[0];?>">添加子栏目</a>
		            	|
		            	<img src="tab/images/del.gif" width="16" height="16" /><a href="javascript:deleteMenu('<?php echo $b[0];?>')" class="operator">删除</a>
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
