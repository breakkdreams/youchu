<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:07:34
         compiled from "templates\product_type.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1293258f817e6275e14-74661462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c6729acca57c455f381ef34fa68c32cece572e1' => 
    array (
      0 => 'templates\\product_type.tpl',
      1 => 1451292971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1293258f817e6275e14-74661462',
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
  'unifunc' => 'content_58f817e637c6e1_78382660',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f817e637c6e1_78382660')) {function content_58f817e637c6e1_78382660($_smarty_tpl) {?><!DOCTYPE html>
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
            <li class="active">商品类型</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='product_type_create.php';"><i class="icon-plus"></i>添加类型</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>商品类型</th>
          <th>封面图</th>
          <th style="width: 100px;">操作</th>
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
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['v_name'];?>
</td>
          <td><?php if ($_smarty_tpl->tpl_vars['item']->value['v_photo']==''){?><span style="color:#eee7e7">查看</span><?php }else{ ?><a href="../<?php echo $_smarty_tpl->tpl_vars['item']->value['v_photo'];?>
" target="_blank">查看</a><?php }?></td>
          <td>
              <a href="product_type_create.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['v_id'];?>
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