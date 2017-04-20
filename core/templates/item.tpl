<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<title>{$head_title}</title>
<meta name="Keywords" content="{$WEB_KEYWORD}" />
<meta name="Description" content="{$WEB_DESCRIBE}" />
<link href="css/all_global.css" rel="stylesheet" type="text/css" />
<link href="css/firstpage.css" rel="stylesheet" type="text/css"/>
<link href="css/listproduct.css" rel="stylesheet" type="text/css"/>
<link href="css/detailproduct.css" rel="stylesheet" type="text/css"/>
<link href="css/jquery.alerts.css" rel="stylesheet" type="text/css"/>

<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
<script src="js/topnavi.js" type="text/javascript"></script>
<script src="js/allfirst.js" type="text/javascript"></script>
<script src="js/productfix.js" type="text/javascript"></script>
<script src="js/jquery.lazyload.min.js" type="text/javascript"></script>
{literal}
<script type="text/javascript">
$.ajaxSetup({cache:false});	var base_url="http://www.0573sg.com/";

//handle the product care event  
$(function(){
        $("img.lazy").lazyload({ threshold : 400 });
        $("input[type='image'].lazy").lazyload({ threshold : 400 });
	var has_cared=0;
	var pid=46;
	if(has_cared==1)
	{
		$("#prod_care").addClass("buy-care-now");
	}
	else 
	{
		$("#prod_care").addClass("buy-care");
		$("#prod_care").bind("click",function(){
			$.post(base_url+"/web/care_product",{product_id:pid},function(data){
				if(data=="ok"){
					$("#prod_care").unbind();
					$("#prod_care").removeClass("buy-care").addClass("buy-care-now"); 
				}else
				{
					show_mini_login();
		          	}
			});
		});
	}
});
// to buy
$(function(){
	var is_lack=0;
	var pid=46;
	var maxgifts=0;
	var qty=0;
	var is_exist_product=1;
	if(is_lack==0 && is_exist_product==1)
	{
		$("#buy").addClass("buy-now");
		$("#buy").bind("click",function(){
			// autoTglog(1);
			buy_now(base_url,pid,maxgifts,qty);
		});
	}
	else 
	{
		$("#buy").addClass("buy-gray");
	}

	 $.post('/web/ajaxSetRecentProduct',{id:pid,recent_product_type:2},
        function(data){        
        }
    ,'json');
	
    $.post('/web/ajaxGetRecentProduct',
        {recent_product_type:2,pid:46},
        function(data){
            if (data.state==1){
                $("#detail_recent_product").show();
                $("#detail_recent_product .title_Browse_box").html(data.html);
            }else{
                $("#detail_recent_product").hide();
            }
        },'json');
});
//to check product price
$(function(){
	var is_use_store=0;
	//   is_use_store="1";
	$("input:radio[name='price']").change(function(event){
		$(".detail-xx01").find("div").removeClass("more-cp green-now").addClass("more-cp");
		$(this).parent().removeClass("more-cp").addClass("more-cp green-now");
		var stock=$("#stock_"+$(this).val()).val();
		if(is_use_store=="1")
		{
			if(stock=="0"||stock=="")
			{
				$("#buy").unbind();
				$("#buy").removeClass("buy-now").addClass("buy-end");
			}
		}
	});

	
});


