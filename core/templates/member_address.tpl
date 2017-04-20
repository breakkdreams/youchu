
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
                ><a href="">我的账户</a>><a href="">基本资料</a>><a href="">企业认证</a></p>
            </div>
          <div class="shopping_address">
        	<p class="shP">收货地址</p>
        	
        	{foreach name=list item=item from=$list}
        	<div class="addressList ">
            <img src="images/fu.png" />
            <p class="peopleP xuanzeP">{$item['a_name']}</p>
            <p  class="phoneP xuanzeP">{$item['a_phone']} {$item['a_tel']}</p>
            <p class="address xuanzeP" >{$item['a_address']}</p>
            <input style="margin-top:14px;" type="image" src="images/shanchu.png"  onclick="deleteDetail({$item['a_id']});"/>
            <input type="image" src="images/xiugai.png" onclick="changeDetail({$item['a_id']});"/>
        	</div>
        	<input type="hidden" name="a_name{$item['a_id']}" id="a_name{$item['a_id']}" value="{$item['a_name']}"/>
        	<input type="hidden" name="a_phone{$item['a_id']}" id="a_phone{$item['a_id']}" value="{$item['a_phone']}"/>
        	<input type="hidden" name="a_tel{$item['a_id']}" id="a_tel{$item['a_id']}" value="{$item['a_tel']}"/>
        	<input type="hidden" name="a_address{$item['a_id']}" id="a_address{$item['a_id']}" value="{$item['a_address']}"/>
        	<input type="hidden" name="a_mark{$item['a_id']}" id="a_mark{$item['a_id']}" value="{$item['a_mark']}"/>
        	{/foreach}
            
            <p><a class="allA" href="">会员最多增加5个地址</a></p>
            <div class="add_dd">
            	<p class="add_title">+添加新地址</p>
                <div class="add_main">
                <form action="" method="post" name="form1" id="form1">
                	<div class="add_list">
                    	<div class="add_text"><p>地址:</p></div>
                        <input style="width:448px;" type="text" name="a_address" id="a_address"/>
                    </div>
                    <div class="add_list">
                    	<div class="add_text"><p>收货人:</p></div>
                        <input type="text" name="a_name" id="a_name"/>
                        <div class="add_text"><p>附近标识:</p></div>
                        <input type="text" name="a_mark" id="a_mark"/>
                    </div>
                    <div class="add_list">
                    	<div class="add_text"><p>手机:</p></div>
                        <input type="text" name="a_phone" id="a_phone"/>
                        <div class="add_text"><p>固定电话:</p></div>
                        <input type="text" name="a_tel" id="a_tel"/>
                    </div>
                    <input type="hidden" name="cmd" id="cmd" value="create"/>
                    <input type="hidden" name="session_id" id="session_id" value=""/>
                    <input style=" margin:20px 300px;" id="submit_button" type="image" src="images/tijiao_button.png"/>
              </form>  
                </div>
              
              <form action="" id="form2" method="post">
              		<input type="hidden" name="cmd2" id="cmd2" value="delete"/>
                    <input type="hidden" name="session_id2" id="session_id2" value=""/>
              </form>
            </div>
          
        </div>
    </div>
</div>
<div class="main_down">
	{include file="core/templates/bottom.tpl"}
    {include file="core/templates/copyright.tpl"}
</div>
<script>
$(document).ready( function() {
	$("#submit_button").click( function() {
		var address=$.trim($("#a_address").val());
		var name=$.trim($("#a_name").val());
		var phone=$.trim($("#a_phone").val());
		var tel=$.trim($("#a_tel").val());
		
        if(address.length==0){
            jAlert('请输入收货地址');
            return false;
        }
        else if(name.length==0){
        	jAlert('请输入收件人');
        	return false;
        }
        else if(phone.length!=11 && tel.length==0){
        	jAlert('请输入手机号或者电话');
        	return false;
        }else{
        	document.getElementById("form1").submit();
        }
	});
	
});

//编辑地址信息
function changeDetail(id){
	document.getElementById("a_name").value = $("#a_name"+id).val();
	document.getElementById("a_address").value = $("#a_address"+id).val();
	document.getElementById("a_phone").value = $("#a_phone"+id).val();
	document.getElementById("a_tel").value = $("#a_tel"+id).val();
	document.getElementById("a_mark").value = $("#a_mark"+id).val();
	document.getElementById("session_id").value = id;
	document.getElementById("cmd").value = "edit";
}

//删除地址信息
function deleteDetail(id){
	jConfirm('确认要删除吗?', '确认对话框', function(r) {
	    if(r){
	    	document.getElementById("session_id2").value = id;
	    	document.getElementById("form2").submit();
	    }
	});
}
</script>
</body>
</html>
