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
            <li class="active">文章列表</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='product_list.php?type=1';"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div class="woaicss">
 <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
 <ul class="woaicss_title woaicss_title_bg1" id="woaicsstitle">
  <li><input type="button" value="基础信息" onclick="woaicssq(1)" style="width:100px"></input></li>
  <li><input type="button" value="收件信息" onclick="woaicssq(2)" style="width:100px"></input></li>
  <li><input type="button" value="发货信息" onclick="woaicssq(3)" style="width:100px"></input></li>
  <li><input type="button" value="商品信息" onclick="woaicssq(4)" style="width:100px"></input></li>
 </ul>
 <div id="woaicss_con1" style="display:block;">
 
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">订单编号:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['order_code']}
        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:125px;" class="td1"><span class="td1_bt">订单状态:</span>&nbsp;</td>
        	<td class="td1">
        		{if $map['pay_time'] eq ''}
                	待支付
                {else if $map['order_state'] eq '0'}
					未发货
				{else if $map['order_state'] eq '1'}
					已发货
				{else if $map['order_state'] eq '2'}
					已完成
				{else if $map['order_state'] eq '3'}
					退货中
				{/if}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">会员:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['member_name']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">下单时间:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['order_time']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">支付方式:</span>&nbsp;</td>
        	<td class="td1">
        		{if $map['pay_type'] eq ''}
        		<font style="color: red">未支付</font>
        		{else}
        		{$map['pay_type']}
        		{/if}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">付款时间:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['pay_time']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">发票抬头:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['order_fp']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">订单总价:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['order_price']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">货物总价:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['product_price']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">物流价格:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['send_price']}
        	</td>
        </tr>
	</table>
 </div>
 <div id="woaicss_con2" style="display:none;">
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">收件人:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['get_name']}
        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:125px;" class="td1"><span class="td1_bt">收件地址:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['get_address']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">收件人电话:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['get_tel']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">收件人手机:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['get_phone']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">收件人邮编:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['get_zip']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">标志性建筑物:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['get_building']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">留言内容:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['order_message']}
        	</td>
        </tr>
	</table>
 </div>
 <div id="woaicss_con3" style="display:none;">
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" style="width:125px;" class="td1"><span class="td1_bt">配送方式:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="radio" name="send_type" value="上门自提" {if $map['send_type'] eq '上门自提'}checked="checked"{/if} style="margin-bottom: 5px;"/>&nbsp;上门自提 &nbsp;&nbsp; &nbsp;&nbsp;
        		<input type="radio" name="send_type" value="物流配送" {if $map['send_type'] eq '物流配送'}checked="checked"{/if} style="margin-bottom: 5px;"/>&nbsp;物流配送 &nbsp;&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:125px;" class="td1"><span class="td1_bt">物流公司:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="send_company" id="send_company" value="{$map['send_company']|default:"申通快递"}" /> &nbsp;
        		<span class="left_txt">* 例如：申通快递</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">物流单号:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="send_code" id="send_code" value="{$map['send_code']}" /> &nbsp;
        		<span class="left_txt">* 例如：400000123123123</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">发货时间:</span>&nbsp;</td>
        	<td class="td1">
        		{$map['send_time']}
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"></td>
        	<td class="td1">
        		<input type="hidden" name="cmd" value="dosend"/>
        		<input type="hidden" name="order_id" value="{$map['order_id']}"/>
        		<input type="submit" value="保存" style="width:100px;"/>
        	</td>
        </tr>
   </table>
   
 </div>
 <div id="woaicss_con4" style="display:none;">
	<table class="table" style="margin-left: 25px;">
        <tr>
        	<td>序号</td>
        	<td>图片</td>
        	<td>商品名称</td>
        	<td>单价</td>
        	<td>购买数量</td>
        	<td>合计</td>
        </tr>
        {foreach name=list item=item from=$list}
        {if $smarty.foreach.list.iteration%2==0}
        <tr class="my_table_tr">
        {else}
        <tr>
        {/if}
        	<td>{$smarty.foreach.list.iteration}</td>
        	<td><img src="../{$item['product_pic']}"  title="{$item['product_name']}" style="height:40px;"/></td>
        	<td>{$item['product_name']}</td>
        	<td>{$item['product_price1']}</td>
        	<td>{$item['product_acount']}</td>
        	<td>{$item['product_price2']}</td>
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
    <script type="text/javascript">

    function check(){
		var send_code = document.getElementById("send_code").value;

		if(send_code.length==0){
			alert("请输入物流单号");
			return false;
		}else{
			return true;
		}	
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


