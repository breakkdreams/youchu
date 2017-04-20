<html>
  <head>
    {include file="head.tpl"}
    <script type="text/javascript">
    function setState(id,checked){
		var page = '{$page}';
		window.location="?cmd=state&id="+id+"&check="+checked+"&page="+page;
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
            <li class="active">商铺管理</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='seller_create.php';"><i class="icon-plus"></i>添加商铺</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>商铺名称</th>
          <th>联系人</th>
          <th>工商许可证</th>
          <th>营业执照</th>
          <th>主营产品</th>
          <th>客服电话</th>
          <th>审核状态</th>
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
          <td>{$item['s_name']}</td>
          <td>{$item['s_manager']}</td>
          <td>{if $item['s_code'] eq ''}<span style="color:#eee7e7">查看</span>{else}<a href="../{$item['s_code']}" target="_blank">查看</a>{/if}</td>
          <td>{if $item['s_license'] eq ''}<span style="color:#eee7e7">查看</span>{else}<a href="../{$item['s_license']}" target="_blank">查看</a>{/if}</td>
          <td>{$item['s_range']}</td>
          <td>{$item['s_400']}</td>
          <td><input type="checkbox" name="" id=""  onclick="setState(this.value,this.checked);" {if $item['s_state'] eq '1'}checked="checked"{/if} value="{$item['s_id']}"/></td>
          <td>
              <a href="seller_create.php?id={$item['s_id']}" title="编辑"><i class="icon-pencil"></i></a>
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