//show comment list
function comment(data)
{
	var json=eval('('+data+')');
	var html="";
	for(i=0;i<json.comment.length;i++)
	{
		var c=json.comment[i];
		html+='<div class="detail-user-says">';
		html+='<div class="detail-user-says-left">';
		html+='<img src="'+c.user_head+'" />';
		html+='</div>';
		html+='<div class="detail-user-says-right">';
		html+='<ul>';
		html+='<li><span class="gray">用户：'+c.username=='null' ? '匿名' : c.username+'</span></li>';
		html+='<li>'+c.content+'</li>';
		if(c.images)
		{
			var images=eval('('+c.images+')');
			html+='<li>有图有真相：</li>';
			for(var k in images)
			{
			   html+='<li><img width="100" src="/'+images[k]+'"/></li>';
			}
		}
		html+='<li>';
		html+='<p class="user-ping">';
		for(var s=0;s<c.star;s++)
		{
			html+='<span class="star"></span>';
		}
		for(var g=0;g<5-c.star;g++)
		{
			html+= '<span class="star-gray" style="margin-right:0px;"></span>';
		}
		html+='</p>';
		html+='<span class="gray">'+c.time+'</span>';
		html+='</li>';
		html+='</ul>';
		html+='</div>';
		html+='</div>';
	}
	$(".detail-allsays01").html(html);
	page(json.pagination);

}
//make page
function page(pagination)
{
	$(".detail-page-number").html("");
	var page=eval('('+pagination+')');
	var str_page="";
	for(var i in page)
	{
		str_page+=page[i];
	}
	$(".detail-page-number").html(str_page);
	$(".detail-page-number a").click(function(){
		var page=$(this).attr('val');
		var star=$(this).attr('star');
		$.get(base_url+"/comment/product/46/"+star+"/"+page,{},function(data){
			comment(data);
		});
	});
}
// first load comment info
$(function(){
	var url=base_url+"/comment/product/46";
	$.get(url,function(data,status){
		comment(data);
		var json=eval('('+data+")");
		$("#c_all span").html(json.praise.num);
		$("#sp-pl").html($("#sp-pl").html()+"("+json.praise.num+")");
		$("#c_good span").html(json.praise.good_num);
		$("#c_normal span").html(json.praise.normal_num);
		$("#c_bad span").html(json.praise.bad_num);
		$("#grade_good").css("width",json.praise.good+"%");
		$("#grade_normal").css("width",json.praise.normal+"%");
		$("#grade_bad").css("width",json.praise.bad+"%");
		$("#good_rate").html(json.praise.good+"%");
		$("#normal_rate").html(json.praise.normal+"%");
		$("#bad_rate").html(json.praise.bad+"%");

		$("#c_all_another span").html(json.praise.num);
		$("#c_good_another span").html(json.praise.good_num);
		$("#c_normal_another span").html(json.praise.normal_num);
		$("#c_bad_another span").html(json.praise.bad_num);
		$("#grade_good_another").css("width",json.praise.good+"%");
		$("#grade_normal_another").css("width",json.praise.normal+"%");
		$("#grade_bad_another").css("width",json.praise.bad+"%");
		$("#good_rate_another").html(json.praise.good+"%");
		$("#normal_rate_another").html(json.praise.normal+"%");
		$("#bad_rate_another").html(json.praise.bad+"%");

		if(json.praise.num>0)
		{
			$(".detail-user-title li").click(function(){
				$(".detail-user-title li").removeClass();
				$(this).addClass("now-gray");
				var star=$(this).attr("val");
				$.get(base_url+"/comment/product/46/"+star,{},function(data){
					comment(data); 
				});
			}); 
		}
	});
});

function show_mini_login()
{ 
   	$("#pageOverlay").show();
	$(".loginmini-box").show();
       $("#jump_url").val(base_url+"web/pro/46");

}
// go to do some comments
function do_comment()
{
	$.getJSON(base_url+"/comment/can_comment/46",{},function(data){
		if(data)
		{
			if(data.msg=='您还未登录不能进行评论')
			{show_mini_login();
			}
			else if(data.error=="1")
			{
                alert(data.msg);
            }
			else
			{ 
				window.location.href=base_url+"home/myorder";
			} 	
		}

	}); 
}

function cutnum(){
	var num = document.getElementById("buy_num").value;

	if(num>0){
		num = num*1-1;
		document.getElementById("buy_num").value=num;
	}
}

function addnum(){
	var num = document.getElementById("buy_num").value;

	if(num>0){
		num = num*1+1;
		document.getElementById("buy_num").value=num;
	}
}
</script>
{/literal}
<script charset="UTF-8" src="js/bundle.js"></script>
<script charset="UTF-8" src="js/iframeWidget.js"></script>
<script type="text/javascript" charset="UTF-8" src="js/bw.js"></script>
<link rel="stylesheet" type="text/css" href="css/m-front-icon.css"/>
<script type="text/javascript" language="javascript" id="BDBridgeSendData" src="js/Enter.php" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="css/m-front-mess.css"/>
<link rel="stylesheet" type="text/css" href="css/m-front-invite.css"/>
<link type="text/css" rel="stylesheet" href="css/m-webim-lite.css"/>
</head>

<body>
<iframe style="display: none; " id="sina_anywhere_iframe"></iframe>
<!--头部导航开始-->
{include file="menu.tpl"}
<!--头部导航结束-->
<!--详情部分开始-->


