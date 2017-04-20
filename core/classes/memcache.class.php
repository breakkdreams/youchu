<?php
/**
 * Memcache PHP 客户端使用
 * @author sunwei
 * 2013-08-10
 */
final class MemcacheHelper{
		
	//静态属性$instance   
    static private $instance = NULL;  
    
    //一个普通的成员属性   
    static private $_memcache=NULL;  
    
    //服务器地址
    private $_url = '';
    
    //端口
    private $_port = '';
    
    //设置有效期  单位 秒
    private $_time = '';
    
    //是否开启缓存
    private $_cache = false;
        
    //getInstance静态成员方法   
    static function getInstance()  
    {  
        //如果对象实例还没有被创建，则创建一个新的实例   
        if (self::$instance == NULL)  
        {  
            self::$instance = new MemcacheHelper();  
        }  
        //返回对象实例   
        return self::$instance;  
    }  
        
    //空构造函数      
    private function MemcacheHelper()  
    {  
    	$this->_url = _mem_url;
    	$this->_port = _mem_port;
    	$this->_time = _mem_time;
    	$this->_cache = _mem_cache;
    	 
        $this->init();
    }  
       
    //空克隆成员函数   
    private function __clone()  
    {   
    }  
    
    private function init(){
    	if($this->_memcache==NULL){
    		//echo 'init memcache<br>';
    		$this->_memcache = new Memcache;
    		$this->_memcache->connect($this->_url,$this->_port);
    	}	 
    }
    
    private function getMemcache(){
    	if($this->_cache){
    		return NULL;
    	}else{
	    	$this->init();
	    	return $this->_memcache;	
    	}
    }
        
    /**
     * 添加缓存内容
     * @param unknown_type $memcache_obj 链接对象
     * @param unknown_type $key 缓存KEY
     * @param unknown_type $value 缓存内容
     */
    public function set($key,$value){
    	$obj = $this->getMemcache();
    	
    	if($obj){
    		$obj->add($key,$value, 0, 30);	
    	}   
    }
    
    /**
     * 缓存内容替代
     * @param unknown_type $memcache_obj 链接对象
     * @param unknown_type $key 缓存key
     * @param unknown_type $value 缓存内容
     */
    public function replace($memcache_obj,$key,$value){
    	
    	$obj = $this->getMemcache();
    	
    	if($obj){
    		$obj->replace($key, $value, FALSE, $_time); //FLASE 非压缩
    	}
    }
    
    /**
     * 读取缓存内容
     * @param unknown_type $memcache_obj 链接对象
     * @param unknown_type $key 缓存KEY
     */
    public function get($key){
    	$obj = $this->getMemcache();
    	
    	if($obj){
    		return $obj->get($key);
    	}
    }

    /**
     * 清除所有缓存内容
     * @param unknown_type $memcache_obj 链接对象
     */
    public function flush(){
    	$obj = $this->getMemcache();
    	
    	if($obj){
    		$obj->flush();
    	}
    }
    
    /**
     * 删除某一项缓存内容
     * @param unknown_type $memcache_obj 链接对象
     * @param unknown_type $key 缓存KEY
     */
    public function delete($memcache_obj,$key){
    	$obj = $this->getMemcache();
    	
    	if($obj){
    		return $obj->delete($key,0);
    	}
    }
}
?>