{if $manage_type eq '0'}
<div class="sidebar-nav">
		{if $manage_right|strpos:"商品性质"!==false}
        <a href="#dashboard-menu" class="nav-header {$left_class_open1|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-dashboard"></i>商品性质<i class="icon-chevron-up"></i></a>
        <!-- in -->
        <ul id="dashboard-menu" class="nav nav-list collapse{$left_class1|default:''}">
        	{if $manage_right|strpos:"商品品牌"!==false}<li><a href="product_brand.php">商品品牌</a></li>{/if}
            {if $manage_right|strpos:"商品栏目"!==false}<li><a href="product_menu.php">商品栏目</a></li>{/if}
            {if $manage_right|strpos:"商品类型"!==false}<li><a href="product_type.php">商品类型</a></li>{/if}
            {if $manage_right|strpos:"SKU管理"!==false}<li><a href="sku.php">SKU管理</a></li>{/if}          
        </ul>
        {/if}

		{if $manage_right|strpos:"商品管理"!==false}
        <a href="#accounts-menu" class="nav-header {$left_class_open2|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-briefcase"></i>商品管理<i class="icon-chevron-up"></i></a>
        <ul id="accounts-menu" class="nav nav-list collapse {$left_class2|default:''}">
            {if $manage_right|strpos:"添加商品"!==false}<li><a href="product_create.php">添加商品</a></li>{/if}
            {if $manage_right|strpos:"在售商品"!==false}<li><a href="product_list.php">在售商品</a></li>{/if}
            {if $manage_right|strpos:"下架商品"!==false}<li><a href="product_offline.php">下架商品</a></li>{/if}
            {if $manage_right|strpos:"促销商品"!==false}<li><a href="product_list.php?type=3">促销商品</a></li>{/if}
            {if $manage_right|strpos:"回收站"!==false}<li><a href="product_delete.php">回收站</a></li>{/if}  
        </ul>
        {/if}
        
        {if $manage_right|strpos:"会员管理"!==false}
        <a href="#legal-member" class="nav-header {$left_class_open3|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-legal"></i>会员管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-member" class="nav nav-list collapse {$left_class3|default:''}">
        	{if $manage_right|strpos:"会员列表"!==false}<li><a href="member_list.php">会员列表</a></li>{/if}
            {if $manage_right|strpos:"会员等级"!==false}<li><a href="member_level.php">会员等级</a></li>{/if}
            {if $manage_right|strpos:"会员分组"!==false}<li><a href="member_group.php">会员分组</a></li>{/if}
        </ul>
        {/if}
        
        {if $manage_right|strpos:"订单管理"!==false}
        <a href="#legal-menu" class="nav-header {$left_class_open4|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-legal"></i>订单管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-menu" class="nav nav-list collapse {$left_class4|default:''}">
        	{if $manage_right|strpos:"待支付"!==false}<li><a href="order_list.php">待支付</a></li>{/if}
            {if $manage_right|strpos:"待发货"!==false}<li><a href="order_list2.php">待发货</a></li>{/if}
            {if $manage_right|strpos:"已发货"!==false}<li><a href="order_list3.php">已发货</a></li>{/if}
            {if $manage_right|strpos:"已完成"!==false}<li><a href="order_list4.php">已完成</a></li>{/if}
            {if $manage_right|strpos:"申请退货"!==false}<li><a href="order_list5.php">申请退货</a></li>{/if}
        </ul>
		{/if}

<!--		{if $manage_right|strpos:"促销活动"!==false}-->
<!--        <a href="#error-menu" class="nav-header {$left_class_open5|default:'collapsed'}" data-toggle="collapse">-->
<!--        <i class="icon-exclamation-sign"></i>促销活动<i class="icon-chevron-up"></i></a>-->
<!--        <ul id="error-menu" class="nav nav-list collapse {$left_class5|default:''}">-->
<!--        	{if $manage_right|strpos:"单品促销"!==false}<li><a href="act_single.php">单品促销</a></li>{/if}-->
<!--            {if $manage_right|strpos:"买送促销"!==false}<li><a href="act_ms.php">买送促销</a></li>{/if}-->
<!--            {if $manage_right|strpos:"赠品促销"!==false}<li><a href="act_zp.php">赠品促销</a></li>{/if}-->
<!--            {if $manage_right|strpos:"套装促销"!==false}<li><a href="act_tz.php">套装促销</a></li>{/if}-->
<!--            {if $manage_right|strpos:"满减促销"!==false}<li><a href="act_mj.php">满减促销</a></li>{/if}-->
<!--            {if $manage_right|strpos:"活动专题"!==false}<li><a href="act_zt.php">活动专题</a></li>{/if}-->
<!--            {if $manage_right|strpos:"优惠券"!==false}<li><a href="act_ticket.php">优惠券</a></li>{/if}-->
<!--        </ul>-->
<!--		{/if}-->
		
