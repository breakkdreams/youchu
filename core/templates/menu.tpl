
<div class="navBox">
	  <div class="nav">
      	<div class="nav_title"><!--
        	<p><a href="list.php">所有商品分类</a></p>
        	
--><div class="hc_lnav jslist">
	<div class="allbtn">
		<h2><a href="#"><strong>&nbsp;</strong>全部商品分类<i>&nbsp;</i></a></h2>
		<ul style="width:190px;height: auto;" class="jspop box">
			
			{foreach name=list item=item from=$menu}
    		{if $item['m_size'] eq 1}
       		<li class=a1>
				<div class=tx><a href=""><i>&nbsp;</i> {$item['m_name']}</a> </div>
				<dl>
					<dt>推荐</dt>
					<dd>
					{$item['m_name']}
					</dd>
				</dl>
				<div class=pop style="height: 100%">
					<h3><a href="">可口茶食</a></h3>
					{foreach name=list item=item2 from=$menu}
    				{if $item2['m_size'] eq 2 and $item2['m_fid'] eq $item['m_id'] }
    				<dl>
						<dd>
							<a href="list.php?f={$item2['m_floor']}">{$item2['m_name']}</a>
						</dd>
					</dl>
    				{/if}
       				{/foreach}
					<div class=clr></div>
				</div>
			</li>
       		{/if}
       		{/foreach}
       	
       	
		</ul>
	</div>
</div>

        	
        </div>
        <ul class="bigNav">
        	<li><a href="index.php">首页</a></li>
            <li><a href="list.php">所有分类</a></li>
            <li style="padding-right:10px;"><a href="tuan.php">促销活动</a><img src="images/hot.png" /></li>
            <li><a href="ticket.php">提货券</a></li>
            <li style="background-image:none"><a href="#">企业采购</a></li>
        </ul>
        <div class="shoppingCar">
        	<input style="margin-top:10px;" type="image" src="images/gouwuche.png" onclick="window.location.href='cart_list.php';"/>
            <div class="number"><p>{$shop_acount|default:0}</p></div>
            <input style="margin-top:10px; margin-left:20px;" type="image" src="images/jiesuan.png"  onclick="window.location.href='cart_list.php#buy';"/>
            
        </div>
      </div>
    </div>