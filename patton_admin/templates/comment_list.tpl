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
            <li class="active">评论列表</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>评论内容</th>
          <th>评论照片</th>
          <th>评论时间</th>
          <th style="width: 60px;">操作</th>
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
          <td>{$item['comment_content']}</td>
          <td>
          	{if $item['share_pic1'] eq ''}
            {else}<img src="../{$item['share_pic1']}" style="height: 40px;"/>{/if}
            
            {if $item['share_pic2'] eq ''}
            {else}<img src="../{$item['share_pic2']}" style="height: 40px;"/>{/if}
            
            {if $item['share_pic3'] eq ''}
            {else}<img src="../{$item['share_pic3']}" style="height: 40px;"/>{/if}
            
            {if $item['share_pic4'] eq ''}
            {else}<img src="../{$item['share_pic4']}" style="height: 40px;"/>{/if}
            
            {if $item['share_pic5'] eq ''}
            {else}<img src="../{$item['share_pic5']}" style="height: 40px;"/>{/if}
          </td>
          <td>{$item['comment_date']|date_format:"%Y-%m-%d"}</td>
          <td>
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


