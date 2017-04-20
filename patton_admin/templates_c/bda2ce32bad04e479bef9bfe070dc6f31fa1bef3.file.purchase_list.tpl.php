<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:11:23
         compiled from "templates\purchase_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2643158f818cb636321-64223459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bda2ce32bad04e479bef9bfe070dc6f31fa1bef3' => 
    array (
      0 => 'templates\\purchase_list.tpl',
      1 => 1452486246,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2643158f818cb636321-64223459',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'map' => 0,
    'product_id' => 0,
    'list' => 0,
    'item' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58f818cb769102_56580614',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f818cb769102_56580614')) {function content_58f818cb769102_56580614($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\AppServ\\www\\youchu\\core\\libs\\plugins\\modifier.date_format.php';
?><html>
  <head>
    <?php echo $_smarty_tpl->getSubTemplate ("head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  </head>
  <body class=""> 
    <?php echo $_smarty_tpl->getSubTemplate ("navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
    <?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    

    
    <div class="content">
        
        <div class="header">
            <div class="stats"></div>

            <h1 class="page-title">桌面信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li class="active">进货记录 <span class="divider">/</span></li>
            <li><?php echo $_smarty_tpl->tpl_vars['map']->value['product_name'];?>
</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    
    <button class="btn btn-primary" onclick="window.location.href='purchase_create.php?product_id=<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
';"><i class="icon-plus"></i>添加记录</button>
    	
  <div class="btn-group">
  	
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>进货时间</th>
          <th>进货人</th>
          <th>数量</th>
          <th>单价</th>
          <th>总价</th>
          <th>仓库</th>
          <th>供应商</th>
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
          <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['pur_time'],"%Y-%m-%d");?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pur_purchaser'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pur_count'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pur_price1'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pur_price2'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pur_warehouse'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pur_supplier'];?>
</td>
          <td>
              <a href="purchase_create.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['pur_id'];?>
&product_id=<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
" title="编辑">编辑</a>              
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