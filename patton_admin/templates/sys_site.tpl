<!DOCTYPE html>
<html lang="en">
  <head>
    {include file="head.tpl"}
    <link rel="stylesheet" type="text/css" href="../css/tag.css">
    <script language="javascript">
		 function woaicssq(num){
			 for(var id = 1;id<=5;id++)
			 {
				 var MrJin="woaicss_con"+id;

				 if(id==num)
				 	document.getElementById(MrJin).style.display="block";
				 else
					 document.getElementById(MrJin).style.display="none";
			 }
		 }
	</script>
	<script type="text/javascript" charset="utf-8" src="ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
    {literal}
    <style type="text/css">
		.input1{height:28px;line-height:28px;width:400px;}
	</style>
	
	{/literal}
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
            <li class="active">站点信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div class="woaicss">
 <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
 <ul class="woaicss_title woaicss_title_bg1" id="woaicsstitle">
  <li><input type="button" value="商城信息" onclick="woaicssq(1)" style="width:100px"></input></li>
  <li><input type="button" value="企业信息" onclick="woaicssq(2)" style="width:100px"></input></li>
  <li><input type="button" value="企业简介" onclick="woaicssq(3)" style="width:100px"></input></li>
 </ul>
<div id="woaicss_con1" style="display:block;">
 
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">网站名称:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="b_website" id="b_website" value="{$map['b_website']}" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：生鲜网</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:125px;" class="td1"><span class="td1_bt">网站标题:</span>&nbsp;</td>
        	<td class="td1">
        	<input type="text" name="b_title" id="b_title" value="{$map['b_title']}" class="input1"/>&nbsp;
        	<span class="left_txt">* 例如：生鲜网-水果网购首选品牌，水果，我们只挑有来头的！</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">网站关键字:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="b_keyword" id="b_keyword" value="{$map['b_keyword']}" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：奇异果,苹果,橙,火龙果,葡萄,瓜,石榴,李子</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">网站描述:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="b_describe" id="b_describe" value="{$map['b_describe']}" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：官方网站提供水果生鲜、果篮、干果零食等优质食品网购服务,2014年车厘子销量全网第一..</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">网站域名:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="b_www" id="b_www" value="{$map['b_www']}" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：www.sxking.com</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">备案号:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="b_number" id="b_number" value="{$map['b_number']}" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：浙ICP备15028403号</span>
        	</td>
        </tr>
	</table>
 </div>
 <div id="woaicss_con2" style="display:none;">
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">公司名称:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="b_company" id="b_company" value="{$map['b_company']}" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：平湖市爱购电子商务有限公司</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" style="width:125px;" class="td1"><span class="td1_bt">联系地址:</span>&nbsp;</td>
        	<td class="td1">
        	<input type="text" name="b_address" id="b_address" value="{$map['b_address']}" class="input1"/>&nbsp;
        	<span class="left_txt">* 例如：平湖市当湖街道广福园38幢</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">联系电话:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="b_tel" id="b_tel" value="{$map['b_tel']}" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：400-8888-8888</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">传真号码:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="b_describe" id="b_describe" value="{$map['b_describe']}" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：0573-83996688</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">Email:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="b_email" id="b_email" value="{$map['b_email']}" class="input1"/>&nbsp;
        		<span class="left_txt">* 例如：service@sxking.com</span>
        	</td>
        </tr>
   </table>
 </div>
 <div id="woaicss_con3" style="display:none;">
   <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
        <tr>
        	<td align="right" style="width:25px;" class="td1">
        		<div id="d_content" style="display:none">{$map['b_info']}</div>
        	</td>
        	<td class="td1">
        		<script id="editor" type="text/plain" style="min-width:700px;max-width:800px;height:500px;">{$map['b_info']}</script>
        		<input type="hidden" name="b_info" id="b_info"/>
        		<input type="hidden" name="cmd" value="create"/>
        		<input type="hidden" name="b_id" id="b_id" value="{$map['b_id']}"/>
			</td>
        </tr>
        </table>
 </div>
 <br></br>
 <center><input type="submit" value="保存" style="width:100px;"/>&nbsp;<span style="font-size:13px;color:Red">*请在填写完毕再保存</span></center>
 </form>
</div>
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
    <script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }

    function check(){
		var b_website = document.getElementById("b_website").value;

		if(b_website.length==0){
			alert("请输入网站名称");
			return false;
		}else{
			document.getElementById("b_info").value=UE.getEditor('editor').getContent();
			return true;
		}	
    }
    </script>
    {/literal}
  </body>
</html>


