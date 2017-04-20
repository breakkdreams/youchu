<?php
require_once("check2.php"); 

//栏目内容
$menulist = getMenuList();


//品牌列表
$productlist = getSubproductList(($_REQUEST['type']=='')?0:$_REQUEST['type']);
        					
//新建商品
if("save"==$_REQUEST["operator"]){
	$productitem = array('product_id'=>$_REQUEST["product_id"],
				   'type_name'=>$_REQUEST["type_name"],
				   'type_price'=>empty($_REQUEST["type_price"])?'0':$_REQUEST["type_price"],
	               'type_vip_price'=>$_REQUEST["type_vip_price"],
	               'type_pre_price'=>$_REQUEST["type_pre_price"],
				   'type_number'=>empty($_REQUEST["type_number"])?'0':$_REQUEST["type_number"]);
	$ret = saveProductItem($productitem);

	echo '<script>';
	echo $ret==1?"alert('保存成功');":"alert('保存失败');";
	echo "window.location='productitem_list.php'";
	echo '</script>';
}
//更新商品
else if("update"==$_REQUEST["operator"]){
	$productitem = array('type_id'=>$_REQUEST["type_id"],
	               'product_id'=>$_REQUEST["product_id"],
				   'type_name'=>$_REQUEST["type_name"],
				   'type_price'=>empty($_REQUEST["type_price"])?'0':$_REQUEST["type_price"],
	               'type_vip_price'=>$_REQUEST["type_vip_price"],
	               'type_pre_price'=>$_REQUEST["type_pre_price"],
				   'type_number'=>empty($_REQUEST["type_number"])?'0':$_REQUEST["type_number"]);
	$ret = updateProductItem($productitem);
	
	echo '<script>';
	echo $ret==1?"alert('保存成功');":"alert('保存失败');";
	echo "window.location='productitem_list.php'";
	echo '</script>';
}

//编辑品牌信息
if(!empty($_REQUEST["id"])){
	$ItemInfo = getProductItemInfo($_REQUEST["id"]);
	
	if(!empty($ItemInfo)){
		foreach($ItemInfo as $map){
			
		}
		/*print_r($map);
		exit();*/
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

function check(){

	/*var product_logo = document.getElementById("product_logo").value;

	if(product_logo.indexOf(",")==0){
		product_logo = product_logo.substring(1,product_logo.length);
		document.getElementById("product_logo").value = product_logo;
	}

	var pics = product_logo.split(",");

	if(pics.length>0){
		document.getElementById("product_pic").value = pics[0];
	}
	
	var n_type = document.getElementById("n_type").value;
	var n_title = document.getElementById("n_title").value;
	
	if(n_type.length==0){
		alert("请选择类别");
		return false;
	}else if(n_title.length==0){
		alert("请输入标题");
		return false;
	}else{
		$('#frmDemo').submit();
	}	
	//setTimeout(submitForm,1000);*/
	var product_id = document.getElementById("product_id").value;
	var type_name = document.getElementById("type_name").value;
	var type_price = document.getElementById("type_price").value;
	var type_number = document.getElementById("type_number").value;
	//verifycode
	document.getElementById("product_id").disabled=false;
	if(product_id.length==0){
		alert("请选择商品");
		return false;
	}else if(type_name.length==0){
		alert("请输入细分类名称");
		return false;
	}else if((type_price.length==0)){
		alert("请正确输入细分类价格");
        return false;
	}else if((type_numbere.length==0)){
		alert("请正确输入细分类库存数量 ");
		 return false;
	}else{
		document.getElementById("form").submit();
	}
}

function changeType(type)
{
	window.location="productitem_create.php?type="+type;
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
        	<form method="post" id="from" action="?" onsubmit="return check();" style="margin: 0px;">
        	<table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;" border="0">
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">商品类别:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="product_type1" id="product_type1" style="width:180px;" onchange="changeType(this.value);">
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
        									?>
        									<option value=<?php echo $m[0]." ".$selected?> style="color:red;">
        									<?php 
        								}else{
        									?>
        									<option value=<?php echo $m[0]." ".$selected?> style="color:black;">
        									<?php 
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
        			<td align="right" class="td1"><span class="td1_bt">商品:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="product_id" id="product_id" style="width:180px;" <?php if(!empty($_REQUEST["id"])){echo 'disabled="disabled"';}?> >
        					<option value="">请选择</option>
        					<?php 
        						if(!empty($productlist)){
        							foreach ($productlist as $m){

        								$selected='';
        								if($map['product_id']==$m[0]){
        									$selected="selected='selected'";
        								}
        								echo '<option value="'.$m[0].'"  '.$selected.'>';	
        								echo $m[1];
        								echo '</option>';
        							}
        						}
        					?>
        				</select>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">细分类名称:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="type_name" id="type_name" value="<?php echo $map['type_name'];?>" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">细分类价格:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="type_price" id="type_price" value="<?php echo $map['type_price'];?>" class="ipt1"/>&nbsp;
        				<span class="left_txt">* 输入数字，不含￥符号，例如: 50</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">VIP价格:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="type_vip_price" id="type_vip_price" value="<?php echo $map['type_vip_price'];?>" class="ipt1"/>&nbsp;
        				<span class="left_txt">* 输入数字，不含￥符号，例如: 50</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">商品原价:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="type_pre_price" id="type_pre_price" value="<?php echo $map['type_pre_price'];?>" class="ipt1"/>&nbsp;
        				<span class="left_txt">* 输入数字，不含￥符号，例如: 50</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">细分类库存:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="type_number" id="type_number" value="<?php echo $map['type_number'];?>" class="ipt1"/>&nbsp;
        				<span class="left_txt">* 输入数字，例如: 50</span>
        			</td>
        		</tr>    		
        		<tr>
        			<td>&nbsp;</td>
        			<td>&nbsp;
        				<input type="hidden" name="operator" value="<?php echo empty($_REQUEST["id"])?"save":"update";?>"/>
        				<input type="hidden" name="type_id" value="<?php echo $_REQUEST["id"];?>"/>
        				<input type="submit" name="" value="保存" id="submitform"/>
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