<div class="detail-box">
     <div class="detail-box-middle" style="margin-top: 15px;">
     <div class="w" style="margin:0px;">
         <div class="breadcrumb">
             <strong><a href="index.html">首页</a></strong><span>&nbsp;&gt;&nbsp;
             <a href="index.html">鲜果区</a>&nbsp;&gt;&nbsp;
             </span>
             <span>{$map['product_name']}</span>
         </div>
     </div>
	  <div class="detail-box-left">
	       <div class="detail-box-left-one">
		    <div class="detail-one-left">
			 <div class="detail-bigpic">
			 <div><img src="{$logo}" id="defaultImg"></div>
			 </div>
			 <div class="detail-samllpic">
			      <ul>
			      	{foreach item=item from=$pics}
						<li><img onmouseover="javascript:showDaTu(&#39;http://www.0573sg.com/{$item}&#39;)" src="{$item}"></li>
					{/foreach}
                  </ul>
			 </div>
		     </div>
		     <div class="detail-one-right">
			  <div class="detail-xxone">
			      <div class="detail-xx01">
                      <h1 class="cp-ming01">{$map['product_head']}</h1>
				   <p>&nbsp;</p>
			       				<div class="more-cp">
				
				
				<label for="price_4128">
				       <span>{$map['product_name']}</span>
				       <span style="font-size:18px;">￥<span id="pro_price_4128" class="prod_price">{$map['product_price1']}</span></span>
				       				       <span class="gray-line">￥{$map['product_price2']}</span>
				       				       <span>商品编号:{$map['product_code']} </span>
				</label>
				   </div>		
				   			     </div>
			      <div class="detail-xx02">
				   <p><img src="images/cp_ma.jpg"></p>
				<div class="detail-xx02-big">
				   <img src="{$map['product_qrcode']}" width="100">

				  </div>
			      </div>
			  </div>
			  


			  <div class="detail-xxthree">
			       <div class="detail-buy01">
			       <span><img onclick="cutnum()" src="images/bag_close.gif" /></span>
				    {literal}<span><input id="buy_num" name="buy_num" type="text" value="1" class="number-add" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"/></span>{/literal}
				    <span><img onclick="addnum()" src="images/bag_open.gif" /></span>
				</div>
			       <div class="detail-buy02">
			        <a href="javascript:addcart();" id="buy" class="buy-now"></a>
			       </div>
			       <div class="detail-buy03">
			       <a href="javascript:gotobuy();" id="prod_care" class="buy-care"></a>
			       </div>
					<div class="detail-buy04">
			       <a href="javascript:gotofocus();" id="prod_care" class="buy-care"></a>
			       </div>
			  <div class="detail-xxfour" style="line-height:30px;font-size: 14px;">
			       <h6>商品简介</h6>
			       <!-- <p class="miaoshu"></p> -->
			       <p><span style="font-size: 14px">{$map['product_describe']}<br>
</span></p>			       <h6>温馨提示</h6>
			       <p></p><p><font style="font-size: 14px">为了保证水果的新鲜度，收到后请及时食用。</font></p>
<p><span style="color: rgb(255, 0, 0); ">{$map['product_prompt']}</span></p><p></p>
			  </div>

		     </div>
	       </div>

	       <div class="detail-box-left-js">
		    <div class="detail-js-title">
			 <a href="javascript:void(0);" class="now-js" id="sp-xq">商品详情</a>
				 <a href="javascript:void(0);" id="sp-pl" class="">顾客评论(526)</a>
				 <a href="javascript:void(0);" style="float: right;width: 400px;text-align: right;text-decoration:none;" onclick="do_comment()">发布评价即可获2元（积分）前五名可获双倍积分</a>
		    </div>
		    <div class="detail-js-pl" name="pinglone" id="pro_detail" style="display: block; ">
			 <p class="detail-pl01">
			 			 <span>产地：{$map['product_place']}</span>
			 			 			                          <span>净重：{$map['product_weight']}</span>
                                                  </p>
			 <p></p>
			 {$map['product_content']}
		    </div>
