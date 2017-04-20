<!DOCTYPE html>
<html lang="en">
  <head>
    {include file="head.tpl"}
    <script type="text/javascript" charset="utf-8" src="ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
    {literal}
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
		window.addEvent('domready',function(){
			
			document.id('photo1').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=d_pic', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
		});
	</script>
	{/literal}
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    {include file="navbar.tpl"}
    
    {include file="left.tpl"}
    

    
    <div class="content">
        
        <div class="header">
            <div class="stats"></div>

            <h1 class="page-title">桌面信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li class="active">管理员信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='user_list.php'"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
     <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">所属角色:</span>&nbsp;</td>
        	<td class="td1">
        		<select name="u_role" id="u_role"> 
        			<option value="">请选择</option>
        			<option value="1" {if $map['u_role'] eq '1'}selected="selected"{/if}>客服</option>
        			<option value="2" {if $map['u_role'] eq '2'}selected="selected"{/if}>售后</option>
        			<option value="3" {if $map['u_role'] eq '3'}selected="selected"{/if}>财务</option>
        			<option value="4" {if $map['u_role'] eq '4'}selected="selected"{/if}>技术</option>
        			<option value="5" {if $map['u_role'] eq '5'}selected="selected"{/if}>仓管</option>
        			<option value="6" {if $map['u_role'] eq '6'}selected="selected"{/if}>市场</option>
        			<option value="7" {if $map['u_role'] eq '7'}selected="selected"{/if}>其他</option>
        			<option value="8" {if $map['u_role'] eq '8'}selected="selected"{/if}>超级管理员</option>
        		</select>
        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">手机号:</span>&nbsp;</td>
        	<td class="td1">
        	<input type="text" name="u_name" id="u_name" value="{$map['u_name']}" />&nbsp;
        	<span class="left_txt">* 说明：手机号为登录账号</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">姓名:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="u_username" id="u_username" value="{$map['u_username']}" />
        		<span class="left_txt">* 例如：张三</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">邮箱:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="u_email" id="u_email" value="{$map['u_email']}" />&nbsp;
        		<span class="left_txt">* 例如：39980128@qq.com</span>
        	</td>
        </tr>
        
        <tr>
        	<td>&nbsp;</td>
        	<td>&nbsp;
        		{if $map['u_id']>0}
        		<input type="hidden" name="operator" value="edit"/>
        		{else}
        		<input type="hidden" name="operator" value="create"/>
        		{/if}
        		<input type="hidden" name="u_id" value="{$map['u_id']}"/>
        		<input type="submit" name="" value="保存" />
        	</td>
        </tr>
        </table>
        </form>
</div>
<div class="pagination">

</div>

{include file="footer.tpl"}      
                    
            </div>
        </div>
    </div>
    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    {literal}
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    <script type="text/javascript">

    function check(){
		var u_role = document.getElementById("u_role").value;
		var u_name = document.getElementById("u_name").value;
		
		if(u_role.length==0){
			alert("请选择角色");
			return false;
		}else if(u_name.length==0){
			alert("请输入手机号");
			return false;
		}else{
			return true;
		}	
    }
    </script>
    {/literal}
  </body>
</html>


