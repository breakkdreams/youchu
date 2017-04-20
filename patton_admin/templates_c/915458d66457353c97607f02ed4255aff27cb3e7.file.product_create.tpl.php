<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:07:38
         compiled from "templates\product_create.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1398658f817ea7e7435-30697444%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '915458d66457353c97607f02ed4255aff27cb3e7' => 
    array (
      0 => 'templates\\product_create.tpl',
      1 => 1470450757,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1398658f817ea7e7435-30697444',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'brand' => 0,
    'item' => 0,
    'map' => 0,
    'business' => 0,
    'skulist' => 0,
    'area' => 0,
    'manage_type' => 0,
    'menulist' => 0,
    'product_right' => 0,
    'cmd' => 0,
    'type' => 0,
    'page' => 0,
    'product_name' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58f817eb2bcae2_36540004',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f817eb2bcae2_36540004')) {function content_58f817eb2bcae2_36540004($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $_smarty_tpl->getSubTemplate ("head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <link rel="stylesheet" type="text/css" href="../css/tag.css">
    <script language="javascript">
		 function woaicssq(num){
			 for(var id = 1;id<=5;id++)
			 {
				 var MrJin="woaicss_con"+id;

				 if(id==num)
				 	document.getElementById(MrJin).style.display="block";
				 else
					 document.getElementById(MrJin).style.display="none";
			 }
		 }
	</script>
	<script type="text/javascript" charset="utf-8" src="ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
    
    <style type="text/css">
		.input1{height:28px;line-height:28px;width:400px;}
	</style>
	<style>
		@import "Assets/LightFace.css";
	</style>
	<link rel="stylesheet" href="Assets/lightface.css" />
	<script src="mootools/mootools-core.js"></script>
	<script src="mootools/LightFace.js"></script>
	<script src="mootools/LightFace.js"></script>
	<script src="mootools/LightFace.IFrame.js"></script>
	<script src="mootools/LightFace.Image.js"></script>
	<script src="mootools/LightFace.Request.js"></script>
	<script>
		window.addEvent('domready',function(){
			
			document.id('start').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=product_pic', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('logo2').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=product_logo2', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('logo3').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=product_logo3', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('logo4').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=product_logo4', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('logo5').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=product_logo5', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
		});
	</script>
	
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    <?php echo $_smarty_tpl->getSubTemplate ("navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
    <?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    

    
    <div class="content">
        
        <div class="header">
            <div class="stats"></div>

            <h1 class="page-title">桌面信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li class="active">文章列表</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='product_list.php?type=1';"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div class="woaicss">
 <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
 <ul class="woaicss_title woaicss_title_bg1" id="woaicsstitle">
  <li><input type="button" value="基础信息" onclick="woaicssq(1)" style="width:100px"></input></li>
  <li><input type="button" value="价格信息" onclick="woaicssq(2)" style="width:100px"></input></li>
  <li><input type="button" value="分类信息" onclick="woaicssq(3)" style="width:100px"></input></li>
  <li><input type="button" value="图片信息" onclick="woaicssq(4)" style="width:100px"></input></li>
  <li><input type="button" value="详细信息" onclick="woaicssq(5)" style="width:100px"></input></li>
 </ul>
 <div id="woaicss_con1" style="display:block;">
 
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">品牌信息:</span>&nbsp;</td>
        	<td class="td1">
        		<select name="brand_id" id="brand_id">
        			<option value="0">请选择</option>   
        			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brand']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['brand_id'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['map']->value['brand_id'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['item']->value['brand_id']==$_tmp1){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['brand_name'];?>
</option>
        			<?php } ?>
        		</select>
        		<span class="left_txt">* 维护品牌请<a href="product_brand.php">点击</a></span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">商家:</span>&nbsp;</td>
        	<td class="td1">
        		<select name="s_id" id="s_id">
        			<option value="0">请选择</option>   
        			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['s_id'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['map']->value['s_id'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['item']->value['s_id']==$_tmp2){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['s_name'];?>
</option>
        			<?php } ?>
        		</select>
        		<span class="left_txt">* 维护商家请<a href="seller_list.php">点击</a></span>
        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:125px;" class="td1"><span class="td1_bt">商品名称:</span>&nbsp;</td>
        	<td class="td1">
        	<input type="text" name="product_name" id="product_name" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_name'];?>
" class="input1"/>&nbsp;
        	<span class="left_txt">* 例如：iphone6s</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">副标题:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_title" id="product_title" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_title'];?>
" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：最新液晶款</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">商品货号:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_code" id="product_code" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_code'];?>
" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：DX001</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">温馨提示:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_prompt" id="product_prompt" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_prompt'];?>
" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：请验货后再签收</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">产地:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_place" id="product_place" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_place'];?>
" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：浙江嘉兴</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">重量:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_weight" id="product_weight" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_weight'];?>
" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：斤</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">库存数:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_amount" id="product_amount" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_amount'];?>
"  class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：400</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">包装规格:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_pack" id="product_pack" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_pack'];?>
" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：500克</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">计件数:</span>&nbsp;</td>
        	<td class="td1">
        		<select name="product_units" id="product_units">
        			<option>请选择</option>       
        			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['skulist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sku_id'];?>
"  <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['map']->value['product_units'];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['item']->value['sku_id']==$_tmp3){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['sku_name'];?>
</option>
        			<?php } ?> 			
        		</select>
        		<span class="left_txt">* 维护SKU请<a href="sku.php">点击</a></span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">生产许可证:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_license" id="product_license" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_license'];?>
" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：370701011263</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">防伪码:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_ecoding" id="product_ecoding" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_ecoding'];?>
" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：GB/T 8608</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">条形码/二维码:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_qrcode" id="product_qrcode" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_qrcode'];?>
" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：8888888</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">配送范围:</span>&nbsp;</td>
        	<td class="td1">
        		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['area']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        		<input type="checkbox" name="product_scope[]" id="" <?php if (strpos($_smarty_tpl->tpl_vars['map']->value['product_scope'],$_smarty_tpl->tpl_vars['item']->value['area_name'])!==false){?>checked="checked"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['area_name'];?>
"/>&nbsp;<?php echo $_smarty_tpl->tpl_vars['item']->value['area_name'];?>
&nbsp;&nbsp;&nbsp;&nbsp;
        		<?php } ?>
        	</td>
        </tr>
	</table>
 </div>
 <div id="woaicss_con2" style="display:none;">
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" style="width:125px;" class="td1"><span class="td1_bt">普通会员:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_price2" id="product_price2" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_price2'];?>
" /> ￥&nbsp;
        		<span class="left_txt">* 例如：100</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">促销价:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="temp_price" id="temp_price" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['temp_price'];?>
" /> ￥&nbsp;
        		<span class="left_txt">* 例如：80</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">高级会员:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_price1" id="product_price1" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_price1'];?>
" /> ￥&nbsp;
        		<span class="left_txt">* 例如：90</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">企业会员:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_vip" id="product_vip" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_vip'];?>
" /> ￥&nbsp;
        		<span class="left_txt">* 例如：85</span>
        	</td>
        </tr>
   </table>
 </div>
 <div id="woaicss_con3" style="display:none;">
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" style="width:125px;" class="td1"><span class="td1_bt">主类别:</span>&nbsp;</td>
        	<td class="td1">
        		<select name="product_type1" id="product_type1">
        			<option value="">请选择</option>
        			<?php if ($_smarty_tpl->tpl_vars['manage_type']->value=='0'){?>
        			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menulist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	        			<?php if (strpos($_smarty_tpl->tpl_vars['product_right']->value,$_smarty_tpl->tpl_vars['item']->value['m_name'])!==false){?>
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1&&$_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type1']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700" selected="selected">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type1']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" selected="selected">
		        			<?php }else{ ?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
">
		        			<?php }?>
		        			|
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>---
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==2){?>------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==3){?>---------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==4){?>------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==5){?>---------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==6){?>------------------
					        <?php }?>
		        			<?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>

		        			</option>
	        			<?php }?>
        			<?php } ?>
        			<?php }else{ ?>
	        			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menulist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1&&$_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type1']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700" selected="selected">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type1']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" selected="selected">
		        			<?php }else{ ?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
">
		        			<?php }?>
		        			|
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>---
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==2){?>------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==3){?>---------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==4){?>------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==5){?>---------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==6){?>------------------
					        <?php }?>
		        			<?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>

		        			</option>
	        			<?php } ?>
        			<?php }?>
        		</select>
        		
        		*必选
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">可选类别2:</span>&nbsp;</td>
        	<td class="td1">
        		<select name="product_type2" id="product_type2">
        			<option value="">请选择</option>
        			<?php if ($_smarty_tpl->tpl_vars['manage_type']->value=='0'){?>
        			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menulist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	        			<?php if (strpos($_smarty_tpl->tpl_vars['product_right']->value,$_smarty_tpl->tpl_vars['item']->value['m_name'])!==false){?>
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1&&$_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type2']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700" selected="selected">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type2']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" selected="selected">
		        			<?php }else{ ?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
">
		        			<?php }?>
		        			|
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>---
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==2){?>------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==3){?>---------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==4){?>------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==5){?>---------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==6){?>------------------
					        <?php }?>
		        			<?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>

		        			</option>
	        			<?php }?>
        			<?php } ?>
        			<?php }else{ ?>
	        			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menulist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1&&$_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type2']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700" selected="selected">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type2']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" selected="selected">
		        			<?php }else{ ?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
">
		        			<?php }?>
		        			|
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>---
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==2){?>------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==3){?>---------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==4){?>------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==5){?>---------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==6){?>------------------
					        <?php }?>
		        			<?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>

		        			</option>
	        			<?php } ?>
        			<?php }?>
        		</select>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">可选类别3:</span>&nbsp;</td>
        	<td class="td1">
        		<select name="product_type3" id="product_type3">
        			<option value="">请选择</option>
        			<?php if ($_smarty_tpl->tpl_vars['manage_type']->value=='0'){?>
        			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menulist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	        			<?php if (strpos($_smarty_tpl->tpl_vars['product_right']->value,$_smarty_tpl->tpl_vars['item']->value['m_name'])!==false){?>
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1&&$_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type3']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700" selected="selected">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type3']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" selected="selected">
		        			<?php }else{ ?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
">
		        			<?php }?>
		        			|
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>---
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==2){?>------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==3){?>---------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==4){?>------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==5){?>---------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==6){?>------------------
					        <?php }?>
		        			<?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>

		        			</option>
	        			<?php }?>
        			<?php } ?>
        			<?php }else{ ?>
	        			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menulist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1&&$_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type3']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700" selected="selected">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type3']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" selected="selected">
		        			<?php }else{ ?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
">
		        			<?php }?>
		        			|
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>---
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==2){?>------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==3){?>---------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==4){?>------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==5){?>---------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==6){?>------------------
					        <?php }?>
		        			<?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>

		        			</option>
	        			<?php } ?>
        			<?php }?>
        		</select>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">可选类别4:</span>&nbsp;</td>
        	<td class="td1">
        		<select name="product_type4" id="product_type4">
        			<option value="">请选择</option>
        			<?php if ($_smarty_tpl->tpl_vars['manage_type']->value=='0'){?>
        			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menulist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	        			<?php if (strpos($_smarty_tpl->tpl_vars['product_right']->value,$_smarty_tpl->tpl_vars['item']->value['m_name'])!==false){?>
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1&&$_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type4']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700" selected="selected">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type4']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" selected="selected">
		        			<?php }else{ ?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
">
		        			<?php }?>
		        			|
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>---
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==2){?>------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==3){?>---------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==4){?>------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==5){?>---------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==6){?>------------------
					        <?php }?>
		        			<?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>

		        			</option>
	        			<?php }?>
        			<?php } ?>
        			<?php }else{ ?>
	        			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menulist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1&&$_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type4']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700" selected="selected">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" style="background-color:#FFFFFF; color:red;font-weight:700">
		        			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_id']==$_smarty_tpl->tpl_vars['map']->value['product_type4']){?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" selected="selected">
		        			<?php }else{ ?>
		        			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
">
		        			<?php }?>
		        			|
		        			<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>---
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==2){?>------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==3){?>---------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==4){?>------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==5){?>---------------
					        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==6){?>------------------
					        <?php }?>
		        			<?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>

		        			</option>
	        			<?php } ?>
        			<?php }?>
        		</select>
        	</td>
        </tr>
   </table>
 </div>
 <div id="woaicss_con4" style="display:none;">
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" style="width:125px;" class="td1"><span class="td1_bt">商品主照片:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_pic" id="product_pic" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_pic'];?>
" />
        		<input type="button" id="start" value="添加"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">LOGO照片2:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_logo2" id="product_logo2" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_logo2'];?>
