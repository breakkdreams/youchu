<?php
require_once("check2.php"); 

//栏目内容
$menulist = getProductMenuList();

//品牌列表
$brandlist = getBrandList();

//新建商品
if("save"==$_REQUEST["operator"]){
	
	$scope = array();
	
	$scope = $_REQUEST["product_scope"];
	
	$my_scope = '';
	
	foreach ($scope as $k=>$v){ 
		if($my_scope==''){
			$my_scope = $v;
		}
		else{
			$my_scope = $my_scope.','.$v;
		}
	}
	
	$product = array('product_name'=>$_REQUEST["product_name"],
				   'product_title'=>$_REQUEST["product_title"],
				   'product_code'=>$_REQUEST["product_code"],
				   'product_prompt'=>$_REQUEST["product_prompt"],
				   'product_place'=>$_REQUEST["product_place"],
				   'product_scope'=>$my_scope,
	               'product_head'=>$_REQUEST["product_head"],
	               'product_subhead'=>$_REQUEST["product_subhead"],
				   'product_describe'=>$_REQUEST["product_describe"],
				   'product_qrcode'=>$_REQUEST["product_qrcode"],
				   'product_prompt'=>$_REQUEST["product_prompt"],
				   'product_self'=>empty($_REQUEST["product_self"])?'0':$_REQUEST["product_self"],
				   'product_morning'=>empty($_REQUEST["product_morning"])?'0':$_REQUEST["product_morning"],
				   'product_type1'=>empty($_REQUEST["product_type1"])?'0':$_REQUEST["product_type1"],
				   'product_type2'=>empty($_REQUEST["product_type2"])?'0':$_REQUEST["product_type2"],
				   'product_type3'=>empty($_REQUEST["product_type3"])?'0':$_REQUEST["product_type3"],
				   'product_type4'=>empty($_REQUEST["product_type4"])?'0':$_REQUEST["product_type4"],
				   'brand_id'=>empty($_REQUEST["brand_id"])?'0':$_REQUEST["brand_id"],
				   'product_price1'=>empty($_REQUEST["product_price1"])?'0':$_REQUEST["product_price1"],
				   'product_price2'=>empty($_REQUEST["product_price2"])?'0':$_REQUEST["product_price2"],
				   'product_weight'=>empty($_REQUEST["product_weight"])?'0':$_REQUEST["product_weight"],
				   'product_amount'=>empty($_REQUEST["product_amount"])?'0':$_REQUEST["product_amount"],
				   'discount_amount'=>empty($_REQUEST["discount_amount"])?'0':$_REQUEST["discount_amount"],
				   'discount_price'=>empty($_REQUEST["discount_price"])?'0':$_REQUEST["discount_price"],
				   'add_point1'=>empty($_REQUEST["add_point1"])?'0':$_REQUEST["add_point1"],
				   'add_point2'=>empty($_REQUEST["add_point2"])?'0':$_REQUEST["add_point2"],
				   'temp_price'=>empty($_REQUEST["temp_price"])?'0':$_REQUEST["temp_price"],
				   'product_temp'=>empty($_REQUEST["product_temp"])?'0':$_REQUEST["product_temp"],
				   'product_content'=>$_REQUEST["elm2"],
				   'product_top'=>empty($_REQUEST["product_top"])?'0':$_REQUEST["product_top"],
				   'product_units'=>$_REQUEST["product_units"],
				   'product_logo'=>$_REQUEST["product_logo"],
	               'vip_price'=>empty($_REQUEST["vip_price"])?$_REQUEST["product_price1"]:$_REQUEST["vip_price"],
				   'product_pic'=>$_REQUEST["product_pic"],
				   'product_pack'=>$_REQUEST["product_pack"]);
	
	$ret = saveProduct($product);
	
	echo '<script>';
	echo $ret==1?"alert('保存成功');":"alert('保存失败');";
	echo "window.location='product_list.php'";
	echo '</script>';
}
//更新商品
else if("update"==$_REQUEST["operator"]){
	
	$scope = array();
	
	$scope = $_REQUEST["product_scope"];
	
	$my_scope = '';
	
	foreach ($scope as $k=>$v){ 
		if($my_scope==''){
			$my_scope = $v;
		}
		else{
			$my_scope = $my_scope.','.$v;
		}
	}
	
	$product = array('product_id'=>$_REQUEST["product_id"],
				   'product_name'=>$_REQUEST["product_name"],
				   'product_title'=>$_REQUEST["product_title"],
				   'product_code'=>$_REQUEST["product_code"],
				   'product_prompt'=>$_REQUEST["product_prompt"],
				   'product_place'=>$_REQUEST["product_place"],
				   'product_scope'=>$my_scope,
		           'product_head'=>$_REQUEST["product_head"],
	               'product_subhead'=>$_REQUEST["product_subhead"],
				   'product_describe'=>$_REQUEST["product_describe"],
				   'product_qrcode'=>$_REQUEST["product_qrcode"],
				   'product_prompt'=>$_REQUEST["product_prompt"],
				   'product_self'=>empty($_REQUEST["product_self"])?'0':$_REQUEST["product_self"],
				   'product_morning'=>empty($_REQUEST["product_morning"])?'0':$_REQUEST["product_morning"],
				   'product_type1'=>empty($_REQUEST["product_type1"])?'0':$_REQUEST["product_type1"],
				   'product_type2'=>empty($_REQUEST["product_type2"])?'0':$_REQUEST["product_type2"],
				   'product_type3'=>empty($_REQUEST["product_type3"])?'0':$_REQUEST["product_type3"],
				   'product_type4'=>empty($_REQUEST["product_type4"])?'0':$_REQUEST["product_type4"],
				   'brand_id'=>empty($_REQUEST["brand_id"])?'0':$_REQUEST["brand_id"],
				   'product_price1'=>empty($_REQUEST["product_price1"])?'0':$_REQUEST["product_price1"],
				   'product_price2'=>empty($_REQUEST["product_price2"])?'0':$_REQUEST["product_price2"],
				   'product_weight'=>empty($_REQUEST["product_weight"])?'0':$_REQUEST["product_weight"],
				   'product_amount'=>empty($_REQUEST["product_amount"])?'0':$_REQUEST["product_amount"],
				   'discount_amount'=>empty($_REQUEST["discount_amount"])?'0':$_REQUEST["discount_amount"],
				   'discount_price'=>empty($_REQUEST["discount_price"])?'0':$_REQUEST["discount_price"],
				   'add_point1'=>empty($_REQUEST["add_point1"])?'0':$_REQUEST["add_point1"],
				   'add_point2'=>empty($_REQUEST["add_point2"])?'0':$_REQUEST["add_point2"],
				   'temp_price'=>empty($_REQUEST["temp_price"])?'0':$_REQUEST["temp_price"],
				   'product_temp'=>empty($_REQUEST["product_temp"])?'0':$_REQUEST["product_temp"],
				   'product_content'=>$_REQUEST["elm2"],
				   'product_top'=>empty($_REQUEST["product_top"])?'0':$_REQUEST["product_top"],
				   'product_units'=>$_REQUEST["product_units"],
				   'product_logo'=>$_REQUEST["product_logo"],
	               'vip_price'=>$_REQUEST["vip_price"],
				   'product_pic'=>$_REQUEST["product_pic"],
				   'product_pack'=>$_REQUEST["product_pack"]);
	
	$ret = updateProduct($product);
	
	echo '<script>';
	echo $ret==1?"alert('保存成功');":"alert('保存失败');";
	echo "window.location='product_list.php'";
	echo '</script>';
}

