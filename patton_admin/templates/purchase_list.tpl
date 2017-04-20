<html>
  <head>
    {include file="head.tpl"}
  </head>
  <body class=""> 
    {include file="navbar.tpl"}
    
    {include file="left.tpl"}
    

    
    <div class="content">
        
        <div class="header">
            <div class="stats"></div>

            <h1 class="page-title">桌面信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li class="active">进货记录 <span class="divider">/</span></li>
            <li>{$map['product_name']}</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    
    <button class="btn btn-primary" onclick="window.location.href='purchase_create.php?product_id={$product_id}';"><i class="icon-plus"></i>添加记录</button>
    	
  <div class="btn-group">
  	
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>进货时间</th>
          <th>进货人</th>
          <th>数量</th>
          <th>单价</th>
          <th>总价</th>
          <th>仓库</th>
          <th>供应商</th>
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
          <td>{$item['pur_time']|date_format:"%Y-%m-%d"}</td>
          <td>{$item['pur_purchaser']}</td>
          <td>{$item['pur_count']}</td>
          <td>{$item['pur_price1']}</td>
          <td>{$item['pur_price2']}</td>
          <td>{$item['pur_warehouse']}</td>
          <td>{$item['pur_supplier']}</td>
          <td>
              <a href="purchase_create.php?id={$item['pur_id']}&product_id={$product_id}" title="编辑">编辑</a>              
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


