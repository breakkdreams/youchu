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
            <li class="active">文章列表</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='ad_create.php';"><i class="icon-plus"></i>添加广告</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>广告位置</th>
          <th>广告标题</th>
          <th>开始时间</th>
          <th>结束时间</th>
          <th>照片</th>
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
          <td>{$item['ad_name']}</td>
          <td>{$item['d_title']}</td>
          <td>{$item['d_time1']|date_format:"%Y-%m-%d %H:%M"}</td>
          <td>{$item['d_time2']|date_format:"%Y-%m-%d %H:%M"}</td>
          <td>{if $item['d_pic'] eq ''}<span style="color:#eee7e7">查看</span>{else}<a href="../{$item['d_pic']}" target="_blank">查看</a>{/if}</td>
          <td>
              <a href="ad_create.php?id={$item['d_id']}" title="编辑"><i class="icon-pencil"></i></a>
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


