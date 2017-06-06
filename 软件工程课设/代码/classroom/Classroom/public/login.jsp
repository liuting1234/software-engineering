<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta charset="utf-8">
<title>用户登录</title>
<link rel="stylesheet" href="/Classroom/css/reset.css">
<link rel="stylesheet" href="/Classroom/css/supersized.css">
<link rel="stylesheet" href="/Classroom/css/style.css">
<style type="text/css">
body {
	background-image: url("/Classroom/img/background.jpg");
}
</style>
</head>
<body oncontextmenu="return false">
	<div class="page-container">
		<img src="/Classroom/img/login.png" /> <br>
		<h3 align="center">${msg }</h3>
		<form action="/Classroom/login" method="post">
			<div>
				<input type="text" name="username" class="username"
					placeholder="用户名" autocomplete="off" />
			</div>
			<div>
				<input type="password" name="pwd" class="password" placeholder="密码"
					oncontextmenu="return false" onpaste="return false" />
			</div>
			<button id="submit" type="submit">登 录</button>
		</form>
		<br> <br>
		<h6 style="margin-top:20px;">
			<a href="/Classroom/public/forget.jsp"><img
				src="/Classroom/img/forget.png" /></a> <a
				href="/Classroom/public/regist.jsp"><img
				src="/Classroom/img/regist.png" /></a>
		</h6>
		<img src="/Classroom/img/yun.png" style="width: 20%;" align="right" />
	</div>
</body>
</html>