//编辑品牌信息
if(!empty($_REQUEST["id"])){
	$newsinfo = getProductInfo($_REQUEST["id"]);
	
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
<script type="text/javascript" src="js/xheditor-1.1.14-zh-cn.min.js"></script>
<script type="text/javascript" src="js/kesion.box.js"></script>
<script type="text/javascript">
	function addPic(){new KesionPopup().PopupCenterIframe('品牌图片','upload.php?add=true&cloum=product_logo',300,120,'auto');}
	function addQrcode(){new KesionPopup().PopupCenterIframe('二维码','upload.php?add=false&cloum=product_qrcode',300,120,'auto');}
	
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
		//$('#frmDemo').submit();
	}
}
$(document).ready(function(){
	<?php if(!empty($_REQUEST["id"])){?>
	$("#save").click(function(){
		$("#cmd").val("update");
		check();
		});
	$("#create").click(function(){
		$("#cmd").val("save");
		check();
		});
	<?php }
	else{?>
	$("#save").click(function(){
		$("#cmd").val("save");
		check();
		});
	<?php }?>
	
});
function check(){

	var product_logo = document.getElementById("product_logo").value;

	if(product_logo.indexOf(",")==0){
		product_logo = product_logo.substring(1,product_logo.length);
		document.getElementById("product_logo").value = product_logo;
	}
	var pics = product_logo.split(",");

	if(pics.length>0){
		document.getElementById("product_pic").value = pics[0];
	}
	
	var n_type = document.getElementById("product_type1").value;
	var n_title = document.getElementById("product_name").value;
	if(n_type.length==0){
		alert("请选择类别");
		return false;
	}else if(n_title.length==0){
		alert("请输入标题");
		return false;
	}else{
		$('#frmDemo').submit();
	}	
	//setTimeout(submitForm,1000);
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
        	<form method="post" action="?"  id="frmDemo" style="margin: 0px;">
        	<table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;" border="0">
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">商品类别:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="product_type1" id="product_type1" style="width:180px;">
        					<option value="">请选择</option>
        					<?php 
        						if(!empty($menulist)){
        							foreach ($menulist as $m){
        								$selected='';
        						
		        						if($m[0]==$map['product_type1']){
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
        				&nbsp;
        				<select name="product_type2" id="product_type2" style="width:180px;">
        					<option value="">请选择</option>
        					<?php 
        						if(!empty($menulist)){
        							foreach ($menulist as $m){
        								$selected='';
        						
		        						if($m[0]==$map['product_type2']){
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
        				&nbsp;
        				<select name="product_type3" id="product_type3" style="width:180px;">
        					<option value="">请选择</option>
        					<?php 
        						if(!empty($menulist)){
        							foreach ($menulist as $m){
        								$selected='';
        						
		        						if($m[0]==$map['product_type3']){
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
        				&nbsp;
        				<select name="product_type4" id="product_type4" style="width:180px;">
        					<option value="">请选择</option>
        					<?php 
        						if(!empty($menulist)){
        							foreach ($menulist as $m){
        								$selected='';
        						
		        						if($m[0]==$map['product_type4']){
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
        				<?php if(!empty($_REQUEST["id"])){?><input type="button" id="create" value="保存为类似产品" /><?php }?>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">商品品牌:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="brand_id" id="brand_id" style="width:180px;">
        					<option value="">请选择</option>
        					<?php 
        						if(!empty($brandlist)){
        							foreach ($brandlist as $m){
        								$selected='';
        						
		        						if($m[0]==$map['brand_id']){
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
        								echo $m[1];
        								echo '</option>';
        							}
        						}
        					?>
        				</select>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">商品货号:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="product_code" id="product_code" value="<?php echo $map['product_code'];?>" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">商品名称:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="product_name" id="product_name" value="<?php echo $map['product_name'];?>" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">主标题:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="product_head" id="product_head" value="<?php echo $map['product_head'];?>" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">副标题:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="product_subhead" id="product_subhead" value="<?php echo $map['product_subhead'];?>" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">商品产地:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="product_place" id="product_place" value="<?php echo $map['product_place'];?>" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">配送区域:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="checkbox" name="product_scope[]" id="" <?php if(strpos($map['product_scope'],'南湖区')>-1){echo 'checked="checked"';}?> value="南湖区"/>南湖区&nbsp;
        				<input type="checkbox" name="product_scope[]" id="" <?php if(strpos($map['product_scope'],'秀洲区')>-1){echo 'checked="checked"';}?> value="秀洲区"/>秀洲区&nbsp;
        				<input type="checkbox" name="product_scope[]" id="" <?php if(strpos($map['product_scope'],'海宁市')>-1){echo 'checked="checked"';}?> value="海宁市"/>海宁市&nbsp;
        				<input type="checkbox" name="product_scope[]" id="" <?php if(strpos($map['product_scope'],'桐乡市')>-1){echo 'checked="checked"';}?> value="桐乡市"/>桐乡市&nbsp;
        				<input type="checkbox" name="product_scope[]" id="" <?php if(strpos($map['product_scope'],'平湖市')>-1){echo 'checked="checked"';}?> value="平湖市"/>平湖市&nbsp;
        				<input type="checkbox" name="product_scope[]" id="" <?php if(strpos($map['product_scope'],'海盐县')>-1){echo 'checked="checked"';}?> value="海盐县"/>海盐县&nbsp;
        				<input type="checkbox" name="product_scope[]" id="" <?php if(strpos($map['product_scope'],'嘉善县')>-1){echo 'checked="checked"';}?> value="嘉善县"/>嘉善县&nbsp;
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">包装规格:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="product_pack" id="product_pack" value="<?php echo $map['product_pack'];?>" class="ipt1"/>&nbsp;
        			<span class="left_txt">* 例如: 6个装</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">商品单位:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="product_units" id="product_units" value="<?php echo $map['product_units'];?>" class="ipt1"/>&nbsp;
        				<span class="left_txt">* 例如: 个</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">商品重量:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="product_weight" id="product_weight" value="<?php echo $map['product_weight'];?>" class="ipt1"/>&nbsp;
        				<span class="left_txt">* 输入时请务必带好单位</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">商品价格:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="product_price1" id="product_price1" value="<?php echo $map['product_price1'];?>" class="ipt1"/>&nbsp;
        				<span class="left_txt">* 输入数字，不含￥符号，例如: 50</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">VIP价格:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="vip_price" id="vip_price" value="<?php echo $map['vip_price'];?>" class="ipt1"/>&nbsp;
        				<span class="left_txt">* 输入数字，不含￥符号，例如: 50</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">商品原价:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="product_price2" id="product_price2" value="<?php echo $map['product_price2'];?>" class="ipt1"/>&nbsp;
        				<span class="left_txt">* 输入数字，不含￥符号，例如: 80</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">商品库存:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="product_amount" id="product_amount" value="<?php echo $map['product_amount'];?>" class="ipt1"/>&nbsp;
        				<span class="left_txt">* 请输入数字（注意：如增加该商品的细类商品此项将会随细类商品库存总和变化，可不填）</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">二维码:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="product_qrcode" id="product_qrcode" value="<?php echo $map['product_qrcode'];?>" class="ipt1"/>&nbsp;
        				<input type="button" value="添加" onclick="addQrcode()"/>
        				<span class="left_txt">* 允许上传文件类型为：png / jpg</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">封面图:</span>&nbsp;</td>
        			<td class="td1">
        				<textarea name="product_logo" id="product_logo" style="width:350px;height:100px;"><?php echo $map['product_logo'];?></textarea>
        				<input type="button" value="添加" onclick="addPic()"/>
        				<span class="left_txt">* 允许上传文件类型为：png / jpg ，允许上传5张Logo图</span>
        				<input type="hidden" name="product_pic" id="product_pic" value="<?php echo $map['product_pic'];?>" />
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">商品简介:</span>&nbsp;</td>
        			<td class="td1">
        				<textarea name="product_describe" id="product_describe" style="width:715px;height:50px;"><?php echo $map['product_describe'];?></textarea>&nbsp;
        				<span class="left_txt"> 请输入产品简单介绍 </span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">温馨提示:</span>&nbsp;</td>
        			<td class="td1">
        				<textarea name="product_prompt" id="product_prompt"  style="width:715px;height:50px;"><?php echo $map['product_prompt'];?></textarea>&nbsp;
        				<span class="left_txt"> 请输入产品温馨提示 </span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">描述:</span>&nbsp;</td>
        			<td class="td1">
        				<textarea id="elm2" name="elm2" style="width:720px;height:280px;"><?php echo $map['product_content'];?></textarea>
					</td>
        		</tr>
        		
        		<tr>
        			<td>&nbsp;</td>
        			<td>&nbsp;
        				<input type="hidden" name="operator" id="cmd" value="<?php echo empty($_REQUEST["id"])?"save":"update";?>"/>
        				<input type="hidden" name="product_id" value="<?php echo $_REQUEST["id"];?>"/>
        				<input type="button" id="save" value="保存" />
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
