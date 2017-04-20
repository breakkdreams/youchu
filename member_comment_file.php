<?php 
	session_start();
	
	/**
	 * 评论-照片上传
	 */
	require('plugins.php');
	
	if(!empty($_SESSION['_shop_login_id'])){
		$id = $_REQUEST['id'];
		
		if(!empty($id)){
			?>
			
			<html>
			<body style="margin:10px;">
			<script>
				function deletePic(){
					var id = '<?php echo $id;?>';
					
					window.parent.deletePic(id);
					window.parent.light.close();
				}
			</script>
			<form action="member_comment_upload.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file" id="file" /> 
			<input type="hidden" name="parentid" id="parentid" value="<?php echo $id;?>"/>
			<br>
			<input type="submit" name="submit" value="上传" style="margin-top:10px;"/>
			<input type="button" value="删除照片" style="margin-top:10px;" onclick="deletePic();"/>
			</form>
			</body>
			</html>

			<?php 
		}
	}else{
		echo '<script>window.location.href="login.php";</script>';	
	}
?>