<!--		{if $manage_right|strpos:"咨询评价"!==false}-->
<!--        <a href="#legal-comment" class="nav-header {$left_class_open6|default:'collapsed'}" data-toggle="collapse">-->
<!--        <i class="icon-comment"></i>咨询评价<i class="icon-chevron-up"></i></a>-->
<!--        <ul id="legal-comment" class="nav nav-list collapse{$left_class6|default:''}">-->
<!--            {if $manage_right|strpos:"商品评价"!==false}<li><a href="comment_list.php">商品评价</a></li>{/if}-->
<!--            {if $manage_right|strpos:"商品咨询"!==false}<li><a href="consultant_list.php">商品咨询</a></li>{/if}-->
<!--            {if $manage_right|strpos:"咨询类型"!==false}<li><a href="consultant_type.php">咨询类型</a></li>{/if}-->
<!--        </ul>-->
<!--		{/if}-->

		{if $manage_right|strpos:"文章管理"!==false}
		<a href="#legal-news" class="nav-header {$left_class_open7|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>文章管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-news" class="nav nav-list collapse {$left_class7|default:''}">
        	{if $manage_right|strpos:"文章类型"!==false}<li><a href="news_type.php">文章类型</a></li>{/if}
            {if $manage_right|strpos:"发布文章"!==false}<li><a href="news_create.php">发布文章</a></li>{/if}
            {if $manage_right|strpos:"文章列表"!==false}<li><a href="news.php">文章列表</a></li>{/if}
        </ul>
        {/if}
        
        {if $manage_right|strpos:"广告管理"!==false}
        <a href="#legal-ad" class="nav-header {$left_class_open8|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>广告管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-ad" class="nav nav-list collapse {$left_class8|default:''}">
            {if $manage_right|strpos:"广告位置"!==false}<li><a href="ad_place.php">广告位置</a></li>{/if}
            {if $manage_right|strpos:"发布广告"!==false}<li><a href="ad_create.php">发布广告</a></li>{/if}
            {if $manage_right|strpos:"广告列表"!==false}<li><a href="ad_list.php">广告列表</a></li>{/if}
        </ul>
        {/if}
        
        {if $manage_right|strpos:"商城管理"!==false}
        <a href="#legal-content" class="nav-header {$left_class_open9|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>商城管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-content" class="nav nav-list collapse {$left_class9|default:''}">
            
            <!-- <li ><a href="help_list.php">帮助中心</a></li> -->
            
            {if $manage_right|strpos:"导航菜单"!==false}<li><a href="menu_list.php">导航菜单</a></li>{/if}
            {if $manage_right|strpos:"配送范围"!==false}<li><a href="area_list.php">配送范围</a></li>{/if}
            {if $manage_right|strpos:"管理员账号"!==false}<li><a href="user_list.php">管理员账号</a></li>{/if}
            {if $manage_right|strpos:"友情链接"!==false}<li><a href="link_list.php">友情链接</a></li>{/if}
            {if $manage_right|strpos:"商家管理"!==false}<li><a href="seller_list.php">商家管理</a></li>{/if}
        </ul>
        {/if}
        
        {if $manage_right|strpos:"报表统计"!==false}
        <a href="#legal-chart" class="nav-header {$left_class_open10|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>报表统计<i class="icon-chevron-up"></i></a>
        <ul id="legal-chart" class="nav nav-list collapse {$left_class10|default:''}">
            {if $manage_right|strpos:"在线用户"!==false}<li><a href="count_member.php">在线用户</a></li>{/if}
            {if $manage_right|strpos:"搜索分析"!==false}<li><a href="count_search.php">搜索分析</a></li>{/if}
            {if $manage_right|strpos:"商品统计"!==false}<li><a href="count_product.php">商品统计</a></li>{/if}
            {if $manage_right|strpos:"销售明细"!==false}<li><a href="count_sale.php">销售明细</a></li>{/if}
            {if $manage_right|strpos:"订单统计"!==false}<li><a href="count_order.php">订单统计</a></li>{/if}
            {if $manage_right|strpos:"地区统计"!==false}<li><a href="count_area.php">地区统计</a></li>{/if}
            {if $manage_right|strpos:"客户端统计"!==false}<li><a href="count_client.php">客户端统计</a></li>{/if}
        </ul>
        {/if}
        
        {if $manage_right|strpos:"支付接口"!==false}
        <a href="#legal-pay" class="nav-header {$left_class_open11|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>支付接口<i class="icon-chevron-up"></i></a>
        <ul id="legal-pay" class="nav nav-list collapse {$left_class11|default:''}">
            {if $manage_right|strpos:"支付宝"!==false}<li><a href="pay_ali.php">支付宝</a></li>{/if}
            {if $manage_right|strpos:"微信支付"!==false}<li><a href="pay_weixin.php">微信支付</a></li>{/if}
            {if $manage_right|strpos:"网银在线"!==false}<li><a href="pay_bank.php">网银在线</a></li>{/if}
        </ul>
        {/if}
        
        {if $manage_right|strpos:"系统设置"!==false}
        <a href="#legal-system" class="nav-header {$left_class_open12|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>系统设置<i class="icon-chevron-up"></i></a>
        <ul id="legal-system" class="nav nav-list collapse {$left_class12|default:''}">
            {if $manage_right|strpos:"站点信息"!==false}<li><a href="sys_site.php">站点信息</a></li>{/if}
            {if $manage_right|strpos:"邮箱设置"!==false}<li><a href="sys_email.php">邮箱设置</a></li>{/if}
            {if $manage_right|strpos:"短信设置"!==false}<li><a href="sys_sms.php">短信设置</a></li>{/if}
            {if $manage_right|strpos:"积分设置"!==false}<li><a href="sys_record.php">积分设置</a></li>{/if}
            {if $manage_right|strpos:"性能设置"!==false}<li><a href="sys_cache.php">性能设置</a></li>{/if}
            {if $manage_right|strpos:"禁止IP"!==false}<li><a href="sys_ip.php">禁止IP</a></li>{/if}
            {if $manage_right|strpos:"热门搜索"!==false}<li><a href="sys_search.php">热门搜索</a></li>{/if}
        </ul>
        {/if}
        
    </div>
{else}
<div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header {$left_class_open1|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-dashboard"></i>商品性质<i class="icon-chevron-up"></i></a>
        <!-- in -->
        <ul id="dashboard-menu" class="nav nav-list collapse{$left_class1|default:''}">
        	<li><a href="product_brand.php">商品品牌</a></li>
            <li><a href="product_menu.php">商品栏目</a></li>
            <li><a href="product_type.php">商品类型</a></li>
            <li><a href="sku.php">SKU管理</a></li>     
        </ul>

        <a href="#accounts-menu" class="nav-header {$left_class_open2|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-briefcase"></i>商品管理<i class="icon-chevron-up"></i></a>
        <ul id="accounts-menu" class="nav nav-list collapse {$left_class2|default:''}">
            <li><a href="product_create.php">添加商品</a></li>
            <li><a href="product_list.php">在售商品</a></li>
            <li><a href="product_offline.php">下架商品</a></li>
            <li><a href="product_list.php?type=3">促销商品</a></li>
            <li><a href="product_delete.php">回收站</a></li> 
        </ul>
        
        <a href="#legal-member" class="nav-header {$left_class_open3|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-legal"></i>会员管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-member" class="nav nav-list collapse {$left_class3|default:''}">
        	<li><a href="member_list.php">会员列表</a></li><!--
            <li><a href="member_level.php">会员等级</a></li>
            --><li><a href="member_group.php">会员分组</a></li>
        </ul>
        
        <a href="#legal-menu" class="nav-header {$left_class_open4|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-legal"></i>订单管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-menu" class="nav nav-list collapse {$left_class4|default:''}">
        	<li><a href="order_list.php">待支付</a></li>
            <li><a href="order_list2.php">待发货</a></li>
            <li><a href="order_list3.php">已发货</a></li>
            <li><a href="order_list4.php">已完成</a></li>
            <li><a href="order_list5.php">申请退货</a></li>
        </ul>

<!--        <a href="#error-menu" class="nav-header {$left_class_open5|default:'collapsed'}" data-toggle="collapse">-->
<!--        <i class="icon-exclamation-sign"></i>促销活动<i class="icon-chevron-up"></i></a>-->
<!--        <ul id="error-menu" class="nav nav-list collapse {$left_class5|default:''}">-->
<!--        	<li><a href="act_single.php">单品促销</a></li>-->
<!--            <li><a href="act_ms.php">买送促销</a></li>-->
<!--            <li><a href="act_zp.php">赠品促销</a></li>-->
<!--            <li><a href="act_tz.php">套装促销</a></li>-->
<!--            <li><a href="act_mj.php">满减促销</a></li>-->
<!--            <li><a href="act_zt.php">活动专题</a></li>-->
<!--            <li><a href="act_ticket.php">优惠券</a></li>-->
<!--        </ul>-->

<!--        <a href="#legal-comment" class="nav-header {$left_class_open6|default:'collapsed'}" data-toggle="collapse">-->
<!--        <i class="icon-comment"></i>咨询评价<i class="icon-chevron-up"></i></a>-->
<!--        <ul id="legal-comment" class="nav nav-list collapse{$left_class6|default:''}">-->
<!--            <li><a href="comment_list.php">商品评价</a></li>-->
<!--            <li><a href="consultant_list.php">商品咨询</a></li>-->
<!--            <li><a href="consultant_type.php">咨询类型</a></li>-->
<!--        </ul>-->

		<a href="#legal-news" class="nav-header {$left_class_open7|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>文章管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-news" class="nav nav-list collapse {$left_class7|default:''}">
        	<li><a href="news_type.php">文章类型</a></li>
            <li><a href="news_create.php">发布文章</a></li>
            <li><a href="news.php">文章列表</a></li>
        </ul>
        
        <a href="#legal-ad" class="nav-header {$left_class_open8|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>广告管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-ad" class="nav nav-list collapse {$left_class8|default:''}">
            <li><a href="ad_place.php">广告位置</a></li>
            <li><a href="ad_create.php">发布广告</a></li>
            <li><a href="ad_list.php">广告列表</a></li>
        </ul>
        
        <a href="#legal-content" class="nav-header {$left_class_open9|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>商城管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-content" class="nav nav-list collapse {$left_class9|default:''}">
            
            <!-- <li ><a href="help_list.php">帮助中心</a></li> -->
            
            <li><a href="menu_list.php">导航菜单</a></li>
            <li><a href="area_list.php">配送范围</a></li>
            <li><a href="user_list.php">管理员账号</a></li>
            <li><a href="link_list.php">友情链接</a></li>
            <li><a href="seller_list.php">商家管理</a></li>
        </ul>
        
        <a href="#legal-chart" class="nav-header {$left_class_open10|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>报表统计<i class="icon-chevron-up"></i></a>
        <ul id="legal-chart" class="nav nav-list collapse {$left_class10|default:''}">
            <li><a href="count_member.php">在线用户</a></li>
            <li><a href="count_search.php">搜索分析</a></li>
            <li><a href="count_product.php">商品统计</a></li>
            <li><a href="count_sale.php">销售明细</a></li>
            <li><a href="count_order.php">订单统计</a></li>
            <li><a href="count_area.php">地区统计</a></li>
            <li><a href="count_client.php">客户端统计</a></li>
        </ul>
        
        <a href="#legal-pay" class="nav-header {$left_class_open11|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>支付接口<i class="icon-chevron-up"></i></a>
        <ul id="legal-pay" class="nav nav-list collapse {$left_class11|default:''}">
            <li><a href="pay_ali.php">支付宝</a></li>
            <li><a href="pay_weixin.php">微信支付</a></li>
            <li><a href="pay_bank.php">网银在线</a></li>
        </ul>
        
        <a href="#legal-system" class="nav-header {$left_class_open12|default:'collapsed'}" data-toggle="collapse">
        <i class="icon-exclamation-sign"></i>系统设置<i class="icon-chevron-up"></i></a>
        <ul id="legal-system" class="nav nav-list collapse {$left_class12|default:''}">
            <li><a href="sys_site.php">站点信息</a></li>
            <li><a href="sys_email.php">邮箱设置</a></li>
            <li><a href="sys_sms.php">短信设置</a></li>
            <li><a href="sys_record.php">积分设置</a></li>
            <li><a href="sys_cache.php">性能设置</a></li>
            <li><a href="sys_ip.php">禁止IP</a></li>
            <li><a href="sys_search.php">热门搜索</a></li>
        </ul>
    </div>
{/if}