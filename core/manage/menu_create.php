<?php 
	require_once("check2.php");
	
	$cmd = 'save';
	
	if("save"==$_REQUEST["cmd"]){
		$fid = $_REQUEST["fid"];
		$name = $_REQUEST["name"];
		$keyword = $_REQUEST["keyword"];
		$size = $_REQUEST["size"];
		$floor = $_REQUEST["floor"];
		$photo = $_REQUEST["n_photo"];
	
		$order = empty($_REQUEST['order'])?'1':$_REQUEST['order'];
		$ret = createMenu($fid,$name,$size,$floor,$photo,'',$keyword,$order);
		
		echo '<script>';
		echo $ret==1?"alert('保存成功');":"alert('保存失败');";
		echo 'window.location="menu.php"';
		echo '</script>';
	}else if("update"==$_REQUEST["cmd"]){ 
		$menu = array(0=>$_REQUEST['name'],
					  1=>$_REQUEST['n_photo'],
					  2=>$_REQUEST['keyword'],
					  3=>empty($_REQUEST['order'])?'1':$_REQUEST['order'],
					  4=>$_REQUEST['id']);
		$ret = updateMenu($menu);
		
		echo '<script>';
		echo $ret==1?"alert('保存成功');":"alert('保存失败');";
		echo 'window.location="menu.php"';
		echo '</script>';
	}
	
	if(!empty($_REQUEST['id'])){
		$update_id = $_REQUEST['id'];
		
		$info = getMenu($update_id);
		
		if(!empty($info)){
			foreach($info as $map){
				
			}
			
			$cmd = 'update';
		}
	}
	
	$menulist = getMenuList();
	
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
	width:222px;
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
<script type="text/javascript" src="js/xheditor-1.1.14-zh-cn.min.js"></script>
<script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" src="js/popup.js"></script>  
<script type="text/javascript" src="js/popupclass.js"></script>
<script type="text/javascript">
	function selectFid(v){
		var item = v.split("|");

		document.getElementById("fid").value=item[0];
		document.getElementById("size").value=(item[1]*1)+1;
		document.getElementById("floor").value=item[2];

		//alert(document.getElementById("floor").value);
	}

	function check(){
		var name = document.getElementById("name").value;
		var slt = document.getElementById("slt").value;
		var keyword = document.getElementById("keyword").value;
		
		if(slt.length==0){
			alert("请选择栏目信息");
			return false;
		}else if(name.length==0){
			alert("请输入栏目名称 ");
			return false;
		}else if(keyword.length>450){
			alert("栏目简介请控制在450字以内");
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
        <td height="31"><div class="titlebt">栏目添加</div></td>
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
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">上级目录:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="slt" id="slt" style="width:222px;" <?php if($cmd=='update'){echo 'disabled="disabled"';}?> onchange="javascript:selectFid(this.value)">
        					<option value=<?php echo $map[m_fid]?>>请选择</option>
        					<option value="0|0|0">一级栏目</option>
        					<?php 
        						if(!empty($menulist)){
        							
        							$parentid=$_REQUEST['parentid'];
        							
        							foreach ($menulist as $m){
        								
        								if($parentid==$m[0] || $map[1]==$m[0])
        								{
        									$slt_str = 'selected="selected"';
        								}else{
        									$slt_str = '';
        								}
        								
        								if($m[3]==1)
        								{
        									echo '<option value="'.$m[0].'|'.$m[3].'|'.$m[4].'" '.$slt_str.' style="color:red;">';	
        								}else{
        									echo '<option value="'.$m[0].'|'.$m[3].'|'.$m[4].'" '.$slt_str.' style="color:black;">';
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
        			<td align="right" class="td1"><span class="td1_bt">栏目名称:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="name" id="name" value="<?php echo $map[2];?>" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">封面图:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="n_photo" id="n_photo" value="<?php echo $map[5];?>" class="ipt1"/>
        				<input type="button" value="添加" onclick="ShowIframe('添加文件','upload.php?cloum=n_photo',400,150)"/>
        				<span class="left_txt">* 允许上传文件类型为：png / jpg ，文件大小请控制在200kb以内</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">栏目排序:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="order" id="order" value="<?php echo $map[8];?>" class="ipt1"/>&nbsp;<span class="left_txt">数字越大越靠前</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">栏目说明:</span>&nbsp;</td>
        			<td class="td1">
        				<textarea name="keyword" id="keyword" style="width:615px;height:80px"><?php echo $map[7];?></textarea>
        			</td>
        		</tr>
        		<tr>
        			<td>&nbsp;</td>
        			<td>&nbsp;
        				<input type="hidden" name="cmd" value="<?php echo $cmd;?>"/>
        				<input type="hidden" name="fid" id="fid" value="0"/>
        				<input type="hidden" name="floor" id="floor" value="0."/>
        				<input type="hidden" name="size" id="size" value="1"/>
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
<?php 
	if(!empty($parentid)){
		?>
			<script>
				var slt_str = document.getElementById("slt").value;
				//alert(slt_str);
				selectFid(slt_str);
			</script>	
		<?php 
	}
?>
</body>
</html>
