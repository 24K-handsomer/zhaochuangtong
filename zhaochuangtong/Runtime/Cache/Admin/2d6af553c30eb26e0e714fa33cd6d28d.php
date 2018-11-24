<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ?>login.css" />
</head>
<body>
<div id="biaoti">招创通数据管理系统</div>
<div id="jiemian">
	<h1>登录</h1>
	<form action="/index.php/admin/login/loginHandle" method="post">
	<div id="name">用户名：<input type="text" name="name"/></div>
	<div id="pwd">密&nbsp;&nbsp;&nbsp;码：<input type="password" name="pwd"/></div>
	<div id="yzm">
		<div>验证码：</div>
		<input type="text" name="yzm"/>
		<img class="yzm" src="/index.php/admin/login/yzm"/>
	</div>
	<input type="submit" class="loginBtn" value="登录"/>
	</form>
</div>
</body>
<script type="text/javascript" src='/Public/jquery-2.0.2.min.js'></script>
<script type="text/javascript">
$(document).ready(function(e) {
    $(".yzm").click(function(){
         $(this).attr("src","/index.php/admin/login/yzm");
        })
});
</script>
</html>