<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>公司福利采购通道,企业采购水果批发网_嘉兴水果网</title>
<meta name="keywords" content="嘉兴水果批发网,嘉兴公司福利采购,嘉兴企业员工福利" />
<meta name="description" content="嘉兴水果网企业采购通道,为企业提供商务水果礼品定制,包括商务水果礼盒、企事业单位餐后水果、员工福利水果、节日送礼水果等,是企事业单位水果团购的首选网站." />
<link href="css/all_global.css" rel="stylesheet" type="text/css" />
<link href="css/firstpage.css" rel="stylesheet" type="text/css" />
<link href="css/listproduct.css" rel="stylesheet" type="text/css" />

<script src="js/analytics.js"></script>
<script src="js/jquery-1.6.2.js" type="text/javascript"></script>
<script src="js/topnavi.js" type="text/javascript"></script>
<script>
	function check(){
		var linkman = document.getElementById("linkman").value;
		var phone = document.getElementById("phone").value;
		var company = document.getElementById("company").value;
		
		if (linkman.length==0){
			alert('请输入联系人！');
			return false;
		}else if (phone.length==0){
			alert('请输入联系方式！');
			return false;
		}else if (company.length==0){
			alert('请输入企业名称！');
			return false;
		}

		return true;
	}
</script>
<script charset="UTF-8" src="js/bundle.js"></script>
<script charset="UTF-8" src="js/iframeWidget.js"></script>
<script type="text/javascript" charset="UTF-8" src="js/bw.js"></script>

<link rel="stylesheet" type="text/css" href="css/m-front-icon.css" />
<script type="text/javascript" language="javascript" id="BDBridgeSendData" src="js/Enter.php" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="css/m-front-mess.css" />
<link rel="stylesheet" type="text/css" href="css/m-front-invite.css" />
<link type="text/css" rel="stylesheet" href="css/m-webim-lite.css" />
<script type="text/javascript" language="javascript" id="BDBridgeReport" src="js/Refresh.php" charset="UTF-8"></script>
</head>

<body>
{include file="menu.tpl"}

<!--企业开始-->
<div class="qiye-box">
	<div class="container">
          <p style="padding:10px 0px;"><img src="images/newqiye02_1.jpg" width="1098" height="405"></p>
          <div style="border:1px solid #ececec;">
           
		<p><img src="images/action_1.jpg" width="1098" height="655"></p>
		<!--留言板 start-->
		<div class="qiye-form" style="border:0;">
			<h3>请填写以下信息，我们会尽快与您联系！</h3>
			<div class="qiye-biaodan">

			   <form id="qiye_form" action="" method="post" onsubmit="return check();">
			   <table width="98%">
				  <tbody><tr>
					 <td width="11%">联系人：</td>
					 <td> <input type="text" class="zhanghu-input01" name="linkman" id="linkman"/></td>
				  </tr>
				  <tr valign="top">
					 <td>联系电话：</td>
					 <td> <input type="text" class="zhanghu-input01" name="phone" id="phone"/><br>
						   <span class="red-small">为了保障您的利益，请填写有效联系电话！</span>
					 </td>
				  </tr>
				  <tr>
					 <td>公司名称：</td>
					 <td> <input type="text" class="zhanghu-input01" name="company" id="company"/></td>
				  </tr>
				  <tr valign="top">
					 <td>您的需求：</td>
					 <td> <textarea style="width:425px; height:130px;" name="demand" id="demand"></textarea></td>
				  </tr>
				  <tr>
					 <td><input type="hidden" name="act" value="create"/></td>
					 <td><input type="image" src="images/btn-sure.jpg" width="68" height="26" /></td>
				  </tr>
			   </tbody></table>
			   </form>

			</div>
		</div>
		<!--留言板 end-->
		<p><img src="images/show.jpg" width="1098" height="404"></p>
		<p><img src="images/newqiye02.jpg"></p>
		<p><img src="images/newqiye03.jpg"></p>
		<p><img src="images/newqiye04.jpg"></p>
		<p><img src="images/newqiye05.jpg"></p>
		<p><img src="images/newqiye06.jpg"></p>
		<p><img src="images/newqiye07.jpg"></p>
          </div>

   
	</div>
</div>
<!--企业结束->

<!--footer  end-->

<!--footer  end-->
{include file="footer.tpl"}
<script type="text/javascript">
	var ret = '{$ret}';

	if(ret==1){
		alert('感谢您的留言，我们会尽快与您联系！');
	}
</script>
</body></html>