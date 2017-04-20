<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:12:13
         compiled from "templates\seller_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2749858f818fde12285-25821337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92efd6b419eae4d7b835fcd7c4b19f2e5dd9266d' => 
    array (
      0 => 'templates\\seller_list.tpl',
      1 => 1451626530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2749858f818fde12285-25821337',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'list' => 0,
    'item' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58f818fe036d04_79738073',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f818fe036d04_79738073')) {function content_58f818fe036d04_79738073($_smarty_tpl) {?><html>
  <head>
    <?php echo $_smarty_tpl->getSubTemplate ("head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <script type="text/javascript">
    function setState(id,checked){
		var page = '<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
';
		window.location="?cmd=state&id="+id+"&check="+checked+"&page="+page;
	}
    </script>
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
            <li class="active">商铺管理</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='seller_create.php';"><i class="icon-plus"></i>添加商铺</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>商铺名称</th>
          <th>联系人</th>
          <th>工商许可证</th>
          <th>营业执照</th>
          <th>主营产品</th>
          <th>客服电话</th>
          <th>审核状态</th>
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
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['s_name'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['s_manager'];?>
</td>
          <td><?php if ($_smarty_tpl->tpl_vars['item']->value['s_code']==''){?><span style="color:#eee7e7">查看</span><?php }else{ ?><a href="../<?php echo $_smarty_tpl->tpl_vars['item']->value['s_code'];?>
" target="_blank">查看</a><?php }?></td>
          <td><?php if ($_smarty_tpl->tpl_vars['item']->value['s_license']==''){?><span style="color:#eee7e7">查看</span><?php }else{ ?><a href="../<?php echo $_smarty_tpl->tpl_vars['item']->value['s_license'];?>
" target="_blank">查看</a><?php }?></td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['s_range'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['s_400'];?>
</td>
          <td><input type="checkbox" name="" id=""  onclick="setState(this.value,this.checked);" <?php if ($_smarty_tpl->tpl_vars['item']->value['s_state']=='1'){?>checked="checked"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['s_id'];?>
"/></td>
          <td>
              <a href="seller_create.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['s_id'];?>
" title="编辑"><i class="icon-pencil"></i></a>
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