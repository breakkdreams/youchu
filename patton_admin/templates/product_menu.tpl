<!DOCTYPE html>
<html lang="en">
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
    function deleteDetail(id){
    	
		var confirm = new LightFace({
			width: 250,
			title: '确认信息',
		keys: {
			esc: function() { this.close(); box.unfade(); }
		},
			content: '是否确定删除此栏目及附属子栏目?',
		buttons: [
			{ title: '是', event: function() { window.location="?cmd=delete&id="+id; }, color: 'green' },
			{ title: '否', event: function() { this.close(); box.unfade(); } }
		]
		});
		confirm.open();
	}
    </script>
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
            <li class="active">商品栏目</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='product_menu_create.php';"><i class="icon-plus"></i>添加栏目</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>栏目编号</th>
          <th>栏目名称</th>
          <th>封面图</th>
          <th style="width: 150px;">操作</th>
        </tr>
      </thead>
      <tbody>
      	{foreach name=list item=item from=$list}
        <tr>
          <td>{$smarty.foreach.list.iteration}</td>
          <td>{$item['m_id']}</td>
		  <td>|
          {if $item['m_size'] eq 1}---
          {else if $item['m_size'] eq 2}------
          {else if $item['m_size'] eq 3}---------
          {else if $item['m_size'] eq 4}------------
          {else if $item['m_size'] eq 5}---------------
          {else if $item['m_size'] eq 6}------------------
          {/if}
          
          {if $item['m_size'] eq 1}<span style="color:red;font-weight: 700">{$item['m_name']}</span>
          {else if $item['m_size'] eq 2}<span style="font-weight:700">{$item['m_name']}</span>
          {else}{$item['m_name']}
          {/if}
          </td>
          <td>{if $item['m_photo'] eq ''}<span style="color:#eee7e7">查看</span>{else}<a href="../{$item['m_photo']}" target="_blank">查看</a>{/if}</td>
          <td>
          	  <a href="product_menu_create.php?parent_id={$item['m_id']}" title="添加子栏目">添加子栏目</i></a>
          	  &nbsp;
              <a href="product_menu_create.php?id={$item['m_id']}" title="编辑"><i class="icon-pencil"></i></a>
              &nbsp;
              <a href="#" role="button" data-toggle="modal" onclick="deleteDetail('{$item['m_id']}')" title="删除"><i class="icon-remove"></i></a>
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