</div>

	       </div>


	  </div>

	  <div class="detail-box-right">
	  
	  <div class="onelist-right-gg01 statis_index_rightactive">
					<ul>
											<li><a href="#" target="_blank" position="0"><img title="哈根达斯" src="images/1409192115_pic.jpg">
						</a></li>
											<li><a href="#" target="_blank" position="1"><img title="亲友会" src="images/1408081984_pic.jpg">
						</a></li>
											<li><a href="javascript:void(0);" style="cursor:default" position="2"><img title="上海仓满300元赠新西兰柠檬2斤价值48元" src="images/1408944310_pic.jpg">
						</a></li>
											<li><a href="#" target="_blank" position="3"><img title="充值赠品 送佳沛新西兰绿奇异果原装" src="images/1399520265_pic.jpg">
						</a></li>
											<li><a href="#" target="_blank" position="4"><img title="注册有礼 送积分 够实惠" src="images/1396714085_pic.jpg">
						</a></li>
											<li><a href="#" target="_blank" position="5"><img title="APP" src="images/1409229558_pic.jpg">
						</a></li>
										</ul>
				</div>
				
           <!--viewed start-->
	<div class="detail-right-history01" id="detail_recent_product" style="">
		 <div class="title_Browse">
			 <p>最近浏览过的商品</p>
		 </div>
		 <div class="title_Browse_box"><div class="Browse_box1 botom_1"><dl>
			<dt><a target="_blank" href="http://www.0573sg.com/web/pro/2465"><img src="file:///C|/Documents and Settings/Administrator/桌面/越南火龙果,5斤装39元【品牌 价格 产地 点评 图片】_天天果园官网_files/1-180x180-2465-B5A2USUT.jpg" width="80" height="78"></a></dt><a target="_blank" href="http://www.0573sg.com/web/pro/2465">
                           </a><dd><a target="_blank" href="http://www.0573sg.com/web/pro/2465"></a><a target="_blank" href="http://www.0573sg.com/web/pro/2465">佳沛新西兰阳光金奇异果（巨无霸）买二送一 </a></dd><a target="_blank" href="http://www.0573sg.com/web/pro/2465">
                           <dd class="font_2">现价：￥99</dd><dl></dl></a></dl></div></div>
	  </div>
	<!--viewed end-->
	<div class="detail-right-history01">
		<div class="title_Browse">
			<p>热销人气商品</p>
			<span>
				<a href="http://www.0573sg.com/web/product_special/hot/0">MORE+</a>
			</span>
		</div>
		<div class="title_Browse_box">
		    {foreach name=list item=item from=$right}
		    <div class="Browse_box1 ">
				<dl>
				<dt><a target="_blank" href="http://www.0573sg.com/item-{$item['product_id']}.html"><img src="{$item['product_pic']}" width="80" height="78" /></a></dt>
				<dd>
					<a target="_blank" href="http://www.0573sg.com/item-{$item['product_id']}.html">{$item['product_name']}</a>
				</dd>
				<dd class="font_2">现价：￥{$item['product_price1']}</dd>
								<dd class="old-price">原价：￥{$item['product_price2']}</dd>
								</dl>
		    </div>
		    {/foreach}
		    		    
		    	     </div>
	</div>
	<!--viewed end-->
	  </div>
     </div> 
</div>
<!--详情部分结束-->

<!--mini cart-->
<div class="cartmini-box" style="display: none">
     <div class="cartmini-fix">
	  <p class="green01">已成功加入购物车</p>
	  <p class="green03">
	     购物车共有 <span class="red" id="overlay_cartnum">0</span>件商品，合计：<span class="red" id="overlay_cartmoney">￥0</span>
	  </p>
	  <div>
	     <ul>
		 <li><a href="index.html" style="text-decoration:none;" class="btn-cart02" id="close-other">继续逛逛</a></li>
		 <li><a href="javascript:buy();" style="text-decoration:none;" class="btn-cart01">去结算</a></li>
	     </ul>
	  </div>
	  <div class="close-other"></div>

     </div>
</div>

<!--footer  start-->
{include file="footer.tpl"}

<!--footer  end-->

<!--地址弹层-->




<div style="display:none;">
<script src="js/h.js" type="text/javascript"></script>
<script src="js/wb.js" type="text/javascript" charset="utf-8"></script>
</div>
<script>
var _id =  "{$map['product_id']}";
//产品销售单价
var _price = "{$map['product_price1']}";
//购买总价
var _total_price = "{$map['product_price1']}";
//购买的数量
var _acount ='1';
//细分类ID
var t_id = '';

function gotobuy(){
	var url="shop_do.php?act=buy&session_id=19821222i19830219_"+_id+"&tid="+t_id+"&acount="+_acount;
	window.location=url;
}

function addcart(){
	var url="shop_do.php?act=addcart&session_id=19821222i19830219_"+_id+"&tid="+t_id+"&acount="+_acount;
	window.location=url;
}

function gotofocus(){
	var url="shop_do.php?act=createMemberFocus&session_id=19821222i19830219_"+_id+"&id="+_id+"&acount="+_acount;
	window.open(url);
}
</script>
</body>
</html>