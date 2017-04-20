<html>
  <head>
    {include file="head.tpl"}
    <script type="text/javascript">
    function setDisplay(id,checked){
		var page = '{$page}';
		window.location="?cmd=display&id="+id+"&check="+checked+"&page="+page;
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
            <li class="active">友情链接</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='link_create.php';"><i class="icon-plus"></i>添加链接</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>链接图片</th>
          <th>链接名称</th>
          <th>链接排序</th>
          <th>首页显示</th>
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
          <td>
          	{if $item['u_photo'] eq ''}
          	
          	{else}
          		<img src="../{$item['u_photo']}" style="height:40px;"></img>
          	{/if}
          </td>
          <td><a href="http://{$item['u_link']}" target="_blank">{$item['u_name']}</a></td>
          <td>{$item['u_order']}</td>
          <td><input type="checkbox" name="" id=""  onclick="setDisplay(this.value,this.checked);" {if $item['u_display'] eq '1'}checked="checked"{/if} value="{$item['u_id']}"/></td>
          <td>
              <a href="link_create.php?id={$item['u_id']}" title="编辑"><i class="icon-pencil"></i></a>
              &nbsp;
              <a href="#myModal" role="button" data-toggle="modal" title="删除"><i class="icon-remove"></i></a>
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


