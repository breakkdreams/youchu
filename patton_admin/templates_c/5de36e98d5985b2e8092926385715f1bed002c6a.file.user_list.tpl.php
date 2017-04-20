<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:08:19
         compiled from "templates\user_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1858558f8181325e5d9-54968077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5de36e98d5985b2e8092926385715f1bed002c6a' => 
    array (
      0 => 'templates\\user_list.tpl',
      1 => 1451797826,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1858558f8181325e5d9-54968077',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'item' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58f818133c0cb2_60956291',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f818133c0cb2_60956291')) {function content_58f818133c0cb2_60956291($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\AppServ\\www\\youchu\\core\\libs\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $_smarty_tpl->getSubTemplate ("head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
            <li class="active">管理员列表</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='user_create.php';"><i class="icon-plus"></i>添加账号</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>角色类型</th>
          <th>手机号</th>
          <th>姓名</th>
          <th>最后登录时间</th>
          <th style="width: 150px;">操作</th>
        </tr>
      </thead>
      <tbody>
      	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
          <td>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['u_role']=='1'){?>
			客服
			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['u_role']=='2'){?>
			售后
			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['u_role']=='3'){?>
			财务
			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['u_role']=='4'){?>
			技术
			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['u_role']=='5'){?>
			仓管
			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['u_role']=='6'){?>
			市场
			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['u_role']=='7'){?>
			其他
			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['u_role']=='8'){?>
			超级管理员
			<?php }?>          
          </td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['u_name'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['u_username'];?>
</td>
          <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['u_lasttime'],"%Y-%m-%d %H:%M");?>
</td>
          <td>
          	  <a href="user_right.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['u_id'];?>
" title="设置权限">设置权限</a>
              &nbsp;
              <a href="user_create.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['u_id'];?>
" title="编辑"><i class="icon-pencil"></i></a>
              &nbsp;
              <a href="#myModal" role="button" data-toggle="modal" title="删除"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
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