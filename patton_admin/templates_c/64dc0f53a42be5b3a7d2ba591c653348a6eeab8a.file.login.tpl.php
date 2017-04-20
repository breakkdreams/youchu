<?php /* Smarty version Smarty-3.1.14, created on 2017-04-20 09:00:12
         compiled from "templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1780458f8081c508978-33388425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64dc0f53a42be5b3a7d2ba591c653348a6eeab8a' => 
    array (
      0 => 'templates\\login.tpl',
      1 => 1492581715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1780458f8081c508978-33388425',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58f8081c815901_41983675',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f8081c815901_41983675')) {function content_58f8081c815901_41983675($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en" style="height: 100%;">
  <head>
    <meta charset="utf-8">
    <title>管理员登录</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="lib/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    
    <script type="text/javascript" src="../js/m.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery.ui.draggable.js"></script>
	<script type="text/javascript" src="../js/jquery.alerts.js"></script>
	
	<link href="../js/jquery.alerts.css" rel="stylesheet" type="text/css" />
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class="" style="background-image: url(../images/background.jpg);background-repeat:no-repeat; background-size:100% 100%;-moz-background-size:100% 100%;height: 100%;">
  <!--<![endif]-->
    
    <div class="navbar" >
        <div class="navbar-inner" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6c7a95))">
                <ul class="nav pull-right">
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">管理员</span> <span class="second">系统</span></a>
        </div>
    </div>
    


    

    
        <div class="row-fluid">
    <div class="dialog" style="">
        <div class="block">
            <p class="block-heading">管理员登录</p>
            <div class="block-body">
                <form action="" method="post" id="form1">
                    <label>账号</label>
                    <input type="text" name="mobile" id="mobile" class="span12">
                    <label>密码</label>
                    <input type="password" name="password" id="password" class="span12">
                    <label>验证码</label>
                    <input class="span3" name="verifycode" id="verifycode" type=text value="" maxLength=4>
                            <img style="cursor:pointer;padding-bottom:8px;height:30px;" title="刷新验证码" id="refresh" border='0' src='gd2.php' onclick="document.getElementById('refresh').src='gd2.php?t='+Math.random()" />  
                    <a href="javascript:check();" class="btn btn-primary pull-right">登录</a>
                    <label class="remember-me"><input type="checkbox">记住密码</label>
                    <div class="clearfix"></div>
                    <input type="hidden" name="act" value="login"/>
                </form>
            </div>
        </div>
        <p class="pull-right" style=""><a href="http://www.fckey.com" target="blank">技术QQ:39980128</a></p>
        <p><a href="reset-password.html">忘记密码?</a></p>
    </div>
</div>


    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    <script language="JavaScript">
		function check(){
			var username = document.getElementById("mobile").value;
			var password = document.getElementById("password").value;
			var verifycode = document.getElementById("verifycode").value;
	
			if(username.length==0){
				alert("请输入用户名");
				return false;
			}else if(password.length==0){
				alert("请输入密码");
				return false;
			}else if(verifycode.length==0){
				alert("请输入验证码");
				return false;
			}else{
				document.getElementById("form1").submit();
			}
		}
	</script>
    
  </body>
</html>


<?php }} ?>