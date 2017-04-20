<?php 
header("Content-Type: text/html; charset=utf-8");
/**
 * Smarty模板+Log4PHP 架构测试网站
 * Author:sunwei
 * Date:2013-08-13
 * Web Version:1.0
 * PHP Version:5.2.1
 * MySQL Version:5
 */

require_once('core/libs/Smarty.class.php');
require_once('core/classes/helper.class.php');
require_once("core/classes/string.class.php");
require_once("core/classes/memcache.class.php");
require_once("core/log4php/Logger.php");
require_once("core/functions/webtools.php");
require_once("core/functions/BasicService.php");
require_once("core/functions/MenuService.php");
require_once("core/functions/ManageService.php");
require_once("core/functions/NewsService.php");
require_once("core/functions/UtilService.php");
require_once("core/functions/FocusService.php");
require_once("core/functions/ProductitemService.php");
require_once("core/functions/TaocanService.php");
require_once("core/functions/BrandService.php");
require_once("core/functions/ProductService.php");
require_once("core/functions/MemberService.php");
require_once("core/functions/OrderService.php");
require_once("core/functions/CartService.php");
require_once("core/functions/ProductMenuService.php");
require_once("core/functions/ProductVarietyService.php");
require_once("core/functions/NewsMenuService.php");
require_once("core/functions/ADService.php");
require_once("core/functions/SellerService.php");
require_once("core/functions/ConsultationService.php");
require_once("core/functions/LinkService.php");
require_once("core/functions/PurchaseService.php");
require_once("core/functions/CityService.php");
require_once("api/util/ValueUtil.php");
require_once("api/util/DateUtil.php");

/***********************加载配置文件*****************************/
$ini_array = parse_ini_file("configs/config.ini");

/***********************项目存放路径*****************************/
define('P_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);


/***********************数据库配置信息***************************/
define('_dburl', $ini_array['dburl']);
define('_dbname', $ini_array['dbname']);
define('_dbuser', $ini_array['dbuser']);
define('_dbpass', $ini_array['dbpass']);
define('_dbchart', $ini_array['dbchart']);

/***********************Smarty模板配置信息***********************/
define('_debugging', $ini_array['debugging']);
define('_caching', $ini_array['caching']);
define('_cache_lifetime', $ini_array['cache_lifetime']);

/***********************Memcache缓存配置信息*********************/
define('_mem_url', $ini_array['mem_url']);
define('_mem_port', $ini_array['mem_port']);
define('_mem_time', $ini_array['mem_time']);
define('_mem_cache', $ini_array['mem_cache']);

/****************************网站基本信息************************/
define('WEB_PATH', $ini_array['web_path']);
define('WEB_NAME', $ini_array['web_name']);
define('WEB_KEYWORD', $ini_array['web_keyword']);
define('WEB_DESCRIBE', $ini_array['web_describe']);
?>