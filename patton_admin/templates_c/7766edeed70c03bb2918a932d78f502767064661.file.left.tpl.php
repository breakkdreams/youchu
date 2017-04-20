<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:07:27
         compiled from ".\templates\left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1860858f817dfc96942-83026855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7766edeed70c03bb2918a932d78f502767064661' => 
    array (
      0 => '.\\templates\\left.tpl',
      1 => 1492417705,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1860858f817dfc96942-83026855',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'manage_type' => 0,
    'manage_right' => 0,
    'left_class_open1' => 0,
    'left_class1' => 0,
    'left_class_open2' => 0,
    'left_class2' => 0,
    'left_class_open3' => 0,
    'left_class3' => 0,
    'left_class_open4' => 0,
    'left_class4' => 0,
    'left_class_open5' => 0,
    'left_class5' => 0,
    'left_class_open6' => 0,
    'left_class6' => 0,
    'left_class_open7' => 0,
    'left_class7' => 0,
    'left_class_open8' => 0,
    'left_class8' => 0,
    'left_class_open9' => 0,
    'left_class9' => 0,
    'left_class_open10' => 0,
    'left_class10' => 0,
    'left_class_open11' => 0,
    'left_class11' => 0,
    'left_class_open12' => 0,
    'left_class12' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58f817e054b3e4_95284934',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f817e054b3e4_95284934')) {function content_58f817e054b3e4_95284934($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['manage_type']->value=='0'){?>
<div class="sidebar-nav">
		<?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"商品性质")!==false){?>
        <a href="#dashboard-menu" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open1']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-dashboard"></i>商品性质<i class="icon-chevron-up"></i></a>
        <!-- in -->
        <ul id="dashboard-menu" class="nav nav-list collapse<?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class1']->value)===null||$tmp==='' ? '' : $tmp);?>
">
        	<?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"商品品牌")!==false){?><li><a href="product_brand.php">商品品牌</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"商品栏目")!==false){?><li><a href="product_menu.php">商品栏目</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"商品类型")!==false){?><li><a href="product_type.php">商品类型</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"SKU管理")!==false){?><li><a href="sku.php">SKU管理</a></li><?php }?>          
        </ul>
        <?php }?>

		<?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"商品管理")!==false){?>
        <a href="#accounts-menu" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open2']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-briefcase"></i>商品管理<i class="icon-chevron-up"></i></a>
        <ul id="accounts-menu" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class2']->value)===null||$tmp==='' ? '' : $tmp);?>
">
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"添加商品")!==false){?><li><a href="product_create.php">添加商品</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"在售商品")!==false){?><li><a href="product_list.php">在售商品</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"下架商品")!==false){?><li><a href="product_offline.php">下架商品</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"促销商品")!==false){?><li><a href="product_list.php?type=3">促销商品</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"回收站")!==false){?><li><a href="product_delete.php">回收站</a></li><?php }?>  
        </ul>
        <?php }?>
        
        <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"会员管理")!==false){?>
        <a href="#legal-member" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open3']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-legal"></i>会员管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-member" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class3']->value)===null||$tmp==='' ? '' : $tmp);?>
">
        	<?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"会员列表")!==false){?><li><a href="member_list.php">会员列表</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"会员等级")!==false){?><li><a href="member_level.php">会员等级</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"会员分组")!==false){?><li><a href="member_group.php">会员分组</a></li><?php }?>
        </ul>
        <?php }?>
        
        <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"订单管理")!==false){?>
        <a href="#legal-menu" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open4']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-legal"></i>订单管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-menu" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class4']->value)===null||$tmp==='' ? '' : $tmp);?>
">
        	<?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"待支付")!==false){?><li><a href="order_list.php">待支付</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"待发货")!==false){?><li><a href="order_list2.php">待发货</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"已发货")!==false){?><li><a href="order_list3.php">已发货</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"已完成")!==false){?><li><a href="order_list4.php">已完成</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"申请退货")!==false){?><li><a href="order_list5.php">申请退货</a></li><?php }?>
        </ul>
		<?php }?>

