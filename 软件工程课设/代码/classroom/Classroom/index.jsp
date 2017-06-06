<%@ page language="java" import="java.util.*" pageEncoding="UTF-8"%>
<%
	String path = request.getContextPath();
	String basePath = request.getScheme() + "://"
			+ request.getServerName() + ":" + request.getServerPort()
			+ path + "/";
%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta charset="UTF-8" />
<title>教室预定</title>
<style type="text/css">
body {
	background-image: url("/Classroom/img/background.jpg");
}

.main {
	width: 980px;
	margin: 0 auto;
	text-align: center;
}

.above ul, li {
	list-style: none;
}
</style>
</head>
<body>
	<img src="/Classroom/img/yun.png" style="width: 10%;" align="right" />
	<div class="main">
		<img src="/Classroom/img/main.png" />
		<div align="center">${msg }</div>
		<div class="above">
			<ul>
				<li><a href="/Classroom/public/login.jsp"><img
						src="/Classroom/img/login.png" /></a></li>
				<li><a href="/Classroom/user/common/useroom.jsp"><img
						src="/Classroom/img/useroom.png" /></a></li>
				<li><a href="/Classroom/public/FindClassroombytj.jsp"><img
						src="/Classroom/img/search_room.png" /> </a></li>
				<li><a href="/Classroom/public/FindYdRoom?pNum=1"><img
						src="/Classroom/img/room_used.png" /> </a></li>
				<li><a href="/Classroom/user/common/common.jsp"><img
						src="/Classroom/img/student.png" /></a></li>
				<li><a href="/Classroom/user/admin/admin.jsp"><img
						src="/Classroom/img/admin.png" /></a></li>
			</ul>
		</div>
	</div>
	<img src="/Classroom/img/yun.png" style="width: 20%;" align="right" />
</body>
</html>
