<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Regist</title>
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
		<img src="/Classroom/img/regist2.png" />
		<form action="/Classroom/regist" method="post">
			<div>
				<input type="text" name="username" placeholder="用户名" />
			</div>
			<div>
				<input type="text" name="pwd" placeholder="密码" />
			</div>
			<div>
				<input type="text" name="pwd" placeholder="确认密码" />
			</div>
			<div>
				<input type="text" name="email" placeholder="邮箱" />
			</div>
			<button id="submit" type="submit">确定</button>
		</form>
	</div>
	<img src="/Classroom/img/yun.png" style="width: 20%;" align="right" />
</body>
</html>