<!--		<?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"促销活动")!==false){?>-->
<!--        <a href="#error-menu" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open5']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">-->
<!--        <i class="icon-exclamation-sign"></i>促销活动<i class="icon-chevron-up"></i></a>-->
<!--        <ul id="error-menu" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class5']->value)===null||$tmp==='' ? '' : $tmp);?>
">-->
<!--        	<?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"单品促销")!==false){?><li><a href="act_single.php">单品促销</a></li><?php }?>-->
<!--            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"买送促销")!==false){?><li><a href="act_ms.php">买送促销</a></li><?php }?>-->
<!--            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"赠品促销")!==false){?><li><a href="act_zp.php">赠品促销</a></li><?php }?>-->
<!--            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"套装促销")!==false){?><li><a href="act_tz.php">套装促销</a></li><?php }?>-->
<!--            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"满减促销")!==false){?><li><a href="act_mj.php">满减促销</a></li><?php }?>-->
<!--            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"活动专题")!==false){?><li><a href="act_zt.php">活动专题</a></li><?php }?>-->
<!--            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"优惠券")!==false){?><li><a href="act_ticket.php">优惠券</a></li><?php }?>-->
<!--        </ul>-->
<!--		<?php }?>-->
		
<!--		<?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"咨询评价")!==false){?>-->
<!--        <a href="#legal-comment" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open6']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">-->
<!--        <i class="icon-comment"></i>咨询评价<i class="icon-chevron-up"></i></a>-->
<!--        <ul id="legal-comment" class="nav nav-list collapse<?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class6']->value)===null||$tmp==='' ? '' : $tmp);?>
">-->
<!--            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"商品评价")!==false){?><li><a href="comment_list.php">商品评价</a></li><?php }?>-->
<!--            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"商品咨询")!==false){?><li><a href="consultant_list.php">商品咨询</a></li><?php }?>-->
<!--            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"咨询类型")!==false){?><li><a href="consultant_type.php">咨询类型</a></li><?php }?>-->
<!--        </ul>-->
<!--		<?php }?>-->

		<?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"文章管理")!==false){?>
		<a href="#legal-news" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open7']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>文章管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-news" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class7']->value)===null||$tmp==='' ? '' : $tmp);?>
">
        	<?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"文章类型")!==false){?><li><a href="news_type.php">文章类型</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"发布文章")!==false){?><li><a href="news_create.php">发布文章</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"文章列表")!==false){?><li><a href="news.php">文章列表</a></li><?php }?>
        </ul>
        <?php }?>
        
        <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"广告管理")!==false){?>
        <a href="#legal-ad" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open8']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>广告管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-ad" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class8']->value)===null||$tmp==='' ? '' : $tmp);?>
">
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"广告位置")!==false){?><li><a href="ad_place.php">广告位置</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"发布广告")!==false){?><li><a href="ad_create.php">发布广告</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"广告列表")!==false){?><li><a href="ad_list.php">广告列表</a></li><?php }?>
        </ul>
        <?php }?>
        
        <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"商城管理")!==false){?>
        <a href="#legal-content" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open9']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>商城管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-content" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class9']->value)===null||$tmp==='' ? '' : $tmp);?>
