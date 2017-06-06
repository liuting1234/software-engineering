<?php 
require_once '../include.php';
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8"/>
<title>登录</title>
<link type="text/css" rel="stylesheet" href="../styles/reset.css">
<link type="text/css" rel="stylesheet" href=" ../styles/mian.css">
<!--[if IE 6]>
<script type="text/javascript" src="../js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="../js/ie6Fixpng.js"></script>
<![endif]-->
</head>

<body>
<div class="headerBar">
	<div class="logoBar login_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="" alt=""></a>
			</div>
			<h3 class="welcome_title">欢迎登录</h3>
		</div>
	</div>
</div>

<div class="loginBox">
	<div class="login_cont">
	<form action="doLogin.php" method="post">
			<ul class="login">
				<li class="l_tit">用户名</li>
				<li class="mb_10"><input type="text"  name="username" placeholder=" "class="login_input user_icon"></li>
				<li class="l_tit">密码</li>
				<li class="mb_10"><input type="password"  name="password" class="login_input password_icon"></li>
				<li class="l_tit">验证码</li>
				<li class="mb_10"><input type="text"  name="verify" class="login_input password_icon"></li>
				<li></li>
			   <img src="getVerify.php" alt="" />
				<li class="autoLogin"><input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><label for="a1">自动登录（在一周之内）</label></li>
				<li><input type="submit" value="" class="login_btn"></li>
			</ul>
		</form>
	</div>
</div>
</body>
</html>
