<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>忘记密码</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/Classroom/css/reset.css">
<link rel="stylesheet" href="/Classroom/css/supersized.css">
<link rel="stylesheet" href="/Classroom/css/style.css">
<style type="text/css">
body {
	background-image: url("/Classroom/img/background.jpg");
}
</style>
</head>
<body>
	<div class="page-container">
		<img src="/Classroom/img/find_pwd.png" /> <br>
		<h3 align="center">${msg }</h3>
		<form action="/Classroom/public/forget" method="post">
			<div>
				<input type="text" name="username" placeholder="用户名" />
			</div>
			<div>
				<input type="text" name="email" placeholder="邮箱" />
			</div>
			<button id="submit" type="submit">确定</button>
		</form>
	</div>
</body>
</html>