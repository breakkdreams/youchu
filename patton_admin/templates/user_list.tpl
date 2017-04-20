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
            <li class="active">管理员列表</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='user_create.php';"><i class="icon-plus"></i>添加账号</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>角色类型</th>
          <th>手机号</th>
          <th>姓名</th>
          <th>最后登录时间</th>
          <th style="width: 150px;">操作</th>
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
			{if $item['u_role'] eq '1'}
			客服
			{else if $item['u_role'] eq '2'}
			售后
			{else if $item['u_role'] eq '3'}
			财务
			{else if $item['u_role'] eq '4'}
			技术
			{else if $item['u_role'] eq '5'}
			仓管
			{else if $item['u_role'] eq '6'}
			市场
			{else if $item['u_role'] eq '7'}
			其他
			{else if $item['u_role'] eq '8'}
			超级管理员
			{/if}          
          </td>
          <td>{$item['u_name']}</td>
          <td>{$item['u_username']}</td>
          <td>{$item['u_lasttime']|date_format:"%Y-%m-%d %H:%M"}</td>
          <td>
          	  <a href="user_right.php?id={$item['u_id']}" title="设置权限">设置权限</a>
              &nbsp;
              <a href="user_create.php?id={$item['u_id']}" title="编辑"><i class="icon-pencil"></i></a>
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


