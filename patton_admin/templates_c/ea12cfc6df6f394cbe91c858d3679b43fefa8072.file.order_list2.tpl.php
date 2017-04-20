<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:08:00
         compiled from "templates\order_list2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3220058f818005984a4-35069954%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea12cfc6df6f394cbe91c858d3679b43fefa8072' => 
    array (
      0 => 'templates\\order_list2.tpl',
      1 => 1451455918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3220058f818005984a4-35069954',
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
  'unifunc' => 'content_58f818006ac415_35453224',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f818006ac415_35453224')) {function content_58f818006ac415_35453224($_smarty_tpl) {?><!DOCTYPE html>
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
            <li class="active">订单列表</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <form action="" method="post">
    <table>
    	<tr>
    		<td><input type="text" name="get_phone" placeholder="请输入收件人手机" style="width:140px;"/></td>
    		<td><input type="text" name="order_code" placeholder="请输入订单编号" style="width:140px;"/></td>
    		<td><button type="submit" class="btn btn-primary" style="margin-bottom: 8px;">查询订单</button></td>
    	</tr>
    </table>
    </form>
    
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>订单编号</th>
          <th>收件人</th>
          <th>电话</th>
          <th>订单金额</th>
          <th>支付时间</th>
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
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['order_code'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['get_name'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['get_phone'];?>
</td>
          <td>￥<?php echo $_smarty_tpl->tpl_vars['item']->value['order_price'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pay_time'];?>
</td>
          <td>
              <a href="order_detail.php?cmd=send&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['order_id'];?>
" title="发货">发货</a>&nbsp;&nbsp;
              <a href="order_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['order_id'];?>
" title="查看明细">查看明细</a>
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