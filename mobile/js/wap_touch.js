var _gaq = _gaq || []; 
_gaq.push(['_setAccount', 'UA-348109-10']); 
_gaq.push(['_addOrganic', 'baidu', 'word']); 
_gaq.push(['_addOrganic', 'soso', 'w']); 
_gaq.push(['_addOrganic', 'youdao', 'q']); 
_gaq.push(['_addOrganic', 'sogou', 'query']); 
_gaq.push(['_addOrganic', '360', 'q']);
_gaq.push(['_setDomainName', '.meishichina.com']); 
_gaq.push(['_setAllowHash', false]); 
_gaq.push(['_setAllowAnchor', true]);
_gaq.push(['_trackPageview']); 
_gaq.push(['_trackPageLoadTime']); 
(function() { 
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; 
ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); 
})(); 
window.onscroll = function() {
	var wint = document.documentElement.scrollTop;
	if(wint==0)
	wint = document.body.scrollTop;
	var omng = document.getElementById("s_t1");
	var head = document.getElementById("header");
	if(omng){
	if (omng.offsetTop < wint - 5)
		omng.style.position = 'fixed';
	else
		omng.style.position = 'static';
	}}
function close(){document.getElementById("wap_head_d").style.display="none";}
function $(id){return document.getElementById(id);} 
function toggle(o,id,m,l){c=$(id);if(c.style.display=='none'){c.style.display='';}else{c.style.display='none';} return false;}