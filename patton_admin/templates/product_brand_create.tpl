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
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=brand_photo', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('b1').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=brand_b1', title: '图片上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('b2').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=brand_b2', title: '图片上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('b3').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=brand_b3', title: '图片上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('b4').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=brand_b4', title: '图片上传' }).addButton('关闭', function() { light.close(); },true).open();
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
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">品牌名称:</span>&nbsp;</td>
        	<td class="td1">
        	<input type="text" name="brand_name" id="brand_name" value="{$map['brand_name']}" />&nbsp;
        	<span class="left_txt">* 例如：海信</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">官方网址:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_web" id="brand_web" value="{$map['brand_web']}" />&nbsp;
        		<span class="left_txt">* 例如：www.baidu.com</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">品牌类型:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_type" id="brand_type" value="{$map['brand_type']}" />&nbsp;
        		<span class="left_txt">* 例如：电器</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">服务热线:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_phone" id="brand_phone" value="{$map['brand_phone']}" />&nbsp;
        		<span class="left_txt">* 例如：400-8888-8888</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">负责人:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_linkman" id="brand_linkman" value="{$map['brand_linkman']}" />&nbsp;
        		<span class="left_txt">* 例如：张三</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">负责人手机:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_mobile" id="brand_mobile" value="{$map['brand_mobile']}" />&nbsp;
        		<span class="left_txt">* 例如：13588888888</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">是否启用:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="radio" name="brand_display" value="1" {if $map['brand_display'] eq '1'}checked="checked"{/if} />&nbsp;启用 &nbsp;&nbsp;&nbsp;&nbsp;
        		<input type="radio" name="brand_display" value="0" {if $map['brand_display'] eq '0'}checked="checked"{/if} />&nbsp;停用
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">品牌照片:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_photo" id="brand_photo" value="{$map['brand_photo']}" />
        		<input type="button" value="添加" id="photo1"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">Banner图1:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_b1" id="brand_b1" value="{$map['brand_b1']}" />
        		<input type="button" value="添加" id="b1"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">Banner图2:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_b2" id="brand_b2" value="{$map['brand_b2']}" />
        		<input type="button" value="添加" id="b2"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">Banner图3:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_b3" id="brand_b3" value="{$map['brand_b3']}" />
        		<input type="button" value="添加"  id="b3"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">Banner图4:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_b4" id="brand_b4" value="{$map['brand_b4']}" />
        		<input type="button" value="添加"  id="b4"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">生产商:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_producer" id="brand_producer" value="{$map['brand_producer']}" style="width:670px;"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">厂家地址:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_address" id="brand_address" value="{$map['brand_address']}" style="width:670px;"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">厂家识别码:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_license" id="brand_license" value="{$map['brand_license']}" style="width:670px;"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">简短描述:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="brand_describe" id="brand_describe" value="{$map['brand_describe']}" style="width:670px;"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">详细描述:</span>&nbsp;</td>
        	<td class="td1">
        		<script id="editor" type="text/plain" style="min-width:670px;max-width:800px;height:500px;">{$map['brand_info']}</script>
        		<input type="hidden" name="brand_info" id="brand_info"/>
			</td>
        </tr>
        
        <tr>
        	<td>&nbsp;</td>
        	<td>&nbsp;
        		{if $map['brand_id']>0}
        		<input type="hidden" name="operator" value="edit"/>
        		{else}
        		<input type="hidden" name="operator" value="create"/>
        		{/if}
        		<input type="hidden" name="brand_id" value="{$map['brand_id']}"/>
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

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }

    function check(){
		var brand_name = document.getElementById("brand_name").value;

		if(brand_name.length==0){
			alert("请输入品牌名称");
			return false;
		}else{
			document.getElementById("brand_info").value=UE.getEditor('editor').getContent();
			return true;
		}	
    }
    </script>
    {/literal}
  </body>
</html>


