

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企业网站管理系统</title>
<link href="/admin/images/metinfo.css" rel="stylesheet" />
</head>
<script type="text/javascript" src="/admin/images/jQuery1.7.2.js"></script>
<script type="text/javascript" src="/admin/images/cookie.js"></script>
<script type="text/javascript" src="/admin/images/script.js"></script>
<script type="text/javascript">

function kzqie(my){
	if(my.text()=='宽版'){
		$('#metcmsbox').css('width','100%');
		$.ajax({url : 'include/config.php?lang=cn&met_kzqie=1',type: "POST"});
		my.attr('title','切换到窄版');
		my.text('窄版');
	}else{
		$('#metcmsbox').css('width','1000px');
		$.ajax({url : 'include/config.php?lang=cn&met_kzqie=0',type: "POST"});
		my.attr('title','宽版');
		my.text('宽版');
	}
}
</script>
<?php
	use Illuminate\Support\Facades\Cookie;
	$u_name = Cookie::get('adminuser');
?>
<body id="indexid">
<div id="metcmsbox">
<div id="top"> 
    <div class="floatr">
	  <div class="top-r-box">
		<div class="top-right-boxr">
			<div class="top-r-t">
				您好 <a href="#" id="mydata" title="编辑 admin 的个人资料" class='tui' style="text-decoration:underline;">欢迎{{ $u_name }}登陆</a><span>-</span>
					<a target="_top" href="/admin/login/exit" id="outhome" title="退出" class='tui'>退出登陆</a><span>|
					</span><a href="javascript:;" onclick="kzqie($(this))" title="切换到窄版">窄版</a>
			</div>
	      <div class="langs">

        <div class="langtxt">
			<div class="langkkkbox">
				<div id="langcig">
					<span id="langcion" title="cn">简体中文</span>
				  <span class="langqie">语言设置</span>
				</div>
				<div class="langlist shadow" style="display:none;"></div>
			</div>
			<div class="webyy">网站语言：</div>
		</div>

		  </div>
		</div>
		<div class="nav">
          <ul id="topnav">

            <!-- <li id="metnav_1" class="list">
					<a href="javascript:;" id="nav_1" class="onnav" hidefocus="true">
					<span class="c1"></span>
					系统设置
					</a>
			</li> -->

            <li id="metnav_2" class="list">
					<a href="javascript:;" id="nav_2"  hidefocus="true">
					<span class="c2"></span>
					顶部轮播
					</a>
			</li>

            <li id="metnav_3" class="list">
					<a href="javascript:;" id="nav_3"  hidefocus="true">
					<span class="c3"></span>
						导航栏
					</a>
			</li>

            <li id="metnav_4" class="list">
					<a href="javascript:;" id="nav_4"  hidefocus="true">
					<span class="c4"></span>
					产品轮播
					</a>
			</li>

            <li id="metnav_5" class="list">
					<a href="javascript:;" id="nav_5"  hidefocus="true">
					<span class="c5"></span>
					用户管理
					</a>
			</li>

            <li id="metnav_6" class="list">
					<a href="javascript:;" id="nav_6"  hidefocus="true">
					<span class="c6"></span>
					底部链接
					</a>
			</li>

            <li id="metnav_7" class="list">
					<a href="javascript:;" id="nav_7"  hidefocus="true">
					<span class="c7"></span>
					操作日志
					</a>
			</li>

          </ul>
		</div>
	  </div>
    </div>
    <div class="floatl">
	    <a href="#" hidefocus="true" id="met_logo"><img src="/admin/images/logoen.gif" alt="MetInfo企业网站管理系统" title="MetInfo企业网站管理系统" /></a>
	</div>
</div>
<div id="content">
    <div class="floatl" id="metleft">
        <div class="fast">
	        <a  href="/admin/login/exit" id="hthome" title="切换账号">切换账号</a>
			<span></span>
					<a href="/admin/login/exit" id="hthome" title=退出登陆>退出登陆</a>
		</div>
	    <div class="nav_list" id="leftnav">

<!-- <ul  id="ul_1">
<li ><a href="1.html" target='main' id='nav_1_8' class="on" title="系统信息" hidefocus="true">系统信息</a></li>
<li ><a href="1.html" target='main' id='nav_1_9' title="基本设置" hidefocus="true">基本设置</a></li>
<li ><a href="1.html" target='main' id='nav_1_10' title="语言设置" hidefocus="true">语言设置</a></li>
<li ><a href="1.html" target='main' id='nav_1_11' title="图片设置" hidefocus="true">图片设置</a></li>
<li ><a href="1.html" target='main' id='nav_1_12' title="安全与效率" hidefocus="true">安全与效率</a></li>
<li ><a href="1.html" target='main' id='nav_1_13' title="数据与备份" hidefocus="true">数据与备份</a></li>
<li ><a href="1.html" target='main' id='nav_1_14' title="上传文件管理" hidefocus="true">上传文件管理</a></li>
<li ><a href="1.html" target='main' id='nav_1_15' title="商业授权" hidefocus="true">商业授权</a></li>
<li ><a href="1.html" target="_blank" title="使用手册" hidefocus="true">使用手册</a></li>
<li ><a href="1.html/" target="_blank" title="技术支持" hidefocus="true">技术支持</a></li>
</ul> -->

