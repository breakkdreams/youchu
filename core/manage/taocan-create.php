<?php
require_once("check2.php"); 
//大类别
$menulist = getMenuList();
//获取产品列表
$list = getProductList();
//获取系细分类产品列表
$productitemlist=getProductitemAll();
function getMin($p_id){
	$t_id=0;
	if(!empty($p_id)){
		$productitemlist=getProductitemlist($p_id);
		$t_id=$productitemlist[0][0];
	}
	return $t_id;
}


//新建商品
if("save"==$_REQUEST["operator"]){
	$taocan = array('t_name'=>$_REQUEST["t_name"],
				   'p_id1'=>empty($_REQUEST["p_id1"])?'0':$_REQUEST["p_id1"],
				   'p_id2'=>empty($_REQUEST["p_id2"])?'0':$_REQUEST["p_id2"],
				   'p_id3'=>empty($_REQUEST["p_id3"])?'0':$_REQUEST["p_id3"],
				   'p_id4'=>empty($_REQUEST["p_id4"])?'0':$_REQUEST["p_id4"],
				   'p_id5'=>empty($_REQUEST["p_id5"])?'0':$_REQUEST["p_id5"],
				   'p_id6'=>empty($_REQUEST["p_id6"])?'0':$_REQUEST["p_id6"],
	               't_id1'=>empty($_REQUEST["t_id1"])?getMin($_REQUEST["p_id1"]):$_REQUEST["t_id1"],
				   't_id2'=>empty($_REQUEST["t_id2"])?getMin($_REQUEST["p_id2"]):$_REQUEST["t_id2"],
				   't_id3'=>empty($_REQUEST["t_id3"])?getMin($_REQUEST["p_id3"]):$_REQUEST["t_id3"],
				   't_id4'=>empty($_REQUEST["t_id4"])?getMin($_REQUEST["p_id4"]):$_REQUEST["t_id4"],
				   't_price1'=>empty($_REQUEST["t_price1"])?'0':$_REQUEST["t_price1"],
				   't_price2'=>empty($_REQUEST["t_price2"])?'0':$_REQUEST["t_price2"],
				   't_order'=>'0',
				   't_aviable'=>'1');

	$ret = createTaocan($taocan);
	
	echo '<script>';
	echo $ret==1?"alert('保存成功');":"alert('保存失败');";
	echo "window.location='taocan-list.php'";
	echo '</script>';
}else if("update"==$_REQUEST["operator"]){
	$taocan = array('t_id'=>$_REQUEST["t_id"],
					't_name'=>$_REQUEST["t_name"],
				   'p_id1'=>empty($_REQUEST["p_id1"])?'0':$_REQUEST["p_id1"],
				   'p_id2'=>empty($_REQUEST["p_id2"])?'0':$_REQUEST["p_id2"],
				   'p_id3'=>empty($_REQUEST["p_id3"])?'0':$_REQUEST["p_id3"],
				   'p_id4'=>empty($_REQUEST["p_id4"])?'0':$_REQUEST["p_id4"],
				   'p_id5'=>empty($_REQUEST["p_id5"])?'0':$_REQUEST["p_id5"],
				   'p_id6'=>empty($_REQUEST["p_id6"])?'0':$_REQUEST["p_id6"],
		           't_id1'=>empty($_REQUEST["t_id1"])?'0':$_REQUEST["t_id1"],
				   't_id2'=>empty($_REQUEST["t_id2"])?'0':$_REQUEST["t_id2"],
				   't_id3'=>empty($_REQUEST["t_id3"])?'0':$_REQUEST["t_id3"],
				   't_id4'=>empty($_REQUEST["t_id4"])?'0':$_REQUEST["t_id4"],
				   't_price1'=>empty($_REQUEST["t_price1"])?'0':$_REQUEST["t_price1"],
				   't_price2'=>empty($_REQUEST["t_price2"])?'0':$_REQUEST["t_price2"],
				   't_order'=>'0',
				   't_aviable'=>'1');
	
	$ret = updateTaocan($taocan);
	
	echo '<script>';
	echo $ret==1?"alert('保存成功');":"alert('保存失败');";
	echo "window.location='taocan-list.php'";
	echo '</script>';
}

