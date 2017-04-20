<html>
  <head>
    {include file="head.tpl"}
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
	
	</script>
	{/literal}
    <script type="text/javascript">
    function deleteBrand(id){
    	
		var confirm = new LightFace({
			width: 250,
			title: '确认信息',
		keys: {
			esc: function() { this.close(); box.unfade(); }
		},
			content: '是否确定删除此商品?',
		buttons: [
			{ title: '是', event: function() { window.location="?cmd=delete&id="+id; }, color: 'green' },
			{ title: '否', event: function() { this.close(); box.unfade(); } }
		]
		});
		confirm.open();
	}

	
    </script>
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
            <li class="active">商品品牌</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='product_brand_create.php';"><i class="icon-plus"></i>添加品牌</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>品牌类型</th>
          <th>品牌名称</th>
          <th>服务热线</th>
          <th>负责人</th>
          <th>负责人手机</th>
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
          <td>{$item['brand_type']}</td>
          <td>{$item['brand_name']}</td>
          <td>{$item['brand_phone']}</td>
          <td>{$item['brand_linkman']}</td>
          <td>{$item['brand_mobile']}</td>
          <td>
              <a href="product_brand_create.php?id={$item['brand_id']}" title="编辑"><i class="icon-pencil"></i></a>
              &nbsp;
              <a href="#myModal" role="button" data-toggle="modal" title="删除" onclick="deleteBrand('{$item['brand_id']}')"><i class="icon-remove"></i></a>
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


