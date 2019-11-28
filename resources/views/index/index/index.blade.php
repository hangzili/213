
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title>网站关键词-网站名称</title>
<meta name="description" content="网站描述，一般显示在搜索引擎搜索结果中的描述文字，用于介绍网站，吸引浏览者点击。" />
<meta name="keywords" content="网站关键词" />
<meta name="generator" content="MetInfo 5.1.7" />
<link href="favicon.ico" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="/images/metinfo.css" />
<script src="/images/jQuery1.7.2.js" type="text/javascript"></script>
<script src="/images/ch.js" type="text/javascript"></script>
<script src="http://www.lmlblog.com/winter/templets/xq/js/snowy.js"></script>
<script src="http://www.lmlblog.com/blog/14/js/Snow.js"></script>
<style type="text/css">
.snow-container{position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:100001;}
</style>
<div class="snow-container"></div>
</head>
<body>
<header>
<div class="inner">
<div class="top-logo">
<a href="index.html" title="网站名称" id="web_logo"><img src="/images/logo.png" alt="网站名称" title="网站名称" style="margin:20px 0px 0px 0px;" /></a>

<ul class="top-nav list-none">
<li class="t">
<a href='#' onclick='SetHome(this,window.location,"非IE浏览器不支持此功能，请手动设置！");' style='cursor:pointer;' title='设为首页'  >设为首页</a><span>|</span>
<a href='#' onclick='addFavorite("非IE浏览器不支持此功能，请手动设置！");' style='cursor:pointer;' title='收藏本站'  >收藏本站</a><span>|</span><a class="fontswitch" id="StranLink" href="javascript:StranBody()">繁体中文</a><span>|</span>
<a href='#' title='WAP'>WAP</a><span>|</span>
<a href='#' title='English'  >English</a><span>|</span>
<a href='#' title='我的订单' class='shopweba'>我的订单</a></li><li class="b">
</ul>
</div>

<nav>
<ul class="list-none">
<li id="nav_10001" style='width:121px;' class='navdown'><a href='/index/index/index' class='nav'><span>网站首页</span></a></li>
<li class="line"></li>
@foreach($firsbar_list as $k=>$v)
<li id='nav_1' style='width:121px;'  ><a href='/index/index/list?f_id={{ $v["f_id"] }}' 0  class='hover-none nav'><span>{{ $v['f_name'] }}</span></a></li>
<li class="line"></li>
@endforeach
</ul></nav>
		</div>
	</header>

	<div class="inner met_flash">
