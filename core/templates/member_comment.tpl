<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="js/lrtk.js"></script>
<style>
	@import "js/Assets/LightFace.css";
</style>
<link rel="stylesheet" href="js/Assets/lightface.css" />
<script src="js/mootools/mootools-core.js"></script>
<script src="js/mootools/LightFace.js"></script>
<script src="js/mootools/LightFace.js"></script>
<script src="js/mootools/LightFace.IFrame.js"></script>
<script src="js/mootools/LightFace.Image.js"></script>
<script src="js/mootools/LightFace.Request.js"></script>
<script>
	function upload(id){
		light = new LightFace.IFrame({ height:100, width:280, url: id, title: '图片上传' }).addButton('关闭', function() { light.close(); },true).open();
	}
</script>
{include file="core/templates/header.tpl"}
<link href="css/myaccount.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="headerBox">
    {include file="core/templates/top.tpl"}
</div>
<div class="mainBox">
	{include file="core/templates/menu.tpl"}
    <div class="mainBody">
    	<div class="accountLeft">
        	<div class="myaccount"><p>我的帐户</p></div>
            {include file="core/templates/member_left.tpl"}
        </div>
        <div class="accountRight">
          <div class="account_location">
            	<p><a href="">首页</a>
                ><a href="">我的账户</a>><a href="">我的评价</a></p>
            </div>
          <div class="account_detail">
          		{if $error eq 'true'}
          		<!-- 页面出错 -->
          		<div class="noresult">
                	<img src="images/unhappy.png" />
                    <p>没有查询到相应的订单</p>
                </div>
          		{else if $ret eq '1'}
          		<!-- 评价成功 -->
          			<div class="noresult">
          			<img src="images/happy.png" />
                    <p>评价成功！生鲜网更多宝贝等着您</p>
                    </div>
          		{else if $ret eq '0'}
          		<!-- 评价失败-->
          			<div class="noresult">
          			<img src="images/unhappy.png" />
                    <p>网络不给力，评价提交失败，请重试</p>
                    </div>
          		{else}
          		<!-- 评价页面 -->
          		<div class="detailTitle"><p class="left_P">评价商品</p></div>
          		
          		<form action="" method="post" name="comment_form" id="comment_form">
        		<div class="evaluateBox">
        			{foreach name=list item=item from=$list}
                	<div class="evaluate_List">
                		<div class="evaluateLeft">
                    	<img src="{$item['product_pic']}" />
                        <p>{$item['product_name']}</p>
                    </div>
                    	<div class="evaluateRight">
                    		<div class="evaluate_area" style="background-image:url(images/bgbg.png); padding-bottom:6px;">
                        		<textarea class="evaluate_text" name="comment_content{$smarty.foreach.list.iteration}" placeholder="东西好不好，快发表你的评价吧！"></textarea>
                       	  	<div class="evaluate_down">
                        	 	<!--<input class="photo" type="image" src="images/zhaoxiangji.png" />-->
                                <p style="padding-top:5px;">晒照片（最多可添加 5 张）</p>

                              <div class="evaluate_choose">
                                   <label style="float:left">
                                     <input style="float:left;margin-top:6px" type="radio" name="is_anonymous{$smarty.foreach.list.iteration}" value="1" />
                                      	公开</label>
                                   <label style="float:left;">
                                      <input style="margin-top:6px;" type="radio" name="is_anonymous{$smarty.foreach.list.iteration}" value="0" id="RadioGroup1_1" />
                                      	匿名</label>
                             </div>
                           </div>
                        </div>
                        <div class="photoBox">
                        	<div class="addphoto"><img id="pic_{$smarty.foreach.list.iteration}_1" src="images/addphoto.png" onclick="upload('member_comment_file.php?id=h_{$smarty.foreach.list.iteration}_1')"/></div>
                            <div class="addphoto"><img id="pic_{$smarty.foreach.list.iteration}_2" src="images/addphoto.png" onclick="upload('member_comment_file.php?id=h_{$smarty.foreach.list.iteration}_2')"/></div>
                            <div class="addphoto"><img id="pic_{$smarty.foreach.list.iteration}_3" src="images/addphoto.png" onclick="upload('member_comment_file.php?id=h_{$smarty.foreach.list.iteration}_3')"/></div>
                            <div class="addphoto"><img id="pic_{$smarty.foreach.list.iteration}_4" src="images/addphoto.png" onclick="upload('member_comment_file.php?id=h_{$smarty.foreach.list.iteration}_4')"/></div>
                            <div class="addphoto"><img id="pic_{$smarty.foreach.list.iteration}_5" src="images/addphoto.png" onclick="upload('member_comment_file.php?id=h_{$smarty.foreach.list.iteration}_5')"/></div>
                            <input type="hidden" name="h_{$smarty.foreach.list.iteration}_1" id="h_{$smarty.foreach.list.iteration}_1" value=""/>
                            <input type="hidden" name="h_{$smarty.foreach.list.iteration}_2" id="h_{$smarty.foreach.list.iteration}_2" value=""/>
                            <input type="hidden" name="h_{$smarty.foreach.list.iteration}_3" id="h_{$smarty.foreach.list.iteration}_3" value=""/>
                            <input type="hidden" name="h_{$smarty.foreach.list.iteration}_4" id="h_{$smarty.foreach.list.iteration}_4" value=""/>
                            <input type="hidden" name="h_{$smarty.foreach.list.iteration}_5" id="h_{$smarty.foreach.list.iteration}_5" value=""/>
                        </div>
                        </div>
                    </div>
                    <input type="hidden" name="info_id{$smarty.foreach.list.iteration}" value="{$item['info_id']}"></input>
                    <input type="hidden" name="comment_point{$smarty.foreach.list.iteration}" value="5"></input>
                    {/foreach}
                     <input type="hidden" name="product_count" value="{$product_count}"/>
                     <input type="hidden" name="cmd" value="comment"/>
                     <input style=" float:right; margin:20px 40px;" type="image" src="images/fabiao_button.png"/>
                </div>
                </form>
                
          		{/if}
            </div>
        </div>
    </div>
</div>
<div class="main_down">
	{include file="core/templates/bottom.tpl"}
    {include file="core/templates/copyright.tpl"}
</div>
<script>
	function loadPic(id){
		var pic = id.replace("h", "pic");

		document.getElementById(pic).src = document.getElementById(id).value;
	}

	function deletePic(id){
		document.getElementById(id).value = "";

		var pic = id.replace("h", "pic");

		document.getElementById(pic).src = "images/addphoto.png";		
	}
</script>
</body>
</html>
