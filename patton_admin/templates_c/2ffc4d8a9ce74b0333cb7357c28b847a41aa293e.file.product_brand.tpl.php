<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:07:30
         compiled from "templates\product_brand.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1809458f817e275bfc7-45044060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ffc4d8a9ce74b0333cb7357c28b847a41aa293e' => 
    array (
      0 => 'templates\\product_brand.tpl',
      1 => 1463105597,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1809458f817e275bfc7-45044060',
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
  'unifunc' => 'content_58f817e28b62d7_29922660',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f817e28b62d7_29922660')) {function content_58f817e28b62d7_29922660($_smarty_tpl) {?><html>
  <head>
    <?php echo $_smarty_tpl->getSubTemplate ("head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      
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
	
	</script>
	
    <script type="text/javascript">
    function deleteBrand(id){
    	
		var confirm = new LightFace({
			width: 250,
			title: '确认信息',
		keys: {
			esc: function() { this.close(); box.unfade(); }
		},
			content: '是否确定删除此商品?',
		buttons: [
			{ title: '是', event: function() { window.location="?cmd=delete&id="+id; }, color: 'green' },
			{ title: '否', event: function() { this.close(); box.unfade(); } }
		]
		});
		confirm.open();
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
            <li class="active">商品品牌</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='product_brand_create.php';"><i class="icon-plus"></i>添加品牌</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>品牌类型</th>
          <th>品牌名称</th>
          <th>服务热线</th>
          <th>负责人</th>
          <th>负责人手机</th>
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
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['brand_type'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['brand_name'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['brand_phone'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['brand_linkman'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['brand_mobile'];?>
</td>
          <td>
              <a href="product_brand_create.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['brand_id'];?>
" title="编辑"><i class="icon-pencil"></i></a>
              &nbsp;
              <a href="#myModal" role="button" data-toggle="modal" title="删除" onclick="deleteBrand('<?php echo $_smarty_tpl->tpl_vars['item']->value['brand_id'];?>
')"><i class="icon-remove"></i></a>
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