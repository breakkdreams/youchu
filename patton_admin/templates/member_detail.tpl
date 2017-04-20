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
            <li class="active">会员信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='member_list.php?type=1';"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div class="woaicss">
 <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
 <ul class="woaicss_title woaicss_title_bg1" id="woaicsstitle">
  <li><input type="button" value="基础信息" onclick="woaicssq(1)" style="width:100px"></input></li>
  <li><input type="button" value="收件信息" onclick="woaicssq(2)" style="width:100px"></input></li>
  <li><input type="button" value="订单信息" onclick="woaicssq(3)" style="width:100px"></input></li>
 </ul>
 <div id="woaicss_con1" style="display:block;">
 
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">会员昵称:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['member_name']}
        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:125px;" class="td1"><span class="td1_bt">登录账号:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['member_login']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">姓名:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['member_realname']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">性别:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['member_sex']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">生日:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['member_birthday']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">邮件地址:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['member_email']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">电话:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['member_tel']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">手机:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['member_phone']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">邮编:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['member_zip']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">地址:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['member_address']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">会员等级:</span>&nbsp;</td>
        	<td class="td1">
        		{if $map['level_logo'] eq ''}{else}<img src="../{$map['level_logo']}" style="height:40px;">{/if}
        	</td>
        </tr>
	</table>
 </div>
 <div id="woaicss_con2" style="display:none;">
   <table class="table" style="margin-left: 25px;">
        <tr>
        	<td>序号</td>
        	<td>收件人</td>
        	<td>手机</td>
        	<td>电话</td>
        	<td>地址</td>
        	<td>标志性建筑</td>
        </tr>
        {foreach name=list item=item from=$address_list}
        {if $smarty.foreach.list.iteration%2==0}
        <tr class="my_table_tr">
        {else}
        <tr>
        {/if}
        	<td>{$smarty.foreach.list.iteration}</td>
        	<td>{$item['a_name']}</td>
        	<td>{$item['a_phone']}</td>
        	<td>{$item['a_tel']}</td>
        	<td>{$item['a_address']}</td>
        	<td>{$item['a_mark']}</td>
        </tr>
        {/foreach}
	</table>
 </div>
 <div id="woaicss_con3" style="display:none;">
   <table class="table" style="margin-left: 25px;">
        <tr>
        	<td>序号</td>
        	<td>订单日期</td>
        	<td>订单总价</td>
        	<td>订单状态</td>
        	<td>发货单号</td>
        	<td>&nbsp;</td>
        </tr>
        {foreach name=list item=item from=$order_list}
        {if $smarty.foreach.list.iteration%2==0}
        <tr class="my_table_tr">
        {else}
        <tr>
        {/if}
        	<td>{$smarty.foreach.list.iteration}</td>
        	<td>{$item['order_time']}</td>
        	<td>{$item['order_price']}</td>
        	<td>
        		{if $item['pay_time'] eq ''}
                	待支付
                {else if $item['order_state'] eq '0'}
					未发货
				{else if $item['order_state'] eq '1'}
					已发货
				{else if $item['order_state'] eq '2'}
					已完成
				{else if $item['order_state'] eq '3'}
					退货中
				{/if}
        	</td>
        	<td>{$item['send_code']}</td>
        	<td><a href="order_detail.php?id={$item['order_id']}">查看详情</a></td>
        </tr>
        {/foreach}
	</table>
 </div>

 <br></br>
 </form>
</div>
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


