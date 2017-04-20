<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:08:29
         compiled from "templates\user_create.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1417458f8181d604cd7-05561980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d8990c7f8665665d8adcd1db19dc4548e6ed1af' => 
    array (
      0 => 'templates\\user_create.tpl',
      1 => 1451636948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1417458f8181d604cd7-05561980',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'map' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58f8181d7aab49_80776914',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f8181d7aab49_80776914')) {function content_58f8181d7aab49_80776914($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $_smarty_tpl->getSubTemplate ("head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <script type="text/javascript" charset="utf-8" src="ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
    
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
			
			document.id('photo1').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=d_pic', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
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
            <li class="active">管理员信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='user_list.php'"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
     <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">所属角色:</span>&nbsp;</td>
        	<td class="td1">
        		<select name="u_role" id="u_role"> 
        			<option value="">请选择</option>
        			<option value="1" <?php if ($_smarty_tpl->tpl_vars['map']->value['u_role']=='1'){?>selected="selected"<?php }?>>客服</option>
        			<option value="2" <?php if ($_smarty_tpl->tpl_vars['map']->value['u_role']=='2'){?>selected="selected"<?php }?>>售后</option>
        			<option value="3" <?php if ($_smarty_tpl->tpl_vars['map']->value['u_role']=='3'){?>selected="selected"<?php }?>>财务</option>
        			<option value="4" <?php if ($_smarty_tpl->tpl_vars['map']->value['u_role']=='4'){?>selected="selected"<?php }?>>技术</option>
        			<option value="5" <?php if ($_smarty_tpl->tpl_vars['map']->value['u_role']=='5'){?>selected="selected"<?php }?>>仓管</option>
        			<option value="6" <?php if ($_smarty_tpl->tpl_vars['map']->value['u_role']=='6'){?>selected="selected"<?php }?>>市场</option>
        			<option value="7" <?php if ($_smarty_tpl->tpl_vars['map']->value['u_role']=='7'){?>selected="selected"<?php }?>>其他</option>
        			<option value="8" <?php if ($_smarty_tpl->tpl_vars['map']->value['u_role']=='8'){?>selected="selected"<?php }?>>超级管理员</option>
        		</select>
        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">手机号:</span>&nbsp;</td>
        	<td class="td1">
        	<input type="text" name="u_name" id="u_name" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['u_name'];?>
" />&nbsp;
        	<span class="left_txt">* 说明：手机号为登录账号</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">姓名:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="u_username" id="u_username" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['u_username'];?>
" />
        		<span class="left_txt">* 例如：张三</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">邮箱:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="u_email" id="u_email" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['u_email'];?>
" />&nbsp;
        		<span class="left_txt">* 例如：39980128@qq.com</span>
        	</td>
        </tr>
        
        <tr>
        	<td>&nbsp;</td>
        	<td>&nbsp;
        		<?php if ($_smarty_tpl->tpl_vars['map']->value['u_id']>0){?>
        		<input type="hidden" name="operator" value="edit"/>
        		<?php }else{ ?>
        		<input type="hidden" name="operator" value="create"/>
        		<?php }?>
        		<input type="hidden" name="u_id" value="<?php echo $_smarty_tpl->tpl_vars['map']->value['u_id'];?>
"/>
        		<input type="submit" name="" value="保存" />
        	</td>
        </tr>
        </table>
        </form>
</div>
<div class="pagination">

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

    function check(){
		var u_role = document.getElementById("u_role").value;
		var u_name = document.getElementById("u_name").value;
		
		if(u_role.length==0){
			alert("请选择角色");
			return false;
		}else if(u_name.length==0){
			alert("请输入手机号");
			return false;
		}else{
			return true;
		}	
    }
    </script>
    
  </body>
</html>


<?php }} ?>