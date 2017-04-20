<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:12:10
         compiled from "templates\link_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2184558f818fa511ec5-37958993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5931e156584f8fd609cd4ff1ec3d1728a21e95a' => 
    array (
      0 => 'templates\\link_list.tpl',
      1 => 1451808767,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2184558f818fa511ec5-37958993',
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
  'unifunc' => 'content_58f818fa659d72_85174096',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f818fa659d72_85174096')) {function content_58f818fa659d72_85174096($_smarty_tpl) {?><html>
  <head>
    <?php echo $_smarty_tpl->getSubTemplate ("head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <script type="text/javascript">
    function setDisplay(id,checked){
		var page = '<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
';
		window.location="?cmd=display&id="+id+"&check="+checked+"&page="+page;
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
            <li class="active">友情链接</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='link_create.php';"><i class="icon-plus"></i>添加链接</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>链接图片</th>
          <th>链接名称</th>
          <th>链接排序</th>
          <th>首页显示</th>
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
          <td>
          	<?php if ($_smarty_tpl->tpl_vars['item']->value['u_photo']==''){?>
          	
          	<?php }else{ ?>
          		<img src="../<?php echo $_smarty_tpl->tpl_vars['item']->value['u_photo'];?>
" style="height:40px;"></img>
          	<?php }?>
          </td>
          <td><a href="http://<?php echo $_smarty_tpl->tpl_vars['item']->value['u_link'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['u_name'];?>
</a></td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['u_order'];?>
</td>
          <td><input type="checkbox" name="" id=""  onclick="setDisplay(this.value,this.checked);" <?php if ($_smarty_tpl->tpl_vars['item']->value['u_display']=='1'){?>checked="checked"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['u_id'];?>
"/></td>
          <td>
              <a href="link_create.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['u_id'];?>
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