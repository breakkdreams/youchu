<?php 
require_once("check2.php");
?>
<html>
<body style="margin:10px;">

<?php 
	if(!empty($_REQUEST["cloum"])){
?>
<center>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
<label for="file" style="font-size:13px;">文件:</label>
<input type="file" name="file" id="file" /> 
<input type="hidden" name="parentid" id="parentid" value="<?php echo $_REQUEST["cloum"];?>"/>
<input type="hidden" name="parentadd" id="parentadd" value="<?php echo $_REQUEST["add"];?>"/>
<input type="submit" name="submit" value="上传" style="margin-top:10px;"/>
</form>
</center>
<?php }?>
</body>
</html>