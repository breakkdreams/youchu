<!DOCTYPE html>
<html lang="en">
  <head>
    {include file="head.tpl"}   
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
            <li class="active">进货记录</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='purchase_list.php?product_id={$product['product_id']}';"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
     <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">商品名称:</span>&nbsp;</td>
        	<td class="td1">
        	<input type="text" name="product_name" id="product_name" readonly="readonly" value="{$product['product_name']}" />&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">进货人:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="pur_purchaser" id="pur_purchaser" value="{$map['pur_purchaser']}" />&nbsp;
        		<span class="left_txt">* 例如：张三</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">进货时间:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="pur_time" id="pur_time" value="{$map['pur_time']}" />&nbsp;
        		<span class="left_txt">* 例如：2016-01-01</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">进货数量:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="pur_count" id="pur_count" value="{$map['pur_count']}" />&nbsp;
        		<span class="left_txt">* 例如：200</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">商品单价:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="pur_price1" id="pur_price1" value="{$map['pur_price1']}" />&nbsp;
        		<span class="left_txt">* 例如：16.5</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">进货总价:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="pur_price2" id="pur_price2" value="{$map['pur_price2']}" />&nbsp;
        		<span class="left_txt">* 例如：2000</span>
        	</td>
        </tr>
       
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">供应商:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="pur_supplier" id="pur_supplier" value="{$map['pur_supplier']}"/>&nbsp;
        		<span class="left_txt">* 例如：嘉兴巴顿</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">仓库:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="pur_warehouse" id="pur_warehouse" value="{$map['pur_warehouse']}"/>&nbsp;
        	</td>
        </tr>
        
        <tr>
        	<td>&nbsp;</td>
        	<td>&nbsp;
        		{if $map['pur_id']>0}
        		<input type="hidden" name="operator" value="edit"/>
        		{else}
        		<input type="hidden" name="operator" value="create"/>
        		{/if}
        		<input type="hidden" name="pur_id" value="{$map['pur_id']}"/>
        		<input type="hidden" name="product_id" value="{$product['product_id']}"/>
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
		var pur_purchaser = document.getElementById("pur_purchaser").value;

		if(pur_purchaser.length==0){
			alert("请输入进货人");
			return false;
		}else{
			return true;
		}	
    }
    </script>
    {/literal}
  </body>
</html>


