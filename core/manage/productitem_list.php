<?php 
require_once("check2.php");


if("delete"==$_REQUEST["operator"] && !empty($_REQUEST["id"])){
	$delete_id = $_REQUEST["id"];
	$ret = deleteProductItem($delete_id);
	echo '<script>';
	echo $ret==1?"alert('删除成功');":"alert('删除失败');";
	echo "window.location='productitem_list.php';";
	echo '</script>';
}

$page = 1;
	
if(!empty($_REQUEST["page"])){
	$page = $_REQUEST["page"];
}

$rowid = ($page-1)*20+0;

$search1 = $_REQUEST["search1"];
$search2 = $_REQUEST["search2"];
$search3 = $_REQUEST["search3"];

$array = getProductitemPage(20,$rowid,$search1,$search2,$search3); 


$where = "&search1=".$search1."&search2=".$search2."&search3=".$search3;

$_count = getProductitemCount($search1,$search2,$search3);
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
	var type = '<?php echo $_REQUEST["search1"];?>';
	function deleteNews(id){
		if (!confirm("是否确认删除？")){ 
	        
	    }else{
	    	window.location="?operator=delete&id="+id+"&search1="+type;
	    }
	}

	function setType(type,id,checked){
		window.location="?operator=type&type="+type+"&id="+id+"&check="+checked;
	}
	</script>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">商品管理</div></td>
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
            <td width="5%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">货号</span></div></td>
            <td width="8%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">品牌</span></div></td>
            <td width="6%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1" ><span value="product_type1" onclick="order('this.value')">类别</span></div></td>
            <td width="35%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">商品名称</span></div></td>
            <td width="5%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">详细类名称</span></div></td>
            <td width="5%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">详细类价格</span></div></td>
            <td width="5%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">详细类库存</span></div></td>
            <td width="15%" height="22" background="tab/images/bg.gif" bgcolor="#FFFFFF" class="STYLE1"><div align="center">基本操作</div></td>
          </tr>
          <?php 
          	$num = 1;
          	
          	if(!empty($array)){
          	foreach ($array as $b) {  				
				?>
				<tr>
		            <td height="22" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?php echo $b['product_code']?></span></div></td>
		            <td height="22" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?php echo $b['brand_name']?></span></div></td>
		            <td height="22" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?php echo $b['m_name']?></span></div></td>
		            <td height="22" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?php echo $b['product_name']?></span></div></td>
		            <td height="22" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?php echo $b['type_name']?></span></div></td>
		            <td height="22" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?php echo $b['type_price']?></span></div></td>
		            <td height="22" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?php echo $b['type_number']?></span></div></td>
		            <td height="22" bgcolor="#FFFFFF">
		            	<div align="center">
		            	<span class="STYLE4">
		            	<img src="tab/images/edt.gif" width="16" height="16" /><a href="productitem_create.php?id=<?php echo $b['type_id'];?>" class="operator">查看明细</a>&nbsp;
		            	<img src="tab/images/del.gif" width="16" height="16" /><a href="javascript:deleteNews('<?php echo $b['type_id'];?>')" class="operator">删除</a>
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
        <table style="font-size:13px; padding: 5px;width: 100%">
	<tr>
	<td>总共<?php echo $_count?>条记录
		&nbsp;
		当前显示第：<?php echo $page?>/<?php 
				$allpage = 1;
				if($_count%20==0){
					$allpage=$_count/20;	
				}else{
					$allpage=intval($_count/20)+1;
				}
				
				echo $allpage;
		?>页
	</td>
	<td align="right" style="padding-right: 50px;">
		<a href="?page=1<?php echo $where;?>" class="operator">第一页</a>
		<?php 
			if($page-1>0){
				echo '<a href="?page='.($page-1).$where.'" class="operator">上一页</a>';
			}else{
				echo '<span class="nohref">上一页</span>';
			}
			
			if($page+1<=$allpage){
				echo '<a href="?page='.($page+1).$where.'" class="operator">下一页</a>';
			}else{
				echo '<span class="nohref">下一页</span>';
			}
		?>
		
		<a href="?page=<?php echo $allpage.$where;?>" class="operator">最后页</a>
		<select onchange="window.location='?page='+this.value+'<?php echo $where;?>'">
			<option value="1">请选择显示页</option>
			<?php 
				for ($i=1;$i<=$allpage;$i++){
					echo '<option value="'.$i.'">第',$i,'页</option>';
				}
			?>
		</select>
	</td>
	</tr>
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
