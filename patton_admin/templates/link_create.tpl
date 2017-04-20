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
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=u_photo', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
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
            <li class="active">品牌信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='product_brand.php'"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
     <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">链接名称:</span>&nbsp;</td>
        	<td class="td1">
        	<input type="text" name="u_name" id="u_name" value="{$map['u_name']}" />&nbsp;
        	<span class="left_txt">* 例如：海信官网</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">链接网址:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="u_link" id="u_link" value="{$map['u_link']}" />&nbsp;
        		<span class="left_txt">* 例如：www.baidu.com</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">是否启用:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="radio" name="u_display" value="1" {if $map['u_display'] eq '1'}checked="checked"{/if} />&nbsp;启用 &nbsp;&nbsp;&nbsp;&nbsp;
        		<input type="radio" name="u_display" value="0" {if $map['u_display'] eq '0'}checked="checked"{/if} />&nbsp;停用
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">链接照片:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="u_photo" id="u_photo" value="{$map['u_photo']}" />
        		<input type="button" value="添加" id="photo1"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">排序:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="u_order" id="u_order" value="{$map['u_order']}"/>&nbsp;
        		<span class="left_txt">* 例如：1 数字越小越靠前</span>
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
        		<input type="hidden" name="brand_id" value="{$map['u_id']}"/>
        		<input type="submit" name="" value="保存" />
        	</td>
        </tr>
        </table>
        </form>
</div>
<div class="pagination">
   {$pages}
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
		var u_link = document.getElementById("u_link").value;

		if(u_link.length==0){
			alert("请输入链接");
			return false;
		}else{
			return true;
		}	
    }
    </script>
    {/literal}
  </body>
</html>