<link href='/images/css.css' rel='stylesheet' type='text/css' />
<script src='/images/jquery.bxSlider.min.js'></script>
<div class='flash flash6' style='width:980px; height:245px;'>
<ul id='slider6' class='list-none'>
@foreach($top_img as $k=>$v){
<li><a href='#' target='_blank' ><img src='{{ $v["path"] }} 'width='980' height='245'></a></li>
@endforeach
</ul>
</div>
<script type='text/javascript'>$(document).ready(function(){ $('#slider6').bxSlider({ mode:'vertical',autoHover:true,auto:true,pager: true,pause: 5000,controls:false});});</script></div>

<div class="index inner">
	<div class="aboutus style-1">
		<h3 class="title">
			<span class='myCorner' data-corner='top 5px'>公司简介</span>
			<a href="" class="more" title="链接关键词">更多>></a>
		</h3>
		<div class="active editor clear contour-1"><div>
	<img alt="" src="<?php echo $intro['1']['img'] ?>" style="margin: 8px; width: 196px; float: left; height: 209px; " /></div>
<div style="padding-top:10px;">
<span style="font-size:14px;"><strong>关于&ldquo;{{ $intro['0']['c_title'] }}&rdquo;</strong></span></div>
<div><?php echo $intro['0']['c_content'] ?></div>
<div>&nbsp;</div>
<div><span style="font-size:14px;"><strong>关于&ldquo;{{ $intro['1']['c_title'] }}&rdquo;</strong></span></div><div>
<span style="font-size:12px;"><?php echo $intro['1']['c_content'] ?></span></div>
<div class="clear"></div></div></div>

	<div class="case style-2">
		<h3 class='title myCorner' data-corner='top 5px'><a href="" title="链接关键词" class="more">更多>></a>公司案例</h3>
	  <div class="active dl-jqrun contour-1">
        
<dl class="ind">
<dt><a href="#" target='_self'><img src="{{ $case['0']['img'] }}" alt="图片关键词" title="图片关键词" style="width:116px; height:80px;" /></a></dt>
<dd>
<h4><a href="#" target='_self' title="示例案例六">{{ $case['0']['t_name'] }}</a></h4>
<p class="desc" title="相关描述文字，相关描述文字，相关描述文字，相关描述文字，相关描述文字。"><?php echo $case['0']['c_title']?></p>
</dd>
</dl>

<dl class="ind">
<dt><a href="#" target='_self'><img src="{{ $case['1']['img'] }}" alt="图片关键词" title="图片关键词" style="width:116px; height:80px;" /></a></dt>
<dd>
<h4><a href="#" target='_self' title="示例案例五">{{ $case['1']['t_name'] }}</a></h4>
<p class="desc" title="相关描述文字，相关描述文字，相关描述文字，相关描述文字，相关描述文字。"><?php echo $case['1']['c_title']?></p>
</dd>
</dl>

<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
    
	<div class="index-news style-1">
		<h3 class="title">
			<span class='myCorner' data-corner='top 5px'>{{ $new['0']['t_name'] }}</span>
			<a href="" class="more" title="链接关键词">更多>></a>
		</h3>
		<div class="active clear listel contour-2"><ol class='list-none metlist'>
@foreach($new as $k=>$v)
<li class='list '><span class='time'>2012-07-16</span><a href='/index/index/content?c_id={{ $v["c_id"] }}' >{{ $v['c_title'] }}</a></li>
@endforeach
</ol></div>
	</div>
    
<div class="index-news style-1">
<h3 class="title"><span class='myCorner' data-corner='top 5px'>{{ $client['0']['t_name'] }}</span><a href="" class="more" title="链接关键词">更多>></a></h3>
<div class="active clear listel contour-2"><ol class='list-none metlist'>
@foreach($client as $k=>$v)
<li class='list top'><span class='time'>2012-07-17</span><a href='/index/index/content?c_id={{ $v["c_id"] }}' >{{ $v['c_title'] }}</a></li>
@endforeach

</ol></div>
	</div>
	<div class="index-conts style-2">
		<h3 class='title myCorner' data-corner='top 5px'>
			
			<a href="" title="链接关键词" class="more">更多>></a>{{ $staff['0']['t_name'] }}
		</h3>
<div class="active clear listel contour-2"><ol class='list-none metlist'>
@foreach($staff as $k=>$v)
 <li class='list top'><span class='time'>2012-07-16</span><a href='/index/index/content?c_id={{ $v["c_id"] }}' >{{ $v['c_title'] }}</a></li>
 @endforeach
 </ol></div>
</div>
	<div class="clear p-line"></div>
    
	<div class="index-product style-2">
		<h3 class='title myCorner' data-corner='top 5px'>
			<span></span>
 <div class="flip"><p id="trigger"></p> <a class="prev" id="car_prev" href="javascript:void(0);"></a> <a class="next" id="car_next" href="javascript:void(0);"></a></div>
			<a href=""  class="more">更多>></a>
		</h3>
		<div class="active clear">
			<div class="profld" id="indexcar" data-listnum="5">
			<ol class='list-none metlist'>
			@foreach($downimg as $k=>$v)
 <li class='list'><a href='#'  class='img'><img src='{{ $v["path"] }}'  width='160' height='130' /></a> <h3 style='width:160px;'><a href='#' >{{ $v['name'] }}</a></h3></li>
	@endforeach
 </ol>
			</div>
		</div>
	</div>

	<div class="clear"></div>
	<div class="index-links">
		<h3 class="title">
			
			<a href="" title="链接关键词" class="more">更多>></a>
		</h3>
		<div class="active clear">
			<div class="img"><ul class='list-none'>
</ul>
</div>
			<div class="txt"><ul class='list-none'>
<li><a href='#' target='_blank' title='企业网站管理系统'>MetInfo</a></li>
<li><a href='#' target='_blank' title='企业网站管理系统'>米拓信息</a></li>
</ul>
</div>
		</div>
		<div class="clear"></div>
	</div>

</div>

<footer data-module="10001" data-classnow="10001">
	<div class="inner">
		<div class="foot-nav"><a href='news/news.php?lang=cn&class2=4'  title='公司动态'>公司动态</a><span>|</span><a href='message/'  title='在线留言'>在线留言</a><span>|</span><a href='feedback/'  title='在线反馈'>在线反馈</a><span>|</span><a href='link/'  title='友情链接'>友情链接</a><span>|</span><a href='member/'  title='会员中心'>会员中心</a><span>|</span><a href='search/'  title='站内搜索'>站内搜索</a><span>|</span><a href='sitemap/'  title='网站地图'>网站地图</a><span>|</span><a href='http://gc04430.d215.51kweb.com/admin/'  title='网站管理'>网站管理</a></div>
		<div class="foot-text">
			<p>我的网站 版权所有 2008-2012 湘ICP备88888</p>
<p>电话：0731-12345678 12345678  QQ:88888888 999999  Email:metinfo@metinfo.cn</p>


		</div>
	</div>
</footer>
<script src="/images/fun.inc.js" type="text/javascript"></script>
<div style="text-align:center;">
<p>来源：More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
</div>
</body>
</html>