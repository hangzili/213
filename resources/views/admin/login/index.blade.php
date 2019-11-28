<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>login</title>
<link rel="stylesheet" type="text/css" href="/login/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/login/css/demo.css" />
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="/login/css/component.css" />
<!--[if IE]>
<script src="/login/js/html5.js"></script>
<![endif]-->
</head>
<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<div class="logo_box">
						<h3>欢迎我的宝贝注册</h3>
						<form action="#" name="f" method="post">
							<div class="input_outer">
								<span class="u_user"></span>
								<input name="u_name" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="u_pwd" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="u_email" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="email" placeholder="请输入邮箱">
							</div>
							<div class="mb2"><a class="act-but submit" name="email" href="javascript:;" style="color: #FFFFFF">获取验证码</a></div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input class="text" name="emails" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="text" placeholder="请输入验证码">
							</div>
							<div class="mb2"><a class="act-but submit" name="but" href="javascript:;" style="color: #FFFFFF">注册</a></div>
							<div class="mb2"><a class="act-but submit" href="/admin/login/landing" style="color:red">已有账号，去登陆</a></div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /container -->
		<script src="/login/js/TweenLite.min.js"></script>
		<script src="/login/js/jq.js"></script>
		<script src="/login/js/EasePack.min.js"></script>
		<script src="/login/js/rAF.js"></script>
		<script src="/login/js/demo-1.js"></script>
		
	</body>
</html>
<script>
	
	$(document).ready(function(){
		$("a[name='email']").click(function(){
			var u_email = $("input[name='u_email']").val();
			var u_name = $("input[name='u_name']").val();
			if(u_email==""){
				alert("邮箱不能为空");return;
			}
			var data = {};
			data.u_email = u_email;
			data.u_name = u_name;
			$.ajax({
				type : "post",
				data : data,
				dataType : 'json',
				url:'/admin/login/sendMail',
				success:function(res){
					
				}
			});
		})
		//提交
		$("a[name='but']").click(function(){
			var u_name = $("input[name='u_name']").val();
			var u_pwd = $("input[name='u_pwd']").val();
			var u_email = $("input[name='u_email']").val();
			var emails = $("input[name='emails']").val();
			if(u_name==""){
				alert("用户名不能为空");return;
			}
			if(u_pwd==""){
				alert("用户密码不能为空");return;
			}
			// alert(emails);
			var data = {};
			data.u_name = u_name;
			data.u_pwd = u_pwd;
			// data.emails = emails;
			data.u_email = u_email;
			// console.log(data);
			$.ajax({
				type : "post",
				data : data,
				dataType : 'json',
				url:'/admin/login/login_do',
				success:function(res){
					if(res==1){
						alert("已存在此用户");
					}
					if(res==2){
						window.location.href = '/admin/firstbar/list';
					}

				}
			});
		})
	})
</script>