//编辑信息
if(!empty($_REQUEST["id"])){
	$info = getTaocanInfo($_REQUEST["id"]);
	
	if(!empty($info)){
		foreach($info as $map){
			
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
	
	var t_name = document.getElementById("t_name").value;
	var p_id1 = document.getElementById("p_id1").value;
	var p_id2 = document.getElementById("p_id2").value;
	var p_id3 = document.getElementById("p_id3").value;
	var p_id4 = document.getElementById("p_id4").value;

	var t_price1 = document.getElementById("t_price1").value;
	var t_price2 = document.getElementById("t_price2").value;

	if(t_name.length==0){
		alert("请输入套餐名称");
		return false;
	}/*else if(p_id1.length==0){
		alert("请选择套餐内容1");
		return false;
	}else if(p_id2.length==0){
		alert("请选择套餐内容2");
		return false;
	}else if(p_id3.length==0){
		alert("请选择套餐内容3");
		return false;
	}else if(p_id4.length==0){
		alert("请选择套餐内容4");
		return false;
	}
	*/
	else if(t_price1.length==0){
		alert("请输入套餐价格");
		return false;
	}else if(t_price2.length==0){
		alert("请输入原价");
		return false;
	}else{
		$('#frmDemo').submit();
	}
}
function getProductitem(num,p_id) {
    $.ajax({
        url: "ajax_php.php",
        type: "POST",
        data: { cmd:"getProductitem", id: p_id },
        //dataType: "json",
        error: function () {
            alert('Error loading XML document');
        },
        success: function (data, status) {//如果调用php成功    
            //alert(unescape(data));//解码，显示汉字

            var t_id="t_id"+num;
            var obj = document.getElementById(t_id);
            obj.options.length = 0;
            obj.options.add(new Option("请选择", ""));
            var objs = eval(data);
           // if(''!=objs[0]){
           

                for (var i = 0; i < objs.length; i++) {
            	    var opt=new Option(objs[i].type_name);
            	    opt.value=objs[i].type_id;
                    obj.options.add(opt);
                //}
            }
        }
    });
}
function setProductType(m_id,num){
    $.ajax({
        url: "ajax_php.php",
        type: "POST",
        data: { cmd:"setProductType", id: m_id },
        //dataType: "json",
        error: function () {
            alert('Error loading XML document');
        },
        success: function (data, status) {//如果调用php成功    
            //alert(unescape(data));//解码，显示汉字
            var objs = eval(data);
            //for(var i=1;i<5;i++){
            var i=num;
                var p_id="p_id"+i;
                var obj = document.getElementById(p_id);
                obj.options.length = 0;
                obj.options.add(new Option("请选择", ""));
                for (var j = 0; j < objs.length; j++) {
            	    var opt=new Option(objs[j].product_name);
            	    opt.value=objs[j].product_id;
                    obj.options.add(opt);
                }         
          //  }

           /* for(var i=0;i<obj.length;i++){
                obj[i].options.length = 0;
                obj[i].options.add(new Option("请选择", ""));
                for (var j = 0; j < objs.length; j++) {
            	    var opt=new Option(objs[j].product_name);
            	    opt.value=objs[j].product_id;
                    obj[i].options.add(opt);
                }
            }*/
        }
    });
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
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">套餐名称:</span>&nbsp;</td>
        			<td class="td1">
        			<input type="text" name="t_name" id="t_name" value="<?php echo $map['t_name'];?>" class="ipt1"/>&nbsp;
        			</td>
        		</tr>
        		        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">大类别1选择:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="product_type" id="product_type" onchange="setProductType(this.value,1)" >
        				<option value="0">请选择</option>
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
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">商品1:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="p_id1" id="p_id1" onchange="getProductitem('1',this.value)">
        				<option value="">请选择</option>
        					<?php 
        					if(!empty($list)){
        						foreach($list as $item){
        							$str1 = '';
        							if($item['product_id']==$map['p_id1']){
        								$str1='selected="selected"';
        							}
        							echo "<option value='".$item['product_id']."' ".$str1.">";
        							echo $item['m_name'].'-'.$item['product_name'];
        							echo "</option>";
        						}
        					}
        					?>
        				</select>
        			</td>
        		</tr>
        		
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">商品1细分类:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="t_id1" id="t_id1" >
        				<option value="">请选择</option>
        				<?php 
        						if(!empty($productitemlist)){
        							foreach ($productitemlist as $m){

        								$selected='';
        								if($map['t_id1']==$m[0]){
        									$selected="selected='selected'";
        								}
        								echo '<option value="'.$m[0].'"  '.$selected.'>';	
        								echo $m[2];
        								echo '</option>';
        							}
        						}
        					?>

        				</select>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">大类别2选择:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="product_type" id="product_type" onchange="setProductType(this.value,2)" >
        				<option value="0">请选择</option>
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
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">商品2:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="p_id2" id="p_id2" onchange="getProductitem('2',this.value)">
        					<option value="">请选择</option>
        					<?php 
        					if(!empty($list)){
        						foreach($list as $item){
        							$str2= '';
        							if($item['product_id']==$map['p_id2']){
        								$str2='selected="selected"';
        							}
        							echo "<option value='".$item['product_id']."' ".$str2.">";
        							echo $item['m_name'].'-'.$item['product_name'];
        							echo "</option>";
        						}
        					}
        					?>
        				</select>
        			</td>
        		</tr>
        		        		<tr >
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">商品2细分类:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="t_id2" id="t_id2">
        					<option value="">请选择</option>
        					        				<?php 
        						if(!empty($productitemlist)){
        							foreach ($productitemlist as $m){

        								$selected='';
        								if($map['t_id2']==$m[0]){
        									$selected="selected='selected'";
        								}
        								echo '<option value="'.$m[0].'"  '.$selected.'>';	
        								echo $m[2];
        								echo '</option>';
        							}
        						}
        					?>
        				</select>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">大类别3选择:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="product_type" id="product_type" onchange="setProductType(this.value,3)" >
        				<option value="0">请选择</option>
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
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">商品3:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="p_id3" id="p_id3" onchange="getProductitem('3',this.value)">
        					<option value="">请选择</option>
        					<?php 
        					if(!empty($list)){
        						foreach($list as $item){
        							$str3 = '';
        							if($item['product_id']==$map['p_id3']){
        								$str3='selected="selected"';
        							}
        							echo "<option value='".$item['product_id']."' ".$str3.">";
        							echo $item['m_name'].'-'.$item['product_name'];
        							echo "</option>";
        						}
        					}
        					?>
        				</select>
        			</td>
        		</tr>
        		        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">商品3细分类:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="t_id3" id="t_id3">
        					<option value="">请选择</option>
        					        				<?php 
        						if(!empty($productitemlist)){
        							foreach ($productitemlist as $m){

        								$selected='';
        								if($map['t_id3']==$m[0]){
        									$selected="selected='selected'";
        								}
        								echo '<option value="'.$m[0].'"  '.$selected.'>';	
        								echo $m[2];
        								echo '</option>';
        							}
        						}
        					?>
   
        				</select>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">大类别4选择:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="product_type" id="product_type" onchange="setProductType(this.value,4)" >
        				<option value="0">请选择</option>
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
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">商品4:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="p_id4" id="p_id4" onchange="getProductitem('4',this.value)">
        					<option value="">请选择</option>
        					<?php 
        					if(!empty($list)){
        						foreach($list as $item){
        							$str4 = '';
        							if($item['product_id']==$map['p_id4']){
        								$str4='selected="selected"';
        							}
        							echo "<option value='".$item['product_id']."' ".$str4.">";
        							echo $item['m_name'].'-'.$item['product_name'];
        							echo "</option>";
        						}
        					}
        					?>
        				</select>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" style="width:168px;" class="td1"><span class="td1_bt">商品4细分类:</span>&nbsp;</td>
        			<td class="td1">
        				<select name="t_id4" id="t_id4">
        					<option value="">请选择</option>
        					        				<?php 
        						if(!empty($productitemlist)){
        							foreach ($productitemlist as $m){

        								$selected='';
        								if($map['t_id4']==$m[0]){
        									$selected="selected='selected'";
        								}
        								echo '<option value="'.$m[0].'"  '.$selected.'>';	
        								echo $m[2];
        								echo '</option>';
        							}
        						}
        					?>
        				</select>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">商品价格:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="t_price1" id="t_price1" value="<?php echo $map['t_price1'];?>" class="ipt1"/>&nbsp;
        				<span class="left_txt">* 输入数字，不含￥符号，例如: 50</span>
        			</td>
        		</tr>
        		<tr>
        			<td align="right" class="td1"><span class="td1_bt">商品原价:</span>&nbsp;</td>
        			<td class="td1">
        				<input type="text" name="t_price2" id="t_price2" value="<?php echo $map['t_price2'];?>" class="ipt1"/>&nbsp;
        				<span class="left_txt">* 输入数字，不含￥符号，例如: 80</span>
        			</td>
        		</tr>        		
        		<tr>
        			<td>&nbsp;</td>
        			<td>&nbsp;
        				<input type="hidden" name="operator" value="<?php echo empty($_REQUEST["id"])?"save":"update";?>"/>
        				<input type="hidden" name="t_id" value="<?php echo $_REQUEST["id"];?>"/>
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
        <td width="51%" class="left_txt"><img src="images/icon-mail2.gif" width="16" height="11" /> 客户服务邮箱：39980128@qq.com<br>
              <img src="images/icon-phone.gif" width="17" height="14" /> 技术支持QQ：39980128</td>
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
