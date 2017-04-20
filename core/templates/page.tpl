<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include file="header.tpl"}
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/color.css" rel="stylesheet" type="text/css" />
<link href="css/link.css" rel="stylesheet" type="text/css" />
<link href="css/lrtk.css" rel="stylesheet" type="text/css" />

<script src="js/jquery-1.2.6.pack.js" type=text/javascript></script>
<script src="js/base.js" type=text/javascript></script>

<script type="text/javascript" src="js/js.js"></script>
<script>
	//产品销售单价
	var _price = '{$price1}';
	//购买总价
	var _total_price = '{$price1}';
	//购买的数量
	var _acount ='{$init}';
	//细分类ID
	var t_id =(''=='{$productitem[0][0]}')?0:'{$productitem[0][0]}';
		
	function changelogo(pic){
		document.getElementById("product_logo").src=pic;
	}

	//计算购物车总价
	function checkInt(id, value) {
	    /*//如果为空，则通过校验 
	    if (value == "")
	        return true;*/

	    if (/^(\d+)$/.test(value)&&value!=0) {
                
	    	_total_price = (value*1*_price);
	    	
	    	document.getElementById("total_price").innerHTML="￥"+_total_price;

	    	_acount = value;
	    	
	        return true;
	    } else {
	        alert("该输入正确数量");
	        if (document.getElementById(id) != null) {
	            document.getElementById(id).focus();
	        }
	        return false;
	    }
	}

	function gotobuy(){
		var value=$("#buy_num").val();
		if(checkInt(t_id, value)){
		    window.location="shop_do.php?act=buy&session_id=19821222i19830219_{$id}"+"&tid="+t_id+"&acount="+_acount;
		}
	}

	function addcart(){
		var value=$("#buy_num").val();
		if(checkInt(t_id, value)){
		    window.location="shop_do.php?act=addcart&session_id=19821222i19830219_{$id}"+"&tid="+t_id+"&acount="+_acount;
		}
	}
	/*function setType(obj){
		//obj.setAttribute('class', 'on ');
		var idandamout=obj.id.split(',');
		var itemarr=document.getElementsByName('itemtype');
		for(var i=0;i<itemarr.length;i++){
			itemarr[i].className='red';
		}
		obj.className='on';
		document.getElementById("price").innerHTML="¥"+obj.price;
		_price=obj.value;
		var value=document.getElementById('buy_num').value;
		checkInt(idandamout[0], value);
		t_id=idandamout[0];
		document.getElementById("product_amount").innerHTML=idandamout[1]+'件';
	}*/
	$(document).ready(function(){
		$("li[name=itemtype]").click(function(){

			$("li[name=itemtype]").removeClass();
			$("li[name=itemtype]").addClass('leia');
			$(this).removeClass();
			$(this).addClass('leiahere');
			
			_price=$(this).attr('price');
			var price=''+_price;
			$("#price").html(price);
			_preprice=$(this).attr('preprice');
			var preprice='￥'+_preprice;
			$("#pre_price").html(preprice);
			_vipprice=$(this).attr('vipprice');
			var vipprice='￥'+_vipprice;
			$("#vip_price").html(vipprice);
			_offprice=_preprice-_price;
			var offprice='￥'+_offprice;
			$("#off_price").html(offprice);
			
			var value=$("#buy_num").val();		
			var id=$(this).attr('id');
			t_id=id;
			//var num=$(this).attr('num')+'件';
			
			checkInt(id, value);
			//$("#product_amount").html(num);
		});
	});
	window.onload=function(){
		document.getElementsByName('itemtype')[0].className='on';
	}
	$(document).ready(function(){
		$("#showfirstimg").attr("src",$(".list-h li:first img").attr("src"));
		$("#showfirstimg").attr("jqimg",$(".list-h li:first img").attr("src"));
		$("li[name=itemtype]:first").trigger("click");
		$("#buy_num").change(function(){
			var value=$("#buy_num").val();		
			checkInt(t_id, value);
			});
	});
</script>

</head>

<body>
{include file="menu.tpl"}

