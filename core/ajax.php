<?php
        require('../plugins.php');
        /*$m_floor = $_POST["m_floor"];
        $m_floorarr= explode(".",$m_floor);
        $m_floor='';
        //var_dump($m_floorarr);
        $item=array();
        $length=count($m_floorarr);
		for($i=0;$i<$length;$i++){
			$m_floor.= $m_floorarr[$i].'\.';
			$menulist=getMenuListEx(substr_replace($m_floor,_,3*$i,1));
			foreach($menulist as $value){			
			    $item[$i][]=array('m_id'=>$value["m_id"],'m_name'=>$value['m_name'],'m_floor'=>$value['m_floor']);
			}
		}
		for($i=0;$i<$length-1;$i++){
			$m_floor.= $m_floorarr[$i].'\.';
			$menulist=getMenuListEx(substr_replace($m_floor,_,3*$i,1));
			foreach($menulist as $value){			
			    $item[$i][]=array('m_id'=>$value["m_id"],'m_name'=>$value['m_name'],'m_floor'=>$value['m_floor']);
			}
		}
		echo urldecode(json_encode($item));*/
        if(!empty($_POST["cmd"])){
        	if($_POST["cmd"]=="register_check"){
        		$ret=0;      		
        		if(!empty($_POST["register_name"])){
        			if(preg_match("/^((\(\d{2,3}\))|(\d{3}\-))?1\d{10}$/",$_POST["register_name"])){
        				$ret=checkRegisterEmail($_POST["register_name"]);
        			}
        			else if(preg_match("/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/",$_POST["register_name"])){
        				$ret=checkRegisterPhone($_POST["register_name"]);
        			}
        			else {
        				$ret=-1;
        			}
        		}
        		echo $ret;
        	}
        	else if($_POST["cmd"]=="information_submit"){
        		
        	}
        }
        
?>