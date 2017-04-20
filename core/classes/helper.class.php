<?php
class SQLHelper{
		
	
	//静态属性$instance   
    static private $instance = NULL;  
    
    public $_url;     //主机
    public $_user;    //用户
    public $_dbpass; //密码
    public $_db;     //数据库名称
    public $dbport = '3306';     //端口号
    public $errno;      //错误号
    public $error;      //错误内容
     
    public $mysqli;     //mysqli连接对象句柄
    public $query;      //query结果
    public $result;     //查询的结果集
    public $aff_rows;   //受影响的行数
    public $num_rows;   //查询结果条数
    
    public $_chart; 
        
    //getInstance静态成员方法   
    static function getInstance()  
    {  
        //如果对象实例还没有被创建，则创建一个新的实例   
        if (self::$instance == NULL)  
        {   self::$instance = new SQLHelper();
        }  
        //返回对象实例   
        return self::$instance;  
    }  
        
    //空构造函数      
    private function SQLHelper()  
    { 
    	$this->_url = 'localhost';
    	$this->_db = 'www_sxw';
    	$this->_user = 'root'; 
    	$this->_password = '123456';  
    	$this->_chart = "SET NAMES 'UTF8'";
    	
        $this->init();
    }  
        
    //空克隆成员函数   
    private function __clone()  
    {   
    }  
    
    private function init(){
        //连接数据库
        $this->mysqli = new mysqli($this->_url, $this->_user, $this->_password, $this->_db, $this->dbport);

        if($this->mysqli->connect_error){

            die('Connect Error ('.$this->mysqli->connect_errno.')'.$this->mysqli->connect_error);

        }
        
        $this->mysqli->query($this->_chart);
    }
    
    public function getConnection(){
    	
        $this->mysqli = new mysqli($this->_url, $this->_user, $this->_password, $this->_db) or ('error to connection mysql');
    	
        $this->mysqli->query($this->_chart);
        
    	return $this->mysqli;
    }
        
    //查询
    public function query($sql){
        
        $this->getConnection();
        
        $array=array();
        
        $result = $this->mysqli->query($sql);
//       echo $sql;
		if(!empty($result) && count($result)>0){
			while($row=mysqli_fetch_array($result)){
	            $array[] = $row;
	        }
	        
	        return $array;
		}

		return null;
    }
   //查询
    public function queryForMap($sql){
        
        $this->getConnection();
        
        $array=array();
        
        $result = $this->mysqli->query($sql);
//       echo $sql;
		if(!empty($result) && count($result)>0){
			while($row=mysqli_fetch_array($result)){
	            $array[] = $row;
	        }
	        
	        return $array[0];
		}

		return null;
    }
    public function queryObject($sql){
        $this->getConnection();
        
        $array=array();
		
        $result = $this->mysqli->query($sql);
    
//        echo $sql;
        if(!is_null($result) && count($result)==1){
        	while($row=mysqli_fetch_array($result)){
	            $array[] = $row;
	        }
			
			if(!empty($array)){
				foreach($array as $b){
					$ret = $b[0];
				}
			}
			
			return $ret;
        }
        else{
        	return null;
        }
    }
     
    public function execute($sql){
        
        $mysqli = new mysqli($this->_url, $this->_user, $this->_password, $this->_db);
        
        $mysqli->query("SET NAMES UTF8");
        
        mysqli_query($mysqli,'SET NAMES UTF8');
        
		$mysqli->query($sql);
	
		return mysqli_affected_rows($mysqli);
    }
    
    public function executeTrance($sql_array){
        
       $mysqli = new mysqli($this->_url, $this->_user, $this->_password, $this->_db); 
       
       $mysqli->autocommit(false);
      
	   //SQL数组长
       $c = count($sql_array);
    	
       if($c>0){
    		
	    	foreach($sql_array as $key => $value){
	    	    $mysqli->query($value);
			}
			
			if(!$mysqli->errno){ 
			    $mysqli->commit();
			    
			    return 1;
			}
			else{
			    $mysqli->rollback();
			    
			    return -1;
			}
    	}		
    	
    	return 0;
    }
}
?>