<ul style="display:none;" id="ul_2"> <!--顶部轮播图管理-->
<li ><a href="/admin/topimg/add" id='nav_2_18' title="轮播图添加" hidefocus="true">轮播图添加</a></li>
 <li ><a href="/admin/topimg/list" id='nav_2_19' title="轮播图展示" hidefocus="true">轮播图展示</a></li>
</ul>

<ul style="display:none;" id="ul_3"><!-- 导航栏设置 -->
<li ><a href="/admin/firstbar/add" id='nav_3_25' title="一级导航栏添加" hidefocus="true">一级导航栏添加</a></li>
<li ><a href="/admin/firstbar/list" id='nav_3_26' title="一级导航栏管理" hidefocus="true">一级导航栏管理</a></li>
<li ><a href="/admin/twobar/add" id='nav_3_27' title="二级导航栏添加" hidefocus="true">二级导航栏添加</a></li>
<li ><a href="/admin/twobar/list" id='nav_3_28' title="二级导航栏管理" hidefocus="true">二级导航栏管理</a></li>
<li ><a href="/admin/content/add" id='nav_3_28' title="三级内容添加" hidefocus="true">三级内容添加</a></li>
<li ><a href="/admin/content/list" id='nav_3_28' title="三级内容管理" hidefocus="true">三级内容管理</a></li>
</ul>

<ul style="display:none;" id="ul_4"><!-- 底部产品轮播图管理 -->
<li ><a href="/admin/downimg/add" target='main' id='nav_4_29' title="轮播图添加" hidefocus="true">轮播图添加</a></li>
<li ><a href="/admin/downimg/list" target='main' id='nav_4_30' title="轮播图展示" hidefocus="true">轮播图展示</a></li>
</ul>

<ul style="display:none;" id="ul_5"><!-- 用户权限设置 -->
<li ><a href="/admin/role/add" id='nav_5_34' title="角色添加" hidefocus="true">角色添加</a></li>
<li ><a href="/admin/role/list" id='nav_5_34' title="用户展示" hidefocus="true">角色展示</a></li>
<li ><a href="/admin/userrole/add" id='nav_5_34' title="用户角色添加" hidefocus="true">用户角色添加</a></li>
<li ><a href="/admin/userrole/list" id='nav_5_34' title="用户角色展示" hidefocus="true">用户角色展示</a></li>
<li ><a href="/admin/power/add" id='nav_5_34' title="权限添加" hidefocus="true">权限添加</a></li>
<li ><a href="/admin/power/list" id='nav_5_34' title="用户权限展示" hidefocus="true">权限展示</a></li>
<li ><a href="/admin/rolepower/add" id='nav_5_34' title="用户权限展示" hidefocus="true">角色权限添加</a></li>
<li ><a href="/admin/rolepower/list" id='nav_5_34' title="用户权限展示" hidefocus="true">角色权限展示</a></li>
</ul>

<ul style="display:none;" id="ul_6"><!--底部链接-->
<li ><a href="/admin/underurl/add" id='nav_6_44' title="底部链接添加" hidefocus="true">底部链接添加</a></li>
<li ><a href="/admin/underurl/list" id='nav_6_41' title="底部链接展示" hidefocus="true">底部链接展示</a></li>
</ul>
<ul style="display:none;" id="ul_7"><!--日志-->
<li ><a href="1.html" id='nav_7_45' title="会员管理" hidefocus="true">日志展示</a></li>
</ul>
</div>
        
<div class="claer"></div>
<div class="left_footer">感谢使用 <a href="#" target="_blank">MetInfo</a><span class="none">Powered by <b><a href=http://www.metinfo.cn target=_blank>MetInfo 5.1.7</a></b> &copy;2008-2013 &nbsp;<a href=http://www.metinfo.cn target=_blank>MetInfo Inc.</a></span></div>
		
	</div>
    <div class="floatr" id="metright">
      <div class="iframe">
			@yield('content')

	    <!-- <div class="min"><iframe frameborder="0" id="main" name="main" src="1.html" scrolling="no"></iframe></div> -->
		</div>
    </div>
	<div class="clear"></div>
	</div>
</div>
<script src="/admin/images/metinfo.js" type="text/javascript"></script>

</body>
</html>
