<!DOCTYPE html>
<html lang="en">
  <head>
    {include file="head.tpl"}
    <script type="text/javascript" charset="utf-8" src="ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
    {literal}
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
	<script><!--
		window.addEvent('domready',function(){
			
			document.id('photo1').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=s_license', title: '封面图上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('b1').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=s_logo', title: '图片上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('b2').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=s_banner', title: '图片上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('b3').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=brand_b3', title: '图片上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
			document.id('b4').addEvent('click',function() {
				light = new LightFace.IFrame({ height:120, width:360, url: 'upload.php?cloum=brand_b4', title: '图片上传' }).addButton('关闭', function() { light.close(); },true).open();
			});
		});
		function leve2(id){
			var list2 = $("#list_2").val();
			var obj = eval(list2);
			size = obj.length;
			content="";
			  for(var i =0;i<size;i++){
				  if(id == obj[i].PARENT_ID){
					  document.getElementById("cities").style.display="";
					  document.getElementById("areas").style.display="none";
					  document.getElementById("area").value="";
					  content = content+"<option id=\""+obj[i].REGION_ID+"\" onclick=\"leve3("+obj[i].REGION_ID+")\" value=\""+obj[i].REGION_NAME+"\">"+obj[i].REGION_NAME+"</option> ";
					  document.getElementById("city").innerHTML = content;
				  }
			}
		}
		
		function leve3(id){
			var list3 = $("#list_3").val();
			var obj = eval(list3);
			size = obj.length;
			content="";
			  for(var i =0;i<size;i++){
				  if(id == obj[i].PARENT_ID){
					  document.getElementById("areas").style.display="";
					  content = content+"<option  id=\""+obj[i].REGION_ID+"\" value=\""+obj[i].REGION_ID+"\">"+obj[i].REGION_NAME+"</option> ";
					  document.getElementById("area").innerHTML = content;
				  }
			}
		}
		function load(){
			var select = document.getElementById("province");  
			var select2 = document.getElementById("city");  
			var select3 = document.getElementById("area");  
		    var nextYear = $("#province_select").val();  
		    var nextYear2 = $("#city_select").val();  
		    var nextYear3 = $("#area_select").val();  
//		    alert(nextYear.length);
		    if(nextYear.length<1){
		    	nextYear="浙江省";
		    	nextYear2="嘉兴市";
		    	nextYear3="平湖市";
    		}
		     
		    for(var i=0; i<select.options.length; i++){  
		        if(select.options[i].innerHTML == nextYear){  
		            select.options[i].selected = true;  
		            break;  
		        }  
		    }  
		    leve2($("#province option:selected").attr("id"));
		    for(var i=0; i<select2.options.length; i++){  
		        if(select2.options[i].innerHTML == nextYear2){  
		            select2.options[i].selected = true;  
		            break;  
		        }  
		    } 
		     
		    leve3($("#city option:selected").attr("id"));
		    for(var i=0; i<select3.options.length; i++){  
		        if(select3.options[i].innerHTML == nextYear3){  
		            select3.options[i].selected = true;  
		            break;  
		        }  
		    }  
		}
		
	--></script>
	
	{/literal}
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""  onload="load()"> 
  <!--<![endif]-->
    {include file="navbar.tpl"}
    
    {include file="left.tpl"}
    
    <input type="hidden" value='{$list1}' id="list_1">
    <input type="hidden" value='{$list2}' id="list_2">
    <input type="hidden" value='{$list3}' id="list_3">
    <input type="hidden" value="{$city['REGION_NAME']}" id="city_select">
    <input type="hidden" value="{$area['REGION_NAME']}" id="area_select">
	<input	type="hidden" value="{$province['REGION_NAME']}" id="province_select"><div class="content">
        
        <div class="header">
            <div class="stats"></div>

            <h1 class="page-title">桌面信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li class="active">商家信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='seller_list.php'"><i class="icon-plus"></i>返回列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <form method="post" action="?" onsubmit="return check();" style="margin: 0px;">
     <table cellpadding="0" cellspacing="0" style="width:100%;line-height: 35px;font-size:14px;" border="0">
     <tr>
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">省:</span>&nbsp;</td>
        	<td class="td1">
        	<select id="province" name="province">
        	      {foreach name=list item=item from=$list}
                     <option  id="{$item['REGION_ID']}" onclick="leve2({$item['REGION_ID']})" value="{$item['REGION_NAME']}">{$item['REGION_NAME']}</option>
                  {/foreach}
                  
        	</select>
        	</td>
        </tr>
        <tr id="cities" style="display: none">
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">市:</span>&nbsp;</td>
        	<td class="td1">
        	<select id="city" name="city">
        	</select>
        	</td>
        </tr>
        <tr id="areas" style="display: none">
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">区:</span>&nbsp;</td>
        	<td class="td1">
        	<select id="area" name="area">
        	</select>
        	</td>
        </tr>
    
        <tr>
        	<td align="right" style="width:128px;" class="td1"><span class="td1_bt">商铺名称:</span>&nbsp;</td>
        	<td class="td1">
        	<input type="text" name="s_name" id="s_name" value="{$map['s_name']}" />&nbsp;
        	<span class="left_txt">* 例如：苹果专卖</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">商铺负责人:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_manager" id="s_manager" value="{$map['s_manager']}" />&nbsp;
        		<span class="left_txt">* 例如：张三</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">身份证:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_idcard" id="s_idcard" value="{$map['s_idcard']}" />&nbsp;
        		<span class="left_txt">* 例如：330402196710100935</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">商铺客服电话:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_400" id="s_400" value="{$map['s_400']}" />&nbsp;
        		<span class="left_txt">* 例如：400-8888-8888</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">商铺地址:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_address" id="s_address" value="{$map['s_address']}" />&nbsp;
        		<span class="left_txt">* 例如：嘉兴市城南路1433号</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">工商注册号:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_code" id="s_code" value="{$map['s_code']}" />&nbsp;
        		<span class="left_txt">* 例如：13588888888</span>
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">是否审核:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="radio" name="s_state" value="1" {if $map['s_state'] eq '1'}checked="checked"{/if} />&nbsp;审核 &nbsp;&nbsp;&nbsp;&nbsp;
        		<input type="radio" name="s_state" value="0" {if $map['s_state'] eq '0'}checked="checked"{/if} />&nbsp;未审核
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">营业执照:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_license" id="s_license" value="{$map['s_license']}" />
        		<input type="button" value="添加" id="photo1"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">LOGO:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_logo" id="s_logo" value="{$map['s_logo']}" />
        		<input type="button" value="添加" id="b1"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">店铺招牌:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_banner" id="s_banner" value="{$map['s_banner']}" />
        		<input type="button" value="添加" id="b2"/>
        		
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">官方网址:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_www" id="s_www" value="{$map['s_www']}" style="width:670px;"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">客服QQ:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_qq" id="s_qq" value="{$map['s_qq']}" style="width:670px;"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">客服旺旺:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_ww" id="s_ww" value="{$map['s_ww']}" style="width:670px;"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">经营范围:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_range" id="s_range" value="{$map['s_range']}" style="width:670px;"/>&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">申请联系人:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_applyer" id="s_applyer" value="{$map['s_applyer']}" style="width:670px;" />&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">申请时间:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_applydate" id="s_applydate" value="{$map['s_applydate']}" style="width:670px;" />&nbsp;
        	</td>
        </tr>
        <tr>
        	<td align="right" class="td1"><span class="td1_bt">申请人电话:</span>&nbsp;</td>
        	<td class="td1">
        		<input type="text" name="s_apperphone" id="s_apperphone" value="{$map['s_apperphone']}" style="width:670px;" />&nbsp;
        	</td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
        	<td>&nbsp;
        		{if $map['s_id']>0}
        		<input type="hidden" name="operator" value="edit"/>
        		{else}
        		<input type="hidden" name="operator" value="create"/>
        		{/if}
        		<input type="hidden" name="s_id" value="{$map['s_id']}"/>
        		<input type="submit" name="" value="保存" />
        	</td>
        </tr>
        </table>
        </form>
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


    function check(){
		var brand_name = document.getElementById("brand_name").value;

		if(brand_name.length==0){
			alert("请输入品牌名称");
			return false;
		}else{
			document.getElementById("brand_info").value=UE.getEditor('editor').getContent();
			return true;
		}	
    }
    </script>
    {/literal}
  </body>
</html>


