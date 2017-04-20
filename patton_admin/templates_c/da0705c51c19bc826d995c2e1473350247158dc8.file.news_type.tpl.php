<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:08:03
         compiled from "templates\news_type.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1187358f81803028ce8-18139392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da0705c51c19bc826d995c2e1473350247158dc8' => 
    array (
      0 => 'templates\\news_type.tpl',
      1 => 1451111018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1187358f81803028ce8-18139392',
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
  'unifunc' => 'content_58f818031f0379_63743116',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f818031f0379_63743116')) {function content_58f818031f0379_63743116($_smarty_tpl) {?><!DOCTYPE html>
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
    function deleteDetail(id){
    	
		var confirm = new LightFace({
			width: 250,
			title: '确认信息',
		keys: {
			esc: function() { this.close(); box.unfade(); }
		},
			content: '是否确定删除此栏目及附属子栏目?',
		buttons: [
			{ title: '是', event: function() { window.location="?cmd=delete&id="+id; }, color: 'green' },
			{ title: '否', event: function() { this.close(); box.unfade(); } }
		]
		});
		confirm.open();
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
            <li class="active">文章栏目</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='news_type_create.php';"><i class="icon-plus"></i>添加栏目</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>栏目编号</th>
          <th>栏目名称</th>
          <th>封面图</th>
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
        <tr>
          <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['list']['iteration'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
</td>
		  <td>|
          <?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>---
          <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==2){?>------
          <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==3){?>---------
          <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==4){?>------------
          <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==5){?>---------------
          <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==6){?>------------------
          <?php }?>
          
          <?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?><span style="color:red;font-weight: 700"><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
</span>
          <?php }elseif($_smarty_tpl->tpl_vars['item']->value['m_size']==2){?><span style="font-weight:700"><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
</span>
          <?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>

          <?php }?>
          </td>
          <td><?php if ($_smarty_tpl->tpl_vars['item']->value['m_photo']==''){?><span style="color:#eee7e7">查看</span><?php }else{ ?><a href="../<?php echo $_smarty_tpl->tpl_vars['item']->value['m_photo'];?>
" target="_blank">查看</a><?php }?></td>
          <td>
          	  <a href="news_type_create.php?parent_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" title="添加子栏目">添加子栏目</i></a>
          	  &nbsp;
              <a href="news_type_create.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
" title="编辑"><i class="icon-pencil"></i></a>
              &nbsp;
              <a href="#" role="button" data-toggle="modal" onclick="deleteDetail('<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
')" title="删除"><i class="icon-remove"></i></a>
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