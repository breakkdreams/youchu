
<html lang="en">
  <head>
    {include file="head.tpl"}
    <script type="text/javascript" charset="utf-8" src="ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
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
            <li class="active">商品分类</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='product_type.php'"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
     <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">分类名称:</span>&nbsp;</td>
        	<td class="td1">
        	<input type="text" name="v_name" id="v_name" value="{$map['v_name']}" style="height:28px;line-height: 28px;"/>&nbsp;
        	<span class="left_txt">* 例如：电器</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">品牌照片:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="v_photo" id="v_photo" value="{$map['v_photo']}" style="height:28px;line-height: 28px;"/>
        		<input type="button" value="添加" onclick="ShowIframe('添加文件','upload.php?cloum=v_photo',400,150)"/>
        		<span class="left_txt">* 允许上传文件类型为：png / jpg ，文件大小请控制在200kb以内</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">简短描述:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="v_describe" id="v_describe" value="{$map['v_describe']}" style="height:28px;line-height: 28px;width:670px;"/>&nbsp;
        	</td>
        </tr>
        
        <tr>
        	<td>&nbsp;</td>
        	<td>&nbsp;
        		{if $map['v_id']>0}
        		<input type="hidden" name="operator" value="edit"/>
        		{else}
        		<input type="hidden" name="operator" value="create"/>
        		{/if}
        		<input type="hidden" name="v_id" value="{$map['v_id']}"/>
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
		var v_name = document.getElementById("v_name").value;

		if(v_name.length==0){
			alert("请输入分类名称");
			return false;
		}else{
			return true;
		}	
    }
    </script>
    {/literal}
  </body>
</html>