<div class="container" id="main">
<div class="pagetitle">
首页－进口水果
</div>
<div class="main">
<div class="mainR">
<h1>{$title}</h1>
<div class="right" style="width:100px;   text-align:center; "><span style="font-size:24px;  color:#F00; font-weight:bold;display:block; height:35px; line-height:35px;">888</span><span style="font-size:20px; font-family:Microsoft YaHei; height:25px; line-height:25px;  display:block; ">累计销量</span></div>
<ul class="mainRlist">
<li>我买价：<span class="red" id="price">￥{$price1}</span><span class="jia pl30" id="pre_price"> ￥{$price2}</span> <span class="pl30">节省<span class="red3" id="off_price">￥{$price2-$price1}</span></span> | 可获<span class="red3">6.00</span>积分</li>
<li>VIP价格：<span id="vip_price">￥{$vip_price}</span><a href="#" class="pl30">如何成为VIP客户？</a></li>
<li>买友评分：<img src="images/star.jpg" width="84" height="12" />　<span class="green">4.8</span>分|已有<span class="green">178</span>人评分</li>
</ul>
<div  class="leibie">
{if !empty($productitem)} 
<div class="leititle">类别:</div>
<ul class="lei">
{foreach name=list item=item from=$productitem}
 <li id="{$item['type_id']}" num="{$item['type_number']}" name='itemtype' class="leia" price='{$item['type_price']}' preprice='{$item['type_pre_price']}' vipprice='{$item['type_vip_price']}' onclick="setType(this)"><a href="javasript:void(0)"  ><span>{$item['type_name']}</span></a></li>
{/foreach}  
</ul>
{/if}
<div class="clear"></div>
</div>
<div class="mainRgreen" style="height:auto">
<table width="102%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="15%">产地：</td>
    <td width="20%">{$place}</td>
    <td width="11%">品牌：</td>
    <td width="18%">{$brand}</td>
    <td width="16%">商品编号：</td>
    <td width="20%">{$code}</td>
  </tr>
  <tr>
    <td>单位：</td>
    <td>{$units}</td>
    <td>毛重：</td>
    <td>{$weight}</td>
    <td>上架时间：</td>
    <td>{$time}</td>
  </tr>
  <tr>
    <td>配送范围：</td>
    <td>嘉兴</td>
    <td>库存：</td>
    <td>{$amount}{$units}</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</div>
<div class="shopping">我要买<input style="text-align:center" name="" type="text" id="buy_num" value="1"/>{$units}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;商品总价:<span id="total_price">{$price1}</span></div>
<div class="button">
<a href="javascript:viod(0);" onclick="addcart();"><img src="images/button1.jpg" width="159" height="39" class="button1"/></a>
<a href="javascript:viod(0);" onclick="gotobuy();"><img src="images/button2.jpg" width="159" height="39" /></a></div>
</div>

<div class="mainL">
<div id=preview>
	<div class=jqzoom id=spec-n1>
	<IMG id="showfirstimg" height=310 src="" jqimg="" width=450>
	</div>
	<div id=spec-n5>
		<div class=control id=spec-left>
			<img src="images/left.gif" />
		</div>
		<div id=spec-list>
			<ul class=list-h>
			{foreach item=item from=$pics}
				<li><img src="{$item}"> </li>
			{/foreach}
			</ul>
		</div>
		<div class=control id=spec-right>
			<img src="images/right.gif" />
		</div>
		
    </div>
</div>
<script type=text/javascript>
	$(function(){			
	   $(".jqzoom").jqueryzoom({
			xzoom:400,
			yzoom:400,
			offset:10,
			position:"right",
			preload:1,
			lens:1
		});
		$("#spec-list").jdMarquee({
			deriction:"left",
			width:450,
			height:56,
			step:2,
			speed:4,
			delay:10,
			control:true,
			_front:"#spec-right",
			_back:"#spec-left"
		});
		$("#spec-list img").bind("mouseover",function(){
			var src=$(this).attr("src");
			$("#spec-n1 img").eq(0).attr({
				src:src.replace("\/n5\/","\/n1\/"),
				jqimg:src.replace("\/n5\/","\/n0\/")
			});
			$(this).css({
				"border":"2px solid #ff6600",
				"padding":"1px"
			});
		}).bind("mouseout",function(){
			$(this).css({
				"border":"1px solid #ccc",
				"padding":"2px"
			});
		});				
	})
	</script>

