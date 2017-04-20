<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:07:42
         compiled from "templates\product_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2843558f817ee0d22d0-59219578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb7ff32dc2ebbc6dae755efd6332b078955d1724' => 
    array (
      0 => 'templates\\product_list.tpl',
      1 => 1470963034,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2843558f817ee0d22d0-59219578',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'product_name' => 0,
    'list1' => 0,
    'item' => 0,
    'm_id' => 0,
    'list2' => 0,
    'brand_id' => 0,
    'list' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58f817ee361f75_07574791',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f817ee361f75_07574791')) {function content_58f817ee361f75_07574791($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
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
    function deleteDetail(id,type,page,productName){
    	
		var confirm = new LightFace({
			width: 250,
			title: '确认信息',
		keys: {
			esc: function() { this.close(); box.unfade(); }
		},
			content: '是否确定删除此商品?',
		buttons: [
			{ title: '是', event: function() { window.location="?cmd=delete&id="+id+"&type="+type+"&page="+page+"&productName="+productName; }, color: 'green' },
			{ title: '否', event: function() { this.close(); box.unfade(); } }
		]
		});
		confirm.open();
	}
	function setType(type,id,checked){
		var page = '<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
';
		var product_name = '<?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>
';
		window.location="?cmd=type&type="+type+"&id="+id+"&check="+checked+"&page="+page+"&product_name="+product_name;
	}
	function setOnline(id,checked){
		var page = '<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
';
		var product_name = '<?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>
';
		window.location="?cmd=online&id="+id+"&check="+checked+"&page="+page+"&product_name="+product_name;
	}

	
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
            <li class="active">在售商品</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
	<form action="" method="post">
    	<input type="hidden" name="page" value="1">
	    <table>
	    	<tr>
		    	<!--<td>
			    	<select style="width:150px;" name="m_id">
				    	<option value="0">全部</option>
				    	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
				    	<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['m_id']->value==$_smarty_tpl->tpl_vars['item']->value['m_id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
</option>
				    	<?php } ?>
				    </select>
			    </td>
		    	<td>
			    	<select style="width:150px;" name="brand_id">
				    	<option value="0">全部</option>
			    		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
				    	<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['brand_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['brand_id']->value==$_smarty_tpl->tpl_vars['item']->value['brand_id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['brand_name'];?>
</option>
				    	<?php } ?>
				    </select>
			    </td>-->
			    <td>
			    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>
" name="product_name" placeholder="商品名称或货号" style="width:120px;"/>
			    </td>
			    <td style="padding-bottom: 10px;"><input type="submit" value="查询"/></td>
		    </tr>
	    </table>
	    </form>
	</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>主类别</th>
          <th>商品名称</th>
          <th>封面图</th>
          <th>库存</th>
          <th>商城价格</th>
          <th>上架</th>
          <th>限时抢购</th>
          <th>猜你喜欢</th>
          <th>超值热销</th>
          <th>新品上架</th>
          <th style="width: 120px;">操作</th>
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
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</td>
          <td><img src="../<?php echo $_smarty_tpl->tpl_vars['item']->value['product_pic'];?>
"  title="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
" style="height:40px;"/></td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['product_amount'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['product_price1'];?>
</td>
          <td><input type="checkbox" name="" id=""  onclick="setOnline(this.value,this.checked);" <?php if ($_smarty_tpl->tpl_vars['item']->value['product_online']=='1'){?>checked="checked"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
"/></td>
          <td><input type="checkbox" name="" id=""  onclick="setType(1,this.value,this.checked);" <?php if ($_smarty_tpl->tpl_vars['item']->value['product_recommend1']=='1'){?>checked="checked"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
"/></td>
          <td><input type="checkbox" name="" id=""  onclick="setType(2,this.value,this.checked);" <?php if ($_smarty_tpl->tpl_vars['item']->value['product_recommend2']=='1'){?>checked="checked"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
"/></td>
          <td><input type="checkbox" name="" id=""  onclick="setType(3,this.value,this.checked);" <?php if ($_smarty_tpl->tpl_vars['item']->value['product_recommend3']=='1'){?>checked="checked"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
"/></td>
          <td><input type="checkbox" name="" id=""  onclick="setType(4,this.value,this.checked);" <?php if ($_smarty_tpl->tpl_vars['item']->value['product_recommend4']=='1'){?>checked="checked"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
"/></td>
          <td>
              <a href="purchase_list.php?product_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
" title="进货管理">进货管理</a>
              &nbsp;
              <a href="product_create.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
&type=list&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&productName=<?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>
" title="编辑"><i class="icon-pencil"></i></a>
              &nbsp;
              <a href="#myModal" role="button" data-toggle="modal" title="删除" onclick="deleteDetail('<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
','list','<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>
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