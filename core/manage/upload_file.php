<?php
require_once("check2.php");

//1.上传文件类型
$filetype = getFileType($_FILES["file"]["name"]);
$filetype = strtolower($filetype);

//2.上传文件大小
$filesize = ($_FILES["file"]["size"] / 1024);
//3.当前日期
$showtime = date("Y-m-d");
//4.原input id赋值
$parentid = $_REQUEST["parentid"];
//5.原ID值是否叠加
$parentadd = $_REQUEST["parentadd"];

//定义允许上传的文件扩展名
$ext_arr = array('gif','jpg','png','bmp','zip','rar','doc','flv');

if (in_array($filetype, $ext_arr) === true
	&& ($filesize < 50000))
  {
  	if ($_FILES["file"]["error"] > 0)
    {
    	echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  	else
    {
	    //创建上传文件名
	    $create_file = createFileName().".".$filetype;
	    //上传目录
	    $path = "../../upload/".$showtime."/";
	    //完整文件地址
	    $fullname = "upload/".$showtime."/".$create_file;
    	//创建目录
    	if (!file_exists($path))  {    mkdir($path); }
     
    	if (file_exists($path . $create_file))
      	{
      		//echo $_FILES["file"]["name"] . " already exists. ";
      	}
    	else
      	{
      		move_uploaded_file($_FILES["file"]["tmp_name"],$path . $create_file);
      		
      		$realtype = file_type2($path . $create_file);
	
			//检查扩展名
			if (in_array($realtype, $ext_arr) === false) {
				if(unlink($path . $create_file)){
					echo "<script>";
		      		echo "alert('上传文件含恶意代码，已删除！');";
		      		
		      		if($parentadd){
		      			
		      		}else{
		      			echo "window.parent.document.getElementById('".$parentid."').value='';";
		      		}
		      		echo "window.parent.ClosePop();"; 
		      		//Response.Write("window.parent.closeWindow();"); 
		      		echo "</script>";
				}
			}else{
				echo "<script>";
	      		echo "alert('上传成功');";
	      		
				if($parentadd=='true'){
	      			echo "window.parent.document.getElementById('".$parentid."').value=window.parent.document.getElementById('".$parentid."').value+',".$fullname."';";
	      		}else{
	      			echo "window.parent.document.getElementById('".$parentid."').value='".$fullname."';";
	      		}
	      		echo "window.parent.ClosePop();"; 
	      		echo "</script>";	
			}
      		//echo "Stored in: " . $path . $create_file;
      		
      	}
    }
  }
else
  {
  	echo "上传出错，请检测文件后重试";
  }
  
  
  
  
  /**
 * 检测文件真实类型
 * @param $filename
 */
function file_type2($filename)
{
    $file = fopen($filename, "rb");
    $bin = fread($file, 2); //只读2字节
    fclose($file);
    $strInfo = @unpack("C2chars", $bin);
    $typeCode = intval($strInfo['chars1'].$strInfo['chars2']);
    $fileType = '';
    switch ($typeCode)
    {
        case 7790:
            $fileType = 'exe';
            break;
        case 7784:
            $fileType = 'midi';
            break;
        case 8297:
            $fileType = 'rar';
            break;        
		case 8075:
            $fileType = 'zip';
            break;
        case 255216:
            $fileType = 'jpg';
            break;
        case 7173:
            $fileType = 'gif';
            break;
        case 6677:
            $fileType = 'bmp';
            break;
        case 13780:
            $fileType = 'png';
            break;
        case 208207:
        	$fileType = 'doc';
        default:
            $fileType = 'unknown: '.$typeCode;
    }

	//Fix
	if ($strInfo['chars1']=='-1' AND $strInfo['chars2']=='-40' ) return 'jpg';
	if ($strInfo['chars1']=='-119' AND $strInfo['chars2']=='80' ) return 'png';

    return $fileType;
}
?>