<script src="js/lib.js" type=text/javascript></script>
<script src="js/163css.js" type=text/javascript></script>
</div>
<div class="clear"></div>
</div>

<div>
<br/>
</div>
<div class="pagemain">
<div class="pageboxA">
<div class="tui">
<div class="tuititle">最新推荐</div>
<ul>
<li>
<div><a href="#"><img src="images/v1.jpg" width="135" height="135" /></a></div>
<div>
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
</li>

<li>
<div><a href="#"><img src="images/v1.jpg" width="135" height="135" /></a></div>
<div>
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
</li>


<li>
<div><a href="#"><img src="images/v1.jpg" width="135" height="135" /></a></div>
<div>
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
</li>


<li>
<div><a href="#"><img src="images/v1.jpg" width="135" height="135" /></a></div>
<div>
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
</li>

<li>
<div><a href="#"><img src="images/v1.jpg" width="135" height="135" /></a></div>
<div>
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
</li>

</ul>
<div class="clear"></div>
</div>
</div>

<div class="pageboxB">
<script type="text/javascript"> 
function nTabs(thisObj,Num){ 
if(thisObj.className == "active")return; 
var tabObj = thisObj.parentNode.id; 
var tabList = document.getElementById(tabObj).getElementsByTagName("li"); 
for(i=0; i <tabList.length; i++){ 
if (i == Num){ 
thisObj.className = "active"; 
document.getElementById(tabObj+"_Content"+i).style.display = "block"; 
}else{ 
tabList[i].className = "normal"; 
document.getElementById(tabObj+"_Content"+i).style.display = "none"; 
} 
} 
} 
</script> 

<div class="pagenTab"> 
<!-- 标题开始 --> 
<div class="TabTitle"> 
<ul id="myTab0"> 
<li class="active" onmouseover="nTabs(this,0);" >商品信息</li> 
<li class="normal" onmouseover="nTabs(this,1);">商品评价</li> 
</ul> 
</div> 
<!-- 内容开始 --> 
<div class="TabContent"> 
<div id="myTab0_Content0">
<div class="xinxi">
<div class="xinxiR">
<ul>
<li>规格：1*200g</li>
<li>保质期：90天</li>
</ul>
</div>
<div class="xinxiL">
<li>品牌：阿克苏</li>
<li>产地：新疆</li>
<li>毛重：200.0g</li>
</div>
</div>
{$content}
</div>


<div id="myTab0_Content1" class="none">
<ul class="ping">
<li>
<div class="lun">
<p class="lunp">恩，不错，味道口感都挺好 。包装需要改进，有几个香蕉还是挤了。</p>
<p class="time">2013年09月18日 15:01</p>
</div>
<div class="yonghu">
<div><img src="images/getAvatar.jpg" width="40" height="40" /></div>
<p>用户名</p>
</div>
</li>

<li>
<div class="lun">
<p class="lunp">恩，不错，味道口感都挺好 。包装需要改进，有几个香蕉还是挤了。</p>
<p class="time">2013年09月18日 15:01</p>
</div>
<div class="yonghu">
<div><img src="images/getAvatar.jpg" width="40" height="40" /></div>
<p>用户名</p>
</div>
</li>


<li>
<div class="lun">
<p class="lunp">恩，不错，味道口感都挺好 。包装需要改进，有几个香蕉还是挤了。</p>
<p class="time">2013年09月18日 15:01</p>
</div>
<div class="yonghu">
<div><img src="images/getAvatar.jpg" width="40" height="40" /></div>
<p>用户名</p>
</div>
</li>


<li>
<div class="lun">
<p class="lunp">恩，不错，味道口感都挺好 。包装需要改进，有几个香蕉还是挤了。</p>
<p class="time">2013年09月18日 15:01</p>
</div>
<div class="yonghu">
<div><img src="images/getAvatar.jpg" width="40" height="40" /></div>
<p>用户名</p>
</div>
</li>