">
            
            <!-- <li ><a href="help_list.php">帮助中心</a></li> -->
            
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"导航菜单")!==false){?><li><a href="menu_list.php">导航菜单</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"配送范围")!==false){?><li><a href="area_list.php">配送范围</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"管理员账号")!==false){?><li><a href="user_list.php">管理员账号</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"友情链接")!==false){?><li><a href="link_list.php">友情链接</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"商家管理")!==false){?><li><a href="seller_list.php">商家管理</a></li><?php }?>
        </ul>
        <?php }?>
        
        <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"报表统计")!==false){?>
        <a href="#legal-chart" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open10']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>报表统计<i class="icon-chevron-up"></i></a>
        <ul id="legal-chart" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class10']->value)===null||$tmp==='' ? '' : $tmp);?>
">
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"在线用户")!==false){?><li><a href="count_member.php">在线用户</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"搜索分析")!==false){?><li><a href="count_search.php">搜索分析</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"商品统计")!==false){?><li><a href="count_product.php">商品统计</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"销售明细")!==false){?><li><a href="count_sale.php">销售明细</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"订单统计")!==false){?><li><a href="count_order.php">订单统计</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"地区统计")!==false){?><li><a href="count_area.php">地区统计</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"客户端统计")!==false){?><li><a href="count_client.php">客户端统计</a></li><?php }?>
        </ul>
        <?php }?>
        
        <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"支付接口")!==false){?>
        <a href="#legal-pay" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open11']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>支付接口<i class="icon-chevron-up"></i></a>
        <ul id="legal-pay" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class11']->value)===null||$tmp==='' ? '' : $tmp);?>
">
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"支付宝")!==false){?><li><a href="pay_ali.php">支付宝</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"微信支付")!==false){?><li><a href="pay_weixin.php">微信支付</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"网银在线")!==false){?><li><a href="pay_bank.php">网银在线</a></li><?php }?>
        </ul>
        <?php }?>
        
        <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"系统设置")!==false){?>
        <a href="#legal-system" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open12']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>系统设置<i class="icon-chevron-up"></i></a>
        <ul id="legal-system" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class12']->value)===null||$tmp==='' ? '' : $tmp);?>
">
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"站点信息")!==false){?><li><a href="sys_site.php">站点信息</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"邮箱设置")!==false){?><li><a href="sys_email.php">邮箱设置</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"短信设置")!==false){?><li><a href="sys_sms.php">短信设置</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"积分设置")!==false){?><li><a href="sys_record.php">积分设置</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"性能设置")!==false){?><li><a href="sys_cache.php">性能设置</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"禁止IP")!==false){?><li><a href="sys_ip.php">禁止IP</a></li><?php }?>
            <?php if (strpos($_smarty_tpl->tpl_vars['manage_right']->value,"热门搜索")!==false){?><li><a href="sys_search.php">热门搜索</a></li><?php }?>
        </ul>
        <?php }?>
        
    </div>
<?php }else{ ?>
<div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open1']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-dashboard"></i>商品性质<i class="icon-chevron-up"></i></a>
        <!-- in -->
        <ul id="dashboard-menu" class="nav nav-list collapse<?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class1']->value)===null||$tmp==='' ? '' : $tmp);?>
">
        	<li><a href="product_brand.php">商品品牌</a></li>
            <li><a href="product_menu.php">商品栏目</a></li>
            <li><a href="product_type.php">商品类型</a></li>
            <li><a href="sku.php">SKU管理</a></li>     
        </ul>

        <a href="#accounts-menu" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open2']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-briefcase"></i>商品管理<i class="icon-chevron-up"></i></a>
        <ul id="accounts-menu" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class2']->value)===null||$tmp==='' ? '' : $tmp);?>
">
            <li><a href="product_create.php">添加商品</a></li>
            <li><a href="product_list.php">在售商品</a></li>
            <li><a href="product_offline.php">下架商品</a></li>
            <li><a href="product_list.php?type=3">促销商品</a></li>
            <li><a href="product_delete.php">回收站</a></li> 
        </ul>
        
        <a href="#legal-member" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open3']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-legal"></i>会员管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-member" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class3']->value)===null||$tmp==='' ? '' : $tmp);?>
">
        	<li><a href="member_list.php">会员列表</a></li><!--
            <li><a href="member_level.php">会员等级</a></li>
            --><li><a href="member_group.php">会员分组</a></li>
        </ul>
        
        <a href="#legal-menu" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open4']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-legal"></i>订单管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-menu" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class4']->value)===null||$tmp==='' ? '' : $tmp);?>
">
        	<li><a href="order_list.php">待支付</a></li>
            <li><a href="order_list2.php">待发货</a></li>
            <li><a href="order_list3.php">已发货</a></li>
            <li><a href="order_list4.php">已完成</a></li>
            <li><a href="order_list5.php">申请退货</a></li>
        </ul>

<!--        <a href="#error-menu" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open5']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">-->
<!--        <i class="icon-exclamation-sign"></i>促销活动<i class="icon-chevron-up"></i></a>-->
<!--        <ul id="error-menu" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class5']->value)===null||$tmp==='' ? '' : $tmp);?>
">-->
<!--        	<li><a href="act_single.php">单品促销</a></li>-->
<!--            <li><a href="act_ms.php">买送促销</a></li>-->
<!--            <li><a href="act_zp.php">赠品促销</a></li>-->
<!--            <li><a href="act_tz.php">套装促销</a></li>-->
<!--            <li><a href="act_mj.php">满减促销</a></li>-->
<!--            <li><a href="act_zt.php">活动专题</a></li>-->
<!--            <li><a href="act_ticket.php">优惠券</a></li>-->
<!--        </ul>-->

