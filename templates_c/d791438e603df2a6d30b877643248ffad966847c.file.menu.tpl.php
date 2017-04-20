<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:07:52
         compiled from "core\templates\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:790958f817f8197428-69711806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd791438e603df2a6d30b877643248ffad966847c' => 
    array (
      0 => 'core\\templates\\menu.tpl',
      1 => 1471589422,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '790958f817f8197428-69711806',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'item' => 0,
    'item2' => 0,
    'shop_acount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58f817f8229834_50559859',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f817f8229834_50559859')) {function content_58f817f8229834_50559859($_smarty_tpl) {?>
<div class="navBox">
	  <div class="nav">
      	<div class="nav_title"><!--
        	<p><a href="list.php">所有商品分类</a></p>
        	
--><div class="hc_lnav jslist">
	<div class="allbtn">
		<h2><a href="#"><strong>&nbsp;</strong>全部商品分类<i>&nbsp;</i></a></h2>
		<ul style="width:190px;height: auto;" class="jspop box">
			
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    		<?php if ($_smarty_tpl->tpl_vars['item']->value['m_size']==1){?>
       		<li class=a1>
				<div class=tx><a href=""><i>&nbsp;</i> <?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
</a> </div>
				<dl>
					<dt>推荐</dt>
					<dd>
					<?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>

					</dd>
				</dl>
				<div class=pop style="height: 100%">
					<h3><a href="">可口茶食</a></h3>
					<?php  $_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item2']->key => $_smarty_tpl->tpl_vars['item2']->value){
$_smarty_tpl->tpl_vars['item2']->_loop = true;
?>
    				<?php if ($_smarty_tpl->tpl_vars['item2']->value['m_size']==2&&$_smarty_tpl->tpl_vars['item2']->value['m_fid']==$_smarty_tpl->tpl_vars['item']->value['m_id']){?>
    				<dl>
						<dd>
							<a href="list.php?f=<?php echo $_smarty_tpl->tpl_vars['item2']->value['m_floor'];?>
"><?php echo $_smarty_tpl->tpl_vars['item2']->value['m_name'];?>
</a>
						</dd>
					</dl>
    				<?php }?>
       				<?php } ?>
					<div class=clr></div>
				</div>
			</li>
       		<?php }?>
       		<?php } ?>
       	
       	
		</ul>
	</div>
</div>

        	
        </div>
        <ul class="bigNav">
        	<li><a href="index.php">首页</a></li>
            <li><a href="list.php">所有分类</a></li>
            <li style="padding-right:10px;"><a href="tuan.php">促销活动</a><img src="images/hot.png" /></li>
            <li><a href="ticket.php">提货券</a></li>
            <li style="background-image:none"><a href="#">企业采购</a></li>
        </ul>
        <div class="shoppingCar">
        	<input style="margin-top:10px;" type="image" src="images/gouwuche.png" onclick="window.location.href='cart_list.php';"/>
            <div class="number"><p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['shop_acount']->value)===null||$tmp==='' ? 0 : $tmp);?>
</p></div>
            <input style="margin-top:10px; margin-left:20px;" type="image" src="images/jiesuan.png"  onclick="window.location.href='cart_list.php#buy';"/>
            
        </div>
      </div>
    </div><?php }} ?>