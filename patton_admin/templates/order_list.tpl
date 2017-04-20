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
            <li class="active">订单列表</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <form action="" method="post">
    <table>
    	<tr>
    		<td><input type="text" name="get_phone" placeholder="请输入收件人手机" style="width:140px;"/></td>
    		<td><input type="text" name="order_code" placeholder="请输入订单编号" style="width:140px;"/></td>
    		<td><button type="submit" class="btn btn-primary" style="margin-bottom: 8px;">查询订单</button></td>
    	</tr>
    </table>
    </form>
    
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>订单编号</th>
          <th>收件人</th>
          <th>电话</th>
          <th>订单金额</th>
          <th>订单状态</th>
          <th>下单时间</th>
          <th style="width: 100px;">操作</th>
        </tr>
      </thead>
      <tbody>
      	{foreach name=list item=item from=$list}
        {if $smarty.foreach.list.iteration%2==0}
        <tr class="my_table_tr">
        {else}
        <tr>
        {/if}
          <td>{$smarty.foreach.list.iteration}</td>
          <td>{$item['order_code']}</td>
          <td>{$item['get_name']}</td>
          <td>{$item['get_phone']}</td>
          <td>￥{$item['order_price']}</td>
          <td>未支付</td>
          <td>{$item['order_time']}</td>
          <td>
              <a href="order_detail.php?id={$item['order_id']}" title="查看明细">查看明细</a>
          </td>
        </tr>
        {/foreach}
      </tbody>
    </table>
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


