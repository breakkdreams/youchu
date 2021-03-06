<!DOCTYPE html>
<html lang="en">
  <head>
    {include file="head.tpl"}
    <script type="text/javascript">
		function selectFid(v){
			var item = v.split("|");
	
			document.getElementById("fid").value=item[0];
			document.getElementById("size").value=(item[1]*1)+1;
			document.getElementById("floor").value=item[2];
		}
	
		function check(){

			selectFid(document.getElementById("slt").value);
			
			var name = document.getElementById("name").value;
			var slt = document.getElementById("slt").value;
			var keyword = document.getElementById("keyword").value;
			
			if(slt.length==0){
				alert("请选择栏目信息");
				return false;
			}else if(name.length==0){
				alert("请输入栏目名称 ");
				return false;
			}else if(keyword.length>450){
				alert("栏目简介请控制在450字以内");
				return false;
			}
	
			return true;
		}
	</script>
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
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=m_photo', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('photo2').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=m_photo2', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
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
            <li class="active">商品分类</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='product_menu.php';"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
    <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;" border="0">
        <tr>
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">上级目录:</span>&nbsp;</td>
        	<td class="td1">
        		<select name="slt" id="slt" style="width:222px;" onchange="javascript:selectFid(this.value)">
        			<option value="">请选择</option>
        			<option value="0|0|0">一级分类</option>
        			{foreach name=list item=item from=$list}
        			<option value="{$item['m_id']}|{$item['m_size']}|{$item['m_floor']}" {if $parent_id eq $item['m_id']}selected="selected"{else if $map['m_id'] eq $item['m_id']}selected="selected"{/if}>
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
        	<td align="right" class="td1"><span class="td1_bt">分类名称:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="m_name" id="m_name" value="{$map['m_name']}" class="ipt1"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">封面图:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="m_photo" id="m_photo" value="{$map['m_photo']}" class="ipt1"/>
        		<input type="button" value="添加" id="photo1"/>
        		<span class="left_txt">* 允许上传文件类型为：png / jpg ，文件大小请控制在200kb以内</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">广告图:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="m_photo2" id="m_photo2" value="{$map['m_photo2']}" class="ipt1"/>
        		<input type="button" value="添加" id="photo2"/>
        		<span class="left_txt">* 允许上传文件类型为：png / jpg ，文件大小请控制在200kb以内</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">分类排序:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="m_order" id="m_order" value="{$map['m_order']}" class="ipt1"/>&nbsp;<span class="left_txt">数字越大越靠前</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">分类链接:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="m_url" id="m_url" value="{$map['m_url']}" class="ipt1"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">分类说明:</span>&nbsp;</td>
        	<td class="td1">
        		<textarea name="m_keyword" id="m_keyword"  style="width:615px;height:80px">{$map['m_keyword']}</textarea>
        	</td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
        	<td>&nbsp;
        		<input type="hidden" name="operator" value="{$operator}"/>
        		<input type="hidden" name="m_id" id="m_id" value="{$map['m_id']}"/>
        		<input type="hidden" name="fid" id="fid" value="0"/>
        		<input type="hidden" name="floor" id="floor" value="0."/>
        		<input type="hidden" name="size" id="size" value="1"/>
        		<input type="submit" name="" value="保存">
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
    {/literal}
  </body>
</html>


