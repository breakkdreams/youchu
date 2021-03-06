<?php 
	require('index.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>电子地图标注</title>
<style type="text/css">
 body{font-size:12px;}
</style>
<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.0&services=true" ></script>
<script type="text/javascript">  

var marker=null;
var map=null;
var infoWindow=null;
function KesionDotccMap(){
	map = new BMap.Map("KesionMap");          // 创建地图实例  
	var point = new BMap.Point(120.766854,30.761028);  // 创建点坐标  
	
	map.centerAndZoom(point, 16);                 // 初始化地图，设置中心点坐标和地图级别  
	
	//添加缩放控件
	map.addControl(new BMap.NavigationControl());  
	map.addControl(new BMap.ScaleControl());  
	map.addControl(new BMap.OverviewMapControl()); 

    showMark();
	
	map.addEventListener("click", function(e){ 
	map.removeOverlay(marker);   
 	var point = new BMap.Point(e.point.lng, e.point.lat);   
	map.centerAndZoom(point, 16);  
	
	marker = new BMap.Marker(point);         // 创建标注   
	map.addOverlay(marker);                     // 将标注添加到地图中  
	
    var sContent ="<div style='text-align:center;font-size:12px;margin:0 0 5px 0;padding:0.2em 0'>当前坐标:<font color=#ff6600>"+e.point.lng+","+ e.point.lat+"</font><br/>您确定在此位置做标注吗?<br/><br/><input type='button' value='确定返回' style='background:#f1f1f1;border:1px solid #cccccc' onclick='addMark("+e.point.lng+","+e.point.lat+",true)'/> <input type='button' value='确定继续' style='background:#f1f1f1;border:1px solid #cccccc' onclick='addMark("+e.point.lng+","+e.point.lat+",false)'/> <input type='button' value='取消' style='background:#f1f1f1;border:1px solid #cccccc' onclick='removeMark()'/></div>"
	
   infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
	marker.addEventListener("click", function(){										
   this.openInfoWindow(infoWindow);	}); 
	map.openInfoWindow(infoWindow, map.getCenter());      // 打开信息窗口 
	//window.setTimeout(function(){map.panTo(new BMap.Point(120.766854,30.761028));}, 2000);
	
    document.getElementById("info").innerHTML ="当前地图中心坐标：" +  e.point.lng + ", " + e.point.lat;  
	
}); 
}

function removeMark(){
	map.removeOverlay(marker);  
	infoWindow.close(); 
}
function addMark(x,y,returnflag){
  var mtext=$("#markvalue");
  if (mtext.val().split('|').length>9){
   alert('对不起,最多只能标注10个地方!');
   return;
  }
  if (mtext.val()=='')
  mtext.val(x+","+y);
  else
  mtext.val(mtext.val()+"|"+x+","+y);
  if (returnflag){
  setOk();
  }
  removeMark();
  showMark();
} 
function showMarkList(v){
  var varr=v.split('|');
  var str='<strong>已添加的标注:</strong><br/>';
  for(var i=0;i<varr.length;i++){
     str+=intToLetter(i+1)+"、"+varr[i]+" <a href=javascript:delMark('"+varr[i]+"')><font color='#ff6600'>删</font></a><br/>";
  }
  $("#marklist").html(str);
}
function showMark(){
 var markv=$("#markvalue").val();
 if (markv==undefined){markv='';};

 if (markv==''||markv==null) return;
 var varr=markv.split('|');
 for (var i=0;i<varr.length;i++){
  var point = new BMap.Point(varr[i].split(',')[0],varr[i].split(',')[1]);   
   addMarker(point, i);   
 }
 showMarkList(markv);
}
function addMarker(point, index){   
  // 创建图标对象   
  var myIcon = new BMap.Icon("http://api.map.baidu.com/img/markers.png", new BMap.Size(23, 25), {   
    offset: new BMap.Size(10, 25),                  // 指定定位位置   
    imageOffset: new BMap.Size(0, 0 - index * 25)   // 设置图片偏移   
  });   
  var marker = new BMap.Marker(point, {icon: myIcon});   
  map.addOverlay(marker);   
}  
function delMark(v){
 if (confirm('确定删除经纬度为'+v+'的标注吗？')){
    var str='';
	var varr=$("#markvalue").val().split('|');
	for (var i=0;i<varr.length;i++){
	   if ("'"+varr[i]+"'"!="'"+v+"'"){
	      if (str==''){ 
		    str=varr[i];
		  }else{
		    str+='|'+varr[i];
		  }
	   }
	}
	//location.reload();
	location.href="baidumap.asp?MapMark="+escape(str);
 }
} 
function intToLetter(id){
    var k = (--id)%26//26代表A~Z 26个英文字母个数.
    var str = "";
    while(Math.floor((id=id/26))!=0){
        str = String.fromCharCode(k+65)+str;//65 代表'A'的ASCII值.
        k=(--id)%26;
    }
    //String.fromCharCode(num):求出num数值对应的字母.num应该为ASCII中的值.
    str = String.fromCharCode(k+65)+str;
    return str;
}
function setOk(){
  if ($("#markvalue").val()==''){
    alert('对不起，还没有添加任何标注，请在左图中添加！');
	return;
  }
  try{
  
  parent.document.getElementById("MapMark").value=$("#markvalue").val();
  
    try{
	  parent.box.close();
	}catch(e){
   parent.closeWindow();
    }
  }catch(e){
  }
  
}
</script> 
</head>
<body onload="KesionDotccMap();" onkeydown="if(event.keyCode==13)KesionDotccMap()">

<div style="width:540px;height:420px;border:1px solid gray; float:left" id="KesionMap"></div>
<div style="margin-top:10px; margin-left:10px; float:left">
	<div style="margin-top:10px; margin-left:3px;"><strong>使用方法：</strong><br/>拖动需要查看地点并点击即可标注</div>
	<div id="info" style="margin-top:10px; margin-left:10px;"></div>
	<input type="hidden" name="markvalue" size=20 value="" id="markvalue" />
	<div id="marklist" style="margin-top:10px; margin-left:10px;"></div>
	<div style="margin-top:10px;text-align:center"><input type='button' value='确定保存以上标志' onclick='setOk()' style='height:23px;background:#f1f1f1;border:1px solid #cccccc' /></div>
</div>

</body>
</html>

