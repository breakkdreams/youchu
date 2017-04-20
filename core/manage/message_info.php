<?php
require_once('check2.php');

if(!empty($_REQUEST["id"])){
	$array = getMessage($_REQUEST["id"]);
	if(!empty($array)){
	   foreach ($array as $b) {
	   	
	   }
	}  

?>

<html>
<head>

</head>

<body>
	<table cellpadding="0" cellspacing="0" style="font-size:13px; line-height: 30px;">
		<tr><td width=100>留言人：</td><td><?php echo $b[1];?></td></tr>
		<tr><td>Email：</td><td><?php echo $b[2];?></td></tr>
		<tr><td>联系电话：</td><td><?php echo $b[3];?></td></tr>
		<tr><td>留言日期：</td><td><?php echo $b[5];?></td></tr>
		<tr><td>留言内容：</td><td><?php echo $b[4];?></td></tr>
		<tr><td></td><td></td></tr>
	</table>
</body>

</html>
<?php }?>