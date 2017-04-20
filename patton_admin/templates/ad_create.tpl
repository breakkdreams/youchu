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
            <li class="active">品牌信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='ad_list.php'"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
     <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">广告位置:</span>&nbsp;</td>
        	<td class="td1">
        		<select name="ad_id" id="ad_id"> 
        			<option value="">请选择</option>
        			{foreach name=list item=item from=$list}
        			<option value="{$item['ad_id']}">{$item['ad_name']}</option>
        			{/foreach}
        		</select>
        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">广告标题:</span>&nbsp;</td>
        	<td class="td1">
        	<input type="text" name="d_title" id="d_title" value="{$map['d_title']}" />&nbsp;
        	<span class="left_txt">* 例如：双11促销活动</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">广告图片:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="d_pic" id="d_pic" value="{$map['d_pic']}" />
        		<input type="button" value="添加" id="photo1"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">广告链接:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="d_url" id="d_url" value="{$map['d_url']}" />&nbsp;
        		<span class="left_txt">* 例如：detail_4.html(官方域名可以省略)</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">绑定商品:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="product_id" id="product_id" value="{$map['product_id']}" />&nbsp;
        		<span class="left_txt"></span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">开始时间:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="d_time1" id="d_time1" value="{$map['d_time1']}" />&nbsp;
        		<span class="left_txt">* 例如：2015-12-28 13:00</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">结束时间:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="d_time2" id="d_time2" value="{$map['d_time2']}" />&nbsp;
        		<span class="left_txt">* 例如：2015-12-30 12:59</span>
        	</td>
        </tr>
        
        <tr>
        	<td>&nbsp;</td>
        	<td>&nbsp;
        		{if $map['d_id']>0}
        		<input type="hidden" name="operator" value="edit"/>
        		{else}
        		<input type="hidden" name="operator" value="create"/>
        		{/if}
        		<input type="hidden" name="d_id" value="{$map['d_id']}"/>
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
		var ad_id = document.getElementById("ad_id").value;
		var d_title = document.getElementById("d_title").value;
		var d_pic = document.getElementById("d_pic").value;
		var d_url = document.getElementById("d_pic").value;
		
		if(ad_id.length==0){
			alert("请选择广告位置");
			return false;
		}else if(d_title.length==0){
			alert("请输入广告标题");
			return false;
		}else if(d_pic.length==0){
			alert("请输入广告图片");
			return false;
		}else if(d_url.length==0){
			alert("请输入广告链接");
			return false;
		}else{
			return true;
		}	
    }
    </script>
    {/literal}
  </body>
</html>


