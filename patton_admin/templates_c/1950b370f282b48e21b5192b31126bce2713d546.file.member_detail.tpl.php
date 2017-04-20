<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:11:39
         compiled from "templates\member_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2254058f818db827c21-32005476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1950b370f282b48e21b5192b31126bce2713d546' => 
    array (
      0 => 'templates\\member_detail.tpl',
      1 => 1451801092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2254058f818db827c21-32005476',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'map' => 0,
    'address_list' => 0,
    'item' => 0,
    'order_list' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58f818dba6c284_62319218',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f818dba6c284_62319218')) {function content_58f818dba6c284_62319218($_smarty_tpl) {?><!DOCTYPE html>
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
            <li class="active">会员信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='member_list.php?type=1';"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div class="woaicss">
 <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
 <ul class="woaicss_title woaicss_title_bg1" id="woaicsstitle">
  <li><input type="button" value="基础信息" onclick="woaicssq(1)" style="width:100px"></input></li>
  <li><input type="button" value="收件信息" onclick="woaicssq(2)" style="width:100px"></input></li>
  <li><input type="button" value="订单信息" onclick="woaicssq(3)" style="width:100px"></input></li>
 </ul>
 <div id="woaicss_con1" style="display:block;">
 
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">会员昵称:</span>&nbsp;</td>
        	<td class="td1">
        		<?php echo $_smarty_tpl->tpl_vars['map']->value['member_name'];?>

        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:125px;" class="td1"><span class="td1_bt">登录账号:</span>&nbsp;</td>
        	<td class="td1">
        		<?php echo $_smarty_tpl->tpl_vars['map']->value['member_login'];?>

        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">姓名:</span>&nbsp;</td>
        	<td class="td1">
        		<?php echo $_smarty_tpl->tpl_vars['map']->value['member_realname'];?>

        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">性别:</span>&nbsp;</td>
        	<td class="td1">
        		<?php echo $_smarty_tpl->tpl_vars['map']->value['member_sex'];?>

        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">生日:</span>&nbsp;</td>
        	<td class="td1">
        		<?php echo $_smarty_tpl->tpl_vars['map']->value['member_birthday'];?>

        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">邮件地址:</span>&nbsp;</td>
        	<td class="td1">
        		<?php echo $_smarty_tpl->tpl_vars['map']->value['member_email'];?>

        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">电话:</span>&nbsp;</td>
        	<td class="td1">
        		<?php echo $_smarty_tpl->tpl_vars['map']->value['member_tel'];?>

        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">手机:</span>&nbsp;</td>
        	<td class="td1">
        		<?php echo $_smarty_tpl->tpl_vars['map']->value['member_phone'];?>

        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">邮编:</span>&nbsp;</td>
        	<td class="td1">
        		<?php echo $_smarty_tpl->tpl_vars['map']->value['member_zip'];?>

        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">地址:</span>&nbsp;</td>
        	<td class="td1">
        		<?php echo $_smarty_tpl->tpl_vars['map']->value['member_address'];?>

        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">会员等级:</span>&nbsp;</td>
        	<td class="td1">
        		<?php if ($_smarty_tpl->tpl_vars['map']->value['level_logo']==''){?><?php }else{ ?><img src="../<?php echo $_smarty_tpl->tpl_vars['map']->value['level_logo'];?>
" style="height:40px;"><?php }?>
        	</td>
        </tr>
	</table>
 </div>
 <div id="woaicss_con2" style="display:none;">
   <table class="table" style="margin-left: 25px;">
        <tr>
        	<td>序号</td>
        	<td>收件人</td>
        	<td>手机</td>
        	<td>电话</td>
        	<td>地址</td>
        	<td>标志性建筑</td>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['address_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['list']['iteration']%2==0){?>
        <tr class="my_table_tr">
        <?php }else{ ?>
        <tr>
        <?php }?>
        	<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['list']['iteration'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['a_name'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['a_phone'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['a_tel'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['a_address'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['a_mark'];?>
</td>
        </tr>
        <?php } ?>
	</table>
 </div>
 <div id="woaicss_con3" style="display:none;">
   <table class="table" style="margin-left: 25px;">
        <tr>
        	<td>序号</td>
        	<td>订单日期</td>
        	<td>订单总价</td>
        	<td>订单状态</td>
        	<td>发货单号</td>
        	<td>&nbsp;</td>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['list']['iteration']%2==0){?>
        <tr class="my_table_tr">
        <?php }else{ ?>
        <tr>
        <?php }?>
        	<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['list']['iteration'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['order_time'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['order_price'];?>
</td>
        	<td>
        		<?php if ($_smarty_tpl->tpl_vars['item']->value['pay_time']==''){?>
                	待支付
                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['order_state']=='0'){?>
					未发货
				<?php }elseif($_smarty_tpl->tpl_vars['item']->value['order_state']=='1'){?>
					已发货
				<?php }elseif($_smarty_tpl->tpl_vars['item']->value['order_state']=='2'){?>
					已完成
				<?php }elseif($_smarty_tpl->tpl_vars['item']->value['order_state']=='3'){?>
					退货中
				<?php }?>
        	</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['send_code'];?>
</td>
        	<td><a href="order_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['order_id'];?>
">查看详情</a></td>
        </tr>
        <?php } ?>
	</table>
 </div>

 <br></br>
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
	
</body>
</html>


<?php }} ?>