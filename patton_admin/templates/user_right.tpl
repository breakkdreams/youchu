<!DOCTYPE html>
<html lang="en">
  <head>
    {include file="head.tpl"}
    <link rel="stylesheet" type="text/css" href="../css/tag.css">
    <script language="javascript">
		 function woaicssq(num){
			 for(var id = 1;id<=5;id++)
			 {
				 var MrJin="woaicss_con"+id;

				 if(id==num)
				 	document.getElementById(MrJin).style.display="block";
				 else
					 document.getElementById(MrJin).style.display="none";
			 }
		 }
	</script>
	<script type="text/javascript" charset="utf-8" src="ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
    {literal}
    <style type="text/css">
		.input1{height:28px;line-height:28px;width:400px;}
		.checkbox1{width:88px;}
		.checkbox2{margin-bottom: 5px;}
	</style>
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
			
			document.id('start').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=product_pic', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('logo2').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=product_logo2', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('logo3').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=product_logo3', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('logo4').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=product_logo4', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('logo5').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=product_logo5', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
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
            <li class="active">权限管理</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='user_list.php';"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div class="woaicss">
 <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
 <ul class="woaicss_title woaicss_title_bg1" id="woaicsstitle">
  <li><input type="button" value="菜单权限" onclick="woaicssq(1)" style="width:100px"></input></li>
  <li><input type="button" value="产品权限" onclick="woaicssq(2)" style="width:100px"></input></li>
 </ul>
 <div id="woaicss_con1" style="display:block;">
 
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">管理员账号:</span>&nbsp;</td>
        	<td class="td1">
        		{$mgr_map['u_name']}-{$mgr_map['u_username']}
        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:125px;" class="td1"><span class="td1_bt"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"商品性质"!==false}checked="checked"{/if} value="商品性质"/>商品性质:</span>&nbsp;</td>
        	<td class="td1">
        		<table style="font-size: 14px;line-height: 22px;">
        			<tr>
        				<td style="width:20px;"></td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"商品品牌"!==false}checked="checked"{/if} value="商品品牌"/> 商品品牌</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"商品栏目"!==false}checked="checked"{/if} value="商品栏目"/> 商品栏目</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"商品类型"!==false}checked="checked"{/if} value="商品类型"/> 商品类型</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"SKU管理"!==false}checked="checked"{/if} value="SKU管理"/> SKU管理</td>
        				<td></td>
        			</tr>
        		</table>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"商品管理"!==false}checked="checked"{/if} value="商品管理"/>商品管理:</span>&nbsp;</td>
        	<td class="td1">
        		<table style="font-size: 14px;line-height: 22px;">
        			<tr>
        				<td style="width:20px;"></td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"添加商品"!==false}checked="checked"{/if} value="添加商品"/> 添加商品</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"在售商品"!==false}checked="checked"{/if} value="在售商品"/> 在售商品</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"下架商品"!==false}checked="checked"{/if} value="下架商品"/> 下架商品</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"促销商品"!==false}checked="checked"{/if} value="促销商品"/> 促销商品</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"回收站"!==false}checked="checked"{/if} value="回收站"/> 回收站</td>
        				<td></td>
        			</tr>
        		</table> 
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"会员管理"!==false}checked="checked"{/if} value="会员管理"/>会员管理:</span>&nbsp;</td>
        	<td class="td1">
        		<table style="font-size: 14px;line-height: 22px;">
        			<tr>
        				<td style="width:20px;"></td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"会员列表"!==false}checked="checked"{/if} value="会员列表"/> 会员列表</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"会员等级"!==false}checked="checked"{/if} value="会员等级"/> 会员等级</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"会员分组"!==false}checked="checked"{/if} value="会员分组"/> 会员分组</td>
        				<td></td>
        			</tr>
        		</table> 
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"订单管理"!==false}checked="checked"{/if} value="订单管理"/>订单管理:</span>&nbsp;</td>
        	<td class="td1">
        		<table style="font-size: 14px;line-height: 22px;">
        			<tr>
        				<td style="width:20px;"></td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"待支付"!==false}checked="checked"{/if} value="待支付"/> 待支付</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"待发货"!==false}checked="checked"{/if} value="待发货"/> 待发货</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"已发货"!==false}checked="checked"{/if} value="已发货"/> 已发货</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"已完成"!==false}checked="checked"{/if} value="已完成"/> 已完成</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"申请退货"!==false}checked="checked"{/if} value="申请退货"/> 申请退货</td>
        				<td></td>
        			</tr>
        		</table> 
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"促销活动"!==false}checked="checked"{/if} value="促销活动"/>促销活动:</span>&nbsp;</td>
        	<td class="td1">
        		<table style="font-size: 14px;line-height: 22px;">
        			<tr>
        				<td style="width:20px;"></td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"单品促销"!==false}checked="checked"{/if} value="单品促销"/> 单品促销</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"买送促销"!==false}checked="checked"{/if} value="买送促销"/> 买送促销 </td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"赠品促销"!==false}checked="checked"{/if} value="赠品促销"/> 赠品促销</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"套装促销"!==false}checked="checked"{/if} value="套装促销"/> 套装促销</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"满减促销"!==false}checked="checked"{/if} value="满减促销"/> 满减促销</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"活动专题"!==false}checked="checked"{/if} value="活动专题"/> 活动专题</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"优惠券"!==false}checked="checked"{/if} value="优惠券"/> 优惠券</td>
        				<td></td>
        			</tr>
        		</table> 
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"商品咨询"!==false}checked="checked"{/if} value="商品咨询"/>商品咨询:</span>&nbsp;</td>
        	<td class="td1">
        		<table style="font-size: 14px;line-height: 22px;">
        			<tr>
        				<td style="width:20px;"></td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"商品评价"!==false}checked="checked"{/if} value="商品评价"/> 商品评价</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"商品咨询"!==false}checked="checked"{/if} value="商品咨询"/> 商品咨询</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"咨询类型"!==false}checked="checked"{/if} value="咨询类型"/> 咨询类型</td>
        				<td></td>
        			</tr>
        		</table>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"文章管理"!==false}checked="checked"{/if} value="文章管理"/>文章管理:</span>&nbsp;</td>
        	<td class="td1">
        		<table style="font-size: 14px;line-height: 22px;">
        			<tr>
        				<td style="width:20px;"></td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"文章类型"!==false}checked="checked"{/if} value="文章类型"/> 文章类型</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"发布文章"!==false}checked="checked"{/if} value="发布文章"/> 发布文章</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"文章列表"!==false}checked="checked"{/if} value="文章列表"/> 文章列表</td>
        				<td></td>
        			</tr>
        		</table>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"广告管理"!==false}checked="checked"{/if} value="广告管理"/>广告管理:</span>&nbsp;</td>
        	<td class="td1">
        		<table style="font-size: 14px;line-height: 22px;">
        			<tr>
        				<td style="width:20px;"></td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"广告位置"!==false}checked="checked"{/if} value="广告位置"/> 广告位置</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"发布广告"!==false}checked="checked"{/if} value="发布广告"/> 发布广告</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"广告列表"!==false}checked="checked"{/if} value="广告列表"/> 广告列表</td>
        				<td></td>
        			</tr>
        		</table>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"商城管理"!==false}checked="checked"{/if} value="商城管理"/>商城管理:</span>&nbsp;</td>
        	<td class="td1">
        		<table style="font-size: 14px;line-height: 22px;">
        			<tr>
        				<td style="width:20px;"></td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"导航菜单"!==false}checked="checked"{/if} value="导航菜单"/> 导航菜单</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"配送范围"!==false}checked="checked"{/if} value="配送范围"/> 配送范围</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"管理员账号"!==false}checked="checked"{/if} value="管理员账号"/> 管理员账号</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"友情链接"!==false}checked="checked"{/if} value="友情链接"/> 友情链接</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"商家管理"!==false}checked="checked"{/if} value="商家管理"/> 商家管理</td>
        				<td></td>
        			</tr>
        		</table> 
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"报表统计"!==false}checked="checked"{/if} value="报表统计"/>报表统计:</span>&nbsp;</td>
        	<td class="td1">
        		<table style="font-size: 14px;line-height: 22px;">
        			<tr>
        				<td style="width:20px;"></td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"在线用户"!==false}checked="checked"{/if} value="在线用户"/> 在线用户</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"搜索分析"!==false}checked="checked"{/if} value="搜索分析"/> 搜索分析 </td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"商品统计"!==false}checked="checked"{/if} value="商品统计"/> 商品统计</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"销售明细"!==false}checked="checked"{/if} value="销售明细"/> 销售明细</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"订单统计"!==false}checked="checked"{/if} value="订单统计"/> 订单统计</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"地区统计"!==false}checked="checked"{/if} value="地区统计"/> 地区统计</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"客户端统计"!==false}checked="checked"{/if} value="客户端统计"/> 客户端统计</td>
        				<td></td>
        			</tr>
        		</table> 
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"支付接口"!==false}checked="checked"{/if} value="支付接口"/>支付接口:</span>&nbsp;</td>
        	<td class="td1">
        		<table style="font-size: 14px;line-height: 22px;">
        			<tr>
        				<td style="width:20px;"></td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"支付宝"!==false}checked="checked"{/if} value="支付宝"/> 支付宝</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"微信支付"!==false}checked="checked"{/if} value="微信支付"/> 微信支付</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"网银在线"!==false}checked="checked"{/if} value="网银在线"/> 网银在线</td>
        				<td></td>
        			</tr>
        		</table>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"系统设置"!==false}checked="checked"{/if} value="系统设置"/>系统设置:</span>&nbsp;</td>
        	<td class="td1">
        		<table style="font-size: 14px;line-height: 22px;">
        			<tr>
        				<td style="width:20px;"></td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"站点信息"!==false}checked="checked"{/if} value="站点信息"/> 站点信息</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"邮箱设置"!==false}checked="checked"{/if} value="邮箱设置"/> 邮箱设置</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"短信设置"!==false}checked="checked"{/if} value="短信设置"/> 短信设置</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"积分设置"!==false}checked="checked"{/if} value="积分设置"/> 积分设置</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"性能设置"!==false}checked="checked"{/if} value="性能设置"/> 性能设置</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"禁止IP"!==false}checked="checked"{/if} value="禁止IP"/> 禁止IP</td>
        				<td class="checkbox1"><input type="checkbox" name="r_item[]" style="margin-bottom: 5px;" {if $map['r_menu']|strpos:"热门搜索"!==false}checked="checked"{/if} value="热门搜索"/> 热门搜索</td>
        				<td></td>
        			</tr>
        		</table> 
        	</td>
        </tr>
	</table>
 </div>
 <div id="woaicss_con2" style="display:none;">
  <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        {foreach name=list item=item from=$menu}
   		{if $item['m_size'] eq '1'}
        <tr>
        	<td align="right" style="width:125px;"><span class="td1_bt"><input type="checkbox" name="r_product[]" style="margin-bottom: 5px;" {if $map['r_product']|strpos:{$item['m_name']}!==false}checked="checked"{/if} value="{$item['m_name']}"/>{$item['m_name']}:</span>&nbsp;</td>
        	<td class="td1">
        		<table style="font-size: 14px;line-height: 22px;">
        			<tr>
        				<td style="width:20px;"></td>
        				{foreach name=list2 item=item2 from=$menu}
        				{if $item['m_id'] eq $item2['m_fid']}
        				<td class="checkbox1"><input type="checkbox" name="r_product[]" style="margin-bottom: 5px;" {if $map['r_product']|strpos:{$item2['m_name']}!==false}checked="checked"{/if} value="{$item2['m_name']}"/> {$item2['m_name']}</td>
        				{/if}
        				{/foreach}
        				<td></td>
        			</tr>
        		</table> 
        	</td>
        </tr>
        {/if}
        {/foreach}
	</table>
 </div>

 <br></br>
 <input type="hidden" name="u_id" value="{$u_id}"/>
 <input type="hidden" name="cmd" value="right"/>
 <center><input type="submit" value="保存"/></center>
 </form>
</div>
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
		return true;	
    }
    </script>
    {/literal}
    
    {if $cmd eq 'send'}
    <script type="text/javascript">
    	woaicssq(3);
	</script>
    {/if}    
    
</body>
</html>


