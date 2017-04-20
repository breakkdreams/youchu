<!DOCTYPE html>
<html lang="en">
  <head>
    {include file="head.tpl"}
    <script type="text/javascript" charset="utf-8" src="ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
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
			
			document.id('p1').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=n_photo', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('p2').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=n_file', title: '附件上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
		});
	</script>
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
            <li class="active">文章列表</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='news.php'"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
     <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;" border="0">
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">内容类别:</span>&nbsp;</td>
        	<td class="td1">
        		<select name="n_type1" id="n_type1">
        			<option value="">请选择</option>
        			{foreach name=list item=item from=$menu}
        			{if $item['m_size'] eq 1 and $item['m_id'] eq $map['n_type1']}
        			<option value="{$item['m_id']}" style="background-color:#FFFFFF; color:red;font-weight:700" selected="selected">
        			{else if $item['m_size'] eq 1}
        			<option value="{$item['m_id']}" style="background-color:#FFFFFF; color:red;font-weight:700">
        			{else if $item['m_id'] eq $map['product_type1']}
        			<option value="{$item['m_id']}" selected="selected">
        			{else}
        			<option value="{$item['m_id']}">
        			{/if}
        			|
        			{if $item['m_size'] eq 1}---
			        {else if $item['m_size'] eq 2}------
			        {else if $item['m_size'] eq 3}---------
			        {else if $item['m_size'] eq 4}------------
			        {else if $item['m_size'] eq 5}---------------
			        {else if $item['m_size'] eq 6}------------------
			        {/if}
        			{$item['m_name']}
        			</option>
        			{/foreach}
        		</select>
        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:168px;" class="td1"><span class="td1_bt">内容名称:</span>&nbsp;</td>
        	<td class="td1">
        	<input type="text" name="n_title" id="n_title" value="{$map['n_title']}" class="ipt1" style="width:600px;"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">来源:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="n_source" id="n_source" value="{$map['n_source']}" class="ipt1"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">关键词:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="n_keyword" id="n_keyword" value="{$map['n_keyword']}" class="ipt1"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">发布人员:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="n_author" id="n_author" value="{$map['n_author']}" class="ipt1"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">封面图:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="n_photo" id="n_photo" value="{$map['n_photo']}" class="ipt1"/>
        		<input type="button" value="添加" id="p1"/>
        		<span class="left_txt">* 允许上传文件类型为：png / jpg ，文件大小请控制在200kb以内</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">视频文件:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="n_file" id="n_file" value="{$map['n_file']}" class="ipt1"/>
        		<input type="button" value="添加" id="p2"/>
        		<span class="left_txt">* 允许上传文件类型为：flv，建议文件大小请控制在20M以内</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">排序:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="n_order" id="n_order" value="{$map['n_order']}"/>&nbsp;
        		<span class="left_txt">* 输入阿拉伯数字，数字越大越靠前</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:168px;" class="td1"><span class="td1_bt">简短描述:</span>&nbsp;</td>
        	<td class="td1">
        	<input type="text" name="n_describe" id="n_describe" value="{$map['n_describe']}" class="ipt1" style="width:600px;"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">内容:</span>&nbsp;</td>
        	<td class="td1">
        		<script id="editor" type="text/plain" style="min-width:600px;max-width:800px;height:500px;">{$map['n_content']}</script>
        		<input type="hidden" name="n_content" id="n_content"/>
        		<input type="hidden" name="cmd" value="{$cmd}"/>
        		<input type="hidden" name="n_id" id="n_id" value="{$map['n_id']}"/>
			</td>
        </tr>
        
        <tr>
        	<td>&nbsp;</td>
        	<td>&nbsp;
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
		var title = document.getElementById("n_title").value;
		var content = UE.getEditor('editor').getContent();

		if(title.length==0){
			alert("请输入文章标题");
			return false;
		}else if(content.length==0){
			alert("请输入文章内容");
			return false;
		}else{
			document.getElementById("n_content").value=UE.getEditor('editor').getContent();
			return true;
		}	
    }
    </script>
    {/literal}
  </body>
</html>


