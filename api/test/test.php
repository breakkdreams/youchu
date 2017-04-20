<?php 
    
require('../../plugins.php');
//生成订单
	$order_code = time();
//	$params_array['products'] =  json_decode(str_replace("\\", "",html_entity_decode($params_array['products']))); 
//	$params_array['nums'] =	json_decode(str_replace("\\", "",html_entity_decode($params_array['nums']))); 
//	$params_array['price'] = json_decode(str_replace("\\", "",html_entity_decode($params_array['price']))); 
//	$params_array['products'] =  json_decode(myPOST('products')); 
//	$params_array['nums'] =	json_decode(myPOST('nums'));
//	$params_array['price'] = json_decode(myPOST('price'));
//  list<string>
	$products= json_decode(str_replace("\\", "",html_entity_decode(myPOST('code')))); 	
	set($products);
    ?>  