<!--        <a href="#legal-comment" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open6']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">-->
<!--        <i class="icon-comment"></i>咨询评价<i class="icon-chevron-up"></i></a>-->
<!--        <ul id="legal-comment" class="nav nav-list collapse<?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class6']->value)===null||$tmp==='' ? '' : $tmp);?>
">-->
<!--            <li><a href="comment_list.php">商品评价</a></li>-->
<!--            <li><a href="consultant_list.php">商品咨询</a></li>-->
<!--            <li><a href="consultant_type.php">咨询类型</a></li>-->
<!--        </ul>-->

		<a href="#legal-news" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open7']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>文章管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-news" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class7']->value)===null||$tmp==='' ? '' : $tmp);?>
">
        	<li><a href="news_type.php">文章类型</a></li>
            <li><a href="news_create.php">发布文章</a></li>
            <li><a href="news.php">文章列表</a></li>
        </ul>
        
        <a href="#legal-ad" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open8']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>广告管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-ad" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class8']->value)===null||$tmp==='' ? '' : $tmp);?>
">
            <li><a href="ad_place.php">广告位置</a></li>
            <li><a href="ad_create.php">发布广告</a></li>
            <li><a href="ad_list.php">广告列表</a></li>
        </ul>
        
        <a href="#legal-content" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open9']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>商城管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-content" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class9']->value)===null||$tmp==='' ? '' : $tmp);?>
">
            
            <!-- <li ><a href="help_list.php">帮助中心</a></li> -->
            
            <li><a href="menu_list.php">导航菜单</a></li>
            <li><a href="area_list.php">配送范围</a></li>
            <li><a href="user_list.php">管理员账号</a></li>
            <li><a href="link_list.php">友情链接</a></li>
            <li><a href="seller_list.php">商家管理</a></li>
        </ul>
        
        <a href="#legal-chart" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open10']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>报表统计<i class="icon-chevron-up"></i></a>
        <ul id="legal-chart" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class10']->value)===null||$tmp==='' ? '' : $tmp);?>
">
            <li><a href="count_member.php">在线用户</a></li>
            <li><a href="count_search.php">搜索分析</a></li>
            <li><a href="count_product.php">商品统计</a></li>
            <li><a href="count_sale.php">销售明细</a></li>
            <li><a href="count_order.php">订单统计</a></li>
            <li><a href="count_area.php">地区统计</a></li>
            <li><a href="count_client.php">客户端统计</a></li>
        </ul>
        
        <a href="#legal-pay" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open11']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>支付接口<i class="icon-chevron-up"></i></a>
        <ul id="legal-pay" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class11']->value)===null||$tmp==='' ? '' : $tmp);?>
">
            <li><a href="pay_ali.php">支付宝</a></li>
            <li><a href="pay_weixin.php">微信支付</a></li>
            <li><a href="pay_bank.php">网银在线</a></li>
        </ul>
        
        <a href="#legal-system" class="nav-header <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class_open12']->value)===null||$tmp==='' ? 'collapsed' : $tmp);?>
" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>系统设置<i class="icon-chevron-up"></i></a>
        <ul id="legal-system" class="nav nav-list collapse <?php echo (($tmp = @$_smarty_tpl->tpl_vars['left_class12']->value)===null||$tmp==='' ? '' : $tmp);?>
">
            <li><a href="sys_site.php">站点信息</a></li>
            <li><a href="sys_email.php">邮箱设置</a></li>
            <li><a href="sys_sms.php">短信设置</a></li>
            <li><a href="sys_record.php">积分设置</a></li>
            <li><a href="sys_cache.php">性能设置</a></li>
            <li><a href="sys_ip.php">禁止IP</a></li>
            <li><a href="sys_search.php">热门搜索</a></li>
        </ul>
    </div>
<?php }?><?php }} ?>