<li>
<div class="lun">
<p class="lunp">恩，不错，味道口感都挺好 。包装需要改进，有几个香蕉还是挤了。</p>
<p class="time">2013年09月18日 15:01</p>
</div>
<div class="yonghu">
<div><img src="images/getAvatar.jpg" width="40" height="40" /></div>
<p>用户名</p>
</div>
</li>


<li>
<div class="lun">
<p class="lunp">恩，不错，味道口感都挺好 。包装需要改进，有几个香蕉还是挤了。</p>
<p class="time">2013年09月18日 15:01</p>
</div>
<div class="yonghu">
<div><img src="images/getAvatar.jpg" width="40" height="40" /></div>
<p>用户名</p>
</div>
</li>


<li>
<div class="lun">
<p class="lunp">恩，不错，味道口感都挺好 。包装需要改进，有几个香蕉还是挤了。</p>
<p class="time">2013年09月18日 15:01</p>
</div>
<div class="yonghu">
<div><img src="images/getAvatar.jpg" width="40" height="40" /></div>
<p>用户名</p>
</div>
</li>


<li>
<div class="lun">
<p class="lunp">恩，不错，味道口感都挺好 。包装需要改进，有几个香蕉还是挤了。</p>
<p class="time">2013年09月18日 15:01</p>
</div>
<div class="yonghu">
<div><img src="images/getAvatar.jpg" width="40" height="40" /></div>
<p>用户名</p>
</div>
</li>


<li>
<div class="lun">
<p class="lunp">恩，不错，味道口感都挺好 。包装需要改进，有几个香蕉还是挤了。</p>
<p class="time">2013年09月18日 15:01</p>
</div>
<div class="yonghu">
<div><img src="images/getAvatar.jpg" width="40" height="40" /></div>
<p>用户名</p>
</div>
</li>
</ul>
<div class="pagelist">
         <div class="page2"><a href="#">首页</a> <a href="#">上一页</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a><a href="#">下一页</a> <a href="#">尾页</a> </div><div class="clear"></div></div>
</div> 
 
 

</div> 
</div>


</div>
</div>

<div class="pageside">
<div class="pagesidetitle">热销榜</div>
<ul >
<li>
<div class="pagesidep" >
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
<div  ><a href="#"><img src="images/x1.jpg" width="69" height="69" /></a></div>
</li>

<li>
<div class="pagesidep" >
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
<div ><a href="#"><img src="images/x1.jpg" width="69" height="69" /></a></div>
</li>


<li>
<div class="pagesidep" >
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
<div ><a href="#"><img src="images/x1.jpg" width="69" height="69" /></a></div>
</li>

<li>
<div class="pagesidep" >
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
<div ><a href="#"><img src="images/x1.jpg" width="69" height="69" /></a></div>
</li>

<li>
<div class="pagesidep" >
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
<div ><a href="#"><img src="images/x1.jpg" width="69" height="69" /></a></div>
</li>

<li>
<div class="pagesidep" >
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
<div ><a href="#"><img src="images/x1.jpg" width="69" height="69" /></a></div>
</li>

<li>
<div class="pagesidep" >
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
<div ><a href="#"><img src="images/x1.jpg" width="69" height="69" /></a></div>
</li>

<li>
<div class="pagesidep" >
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
<div ><a href="#"><img src="images/x1.jpg" width="69" height="69" /></a></div>
</li>

<li>
<div class="pagesidep" >
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
<div ><a href="#"><img src="images/x1.jpg" width="69" height="69" /></a></div>
</li>

<li>
<div class="pagesidep" >
<h6><a href="#">西域圣果－阿克苏冰糖心萍果</a></h6>
<p><span class="right jia">￥75.00</span><span class="red2">￥65.00</span></p>
</div>
<div ><a href="#"><img src="images/x1.jpg" width="69" height="69" /></a></div>
</li>

</ul>
</div>
  <div class="clear"></div>
  <div class="banner1"><img src="images/banner1.jpg" width="1000" height="80" /></div>
</div>

{include file="footer.tpl"}
</body>
</html>
