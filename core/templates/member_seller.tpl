
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
            	<p><a href="index.php">首页</a>
                ><a href="member.php">我的账户</a>><a href="">申请商家</a></p>
            </div>
          <div class="informationBox">
            	<div class="information_right">
            	<form action="" method="post">
                	<div class="information_main">
                    	<div class="mainone">
                        	<p class="userName">商铺名称：</p>
                            <div class="mainone_input"><input class="longInput" type="text" name="s_name" id="s_name" value="{$map['s_name']}"/></div>
                        </div>
                       
                        <div class="mainone">
                           <p class="userName">商铺负责人：</p>
                         	<div class="mainone_input"><input class="longInput" type="text" name="s_manager" id="s_manager" value="{$map['s_manager']}"/></div>
                        </div>
                                                
                        <div class="mainone">
                        	<p class="userName">商铺客服电话：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="s_400" id="s_400" value="{$map['s_400']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">商铺地址：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="s_address" id="s_address" value="{$map['s_address']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">经营范围：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="s_range" id="s_range" value="{$map['s_range']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">申请联系人：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="s_applyer" id="s_applyer" value="{$map['s_applyer']}"/></div>
                        </div>
                        
                        <div class="mainone">
                        	<p class="userName">申请联系电话：</p>
                            <div class="mainone_input"><input class="longInput" type="text"  name="s_apperphone" id="s_apperphone" value="{$map['s_apperphone']}"/></div>
                        </div>
                        
                        <input type="hidden" name="s_id" value="{$map['s_id']}"/>
                        <input type="hidden" name="cmd" value="apply"/>
                        <input style="margin-top:20px; margin-left:150px;" type="image" src="images/baocun.png" onclick="check();"/>
                    </div>
                </div>
                </form>
                
            </div>
            </div>
          
        </div>
    </div>
</div>
<div class="main_down">
	{include file="core/templates/bottom.tpl"}
    {include file="core/templates/copyright.tpl"}
</div>
<script>
var ret = '{$ret}';

if(ret>0){
	jAlert('提交成功,请等待审核');
}
</script>
</body>
</html>