" />
        		<input type="button" value="添加" id="logo2"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">LOGO照片3:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_logo3" id="product_logo3" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_logo3'];?>
" />
        		<input type="button" value="添加"  id="logo3"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">LOGO照片4:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_logo4" id="product_logo4" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_logo4'];?>
" />
        		<input type="button" value="添加"  id="logo4"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">LOGO照片5:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_logo5" id="product_logo5" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_logo5'];?>
" />
        		<input type="button" value="添加"  id="logo5"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1">&nbsp;</td>
        	<td class="td1">
        		<span>* 允许上传文件类型：jpg / png</span>
        	</td>
        </tr>
	</table>
 </div>
 <div id="woaicss_con5" style="display:none;">
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" style="width:25px;" class="td1">
        		<div id="d_content" style="display:none"><?php echo $_smarty_tpl->tpl_vars['map']->value['product_content'];?>
</div>
        	</td>
        	<td class="td1">
        		<script id="editor" type="text/plain" style="min-width:700px;max-width:800px;height:500px;"><?php echo $_smarty_tpl->tpl_vars['map']->value['product_content'];?>
</script>
        		<input type="hidden" name="product_content" id="product_content"/>
        		<input type="hidden" name="cmd" value="<?php echo $_smarty_tpl->tpl_vars['cmd']->value;?>
"/>
        		<input type="hidden" name="product_id" id="product_id" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['product_id'];?>
"/>
        		<input type="hidden" name="type" id="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"/>
        		<input type="hidden" name="page" id="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"/>
        		<input type="hidden" name="productName" id="productName" value="<?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>
"/>
			</td>
        </tr>
        </table>
 </div>
 <br></br>
 <center><input type="submit" value="保存" style="width:100px;"/>&nbsp;<span style="font-size:13px;color:Red">*请在填写完毕再保存</span></center>
 </form>
</div>
</div>
<div class="pagination">
   <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
      
                    
            </div>
        </div>
    </div>
    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    <script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }

    function check(){
		var product_name = document.getElementById("product_name").value;
		var product_price1 = document.getElementById("product_price1").value;

		if(product_name.length==0){
			alert("请输入商品名称");
			return false;
		}else if(product_price1.length==0){
			alert("请输入网站价格");
			return false;
		}else{
			document.getElementById("product_content").value=UE.getEditor('editor').getContent();
			return true;
		}	
    }
    </script>
    
  </body>
</html>


<?php }} ?>