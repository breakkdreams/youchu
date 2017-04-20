<?php echo $_REQUEST['elm2'];?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>xhEditor demo8 : Ajax文件上传</title>
<link rel="stylesheet" href="common.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/xheditor-1.1.14-zh-cn.min.js"></script>
<script type="text/javascript">
$(pageInit);
function pageInit()
{
	$.extend(xheditor.settings,{shortcuts:{'ctrl+enter':submitForm}});
	$('#elm2').xheditor({upLinkUrl:"editor_upload.php?immediate=1",upLinkExt:"zip,rar,txt",
						 upImgUrl:"editor_upload.php?immediate=1",upImgExt:"jpg,jpeg,gif,png",
						 upFlashUrl:"editor_upload.php?immediate=1",upFlashExt:"swf",
						 upMediaUrl:"editor_upload.php?immediate=1",upMediaExt:"wmv,avi,wma,mp3,mid"});
}
function insertUpload(arrMsg)
{
	var i,msg;
	for(i=0;i<arrMsg.length;i++)
	{
		msg=arrMsg[i];
		$("#uploadList").append('<option value="'+msg.id+'">'+msg.localname+'</option>');
	}
}
function submitForm(){
	//$('#frmDemo').submit();
	var str = document.getElementById("elm2").value;
	alert(str);
	if(str==''){
		alert("请输入内容");
		return false;
	}else{
		$('#frmDemo').submit();
	}
}

function check(){
	setTimeout(submitForm,1000);
}
</script>
</head>
<body>

<form method="post" action="?" onsubmit="return check();">
	
	2,立即上传模式:<br />
	<textarea id="elm2" name="elm2" style="width:720px;height:250px;"></textarea>
	<br/>
	<input type="submit" name="save" value="Submit" />
	<input type="reset" name="reset" value="Reset" />
</form>
</body>
</html>