<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 10:07:27
         compiled from ".\templates\navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2558758f817dfc4df77-31384084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3753d61d0f7228429e0082836f138067d2e8af4e' => 
    array (
      0 => '.\\templates\\navbar.tpl',
      1 => 1492586662,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2558758f817dfc4df77-31384084',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58f817dfc5fba1_06567364',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f817dfc5fba1_06567364')) {function content_58f817dfc5fba1_06567364($_smarty_tpl) {?><div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> 管理员
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="user_list.php">我的账号</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">个人设置</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="login.php">退出系统</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index.php"><span class="first">商城信息管理</span> <span class="second">系统</span></a>
        </div>
    </div><?php }} ?>