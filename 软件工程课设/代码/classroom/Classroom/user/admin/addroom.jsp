<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加教室</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/Classroom/css/reset.css">
<link rel="stylesheet" href="/Classroom/css/supersized.css">
<link rel="stylesheet" href="/Classroom/css/style.css">
<style type="text/css">
body {
	background: #3CB371;
}
</style>
</head>
<body>
	<div class="page-container">
		<h1>添加教室</h1>
		<form action="/Classroom/admin/addroom" method="post">
			<div>
				<input type="text" name="num" placeholder="教室编号     [例如：逸101]" />
			</div>
			<div>
				<input type="text" name="localtion" placeholder="地点" />
			</div>
			<button id="submit" type="submit">确定</button>
		</form>
	</div>
</body>
</html>