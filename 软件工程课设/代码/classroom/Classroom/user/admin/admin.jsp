<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<style type="text/css">
body {
	background-image: url("/Classroom/img/background.jpg");
}

.main {
	width: 980px;
	margin: 0 auto;
	text-align: center;
	list-style: none;
}

.above ul, li {
	list-style: none;
}
</style>
<body>
	<div class="main">
		<img src="/Classroom/img/admin.png" />
		<h4 align="center">用户名：${user.username}</h4>
		<h4 align="center">
			<input type="button" value="首页"
				onclick="javascript:window.location.href ='/Classroom/index.jsp';"
				style="border-radius:10px;"> <input type="button"
				name="Submit" onclick="javascript:history.back(-1);"
				style="border-radius:10px;" value="返回上一页">
		</h4>
		<div class="above">
			<ul>
				<li><a href="/Classroom/user/logout"><img
						src="/Classroom/img/logout.png" /></a></li>
				<li><a href="/Classroom/admin/findapply"><img
						src="/Classroom/img/admin/find_apply.png" /></a></li>
				<li><a href="/Classroom/admin/result"><img
						src="/Classroom/img/admin/room_use.png" /> </a></li>
				<li><a href="/Classroom/admin/froom"><img
						src="/Classroom/img/admin/findroom.png" /> </a></li>
			</ul>
		</div>
		<img src="/Classroom/img/yun.png" style="width: 20%;" align="right" />
	</div>
</body>
</html>