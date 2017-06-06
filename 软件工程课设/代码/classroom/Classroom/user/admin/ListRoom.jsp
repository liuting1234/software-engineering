<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<style type="text/css">
body {
	font-family: Arial;
	font-size: 14px;
	line-height: 180%;
	padding-top: 20px;
	background-image: url("/Classroom/img/backsearch.jpg");
}

.main {
	width: 980px;
	margin: 0 auto;
	text-align: center;
	list-style: none;
}

table tr:first-child {
	background: #0066CC;
	color: #fff;
	font-weight: bold;
} /*第一行标题蓝色背景*/
table {
	border-top: 1pt solid #C1DAD7;
	border-left: 1pt solid #C1DAD7;
	margin: 0 auto;
}

td {
	padding: 5px 10px;
	text-align: center;
	border-right: 1pt solid #C1DAD7;
	border-bottom: 1pt solid #C1DAD7;
}

tr:hover {
	background: #ADFF2F;
} /*鼠标悬停后表格背景颜色*/
</style>
</head>
<body>
	<div class="main">
		<img src="/Classroom/img/search/syjs.png" />
		<h3>
			<input type="button" value="首页"
				onclick="javascript:window.location.href ='/Classroom/index.jsp';"
				style="border-radius:10px;"> <input type="button"
				value="返回上一页"
				onclick="javascript:window.location.href ='/Classroom/user/admin/admin.jsp';"
				style="border-radius:10px;"> <a
				href="/Classroom/user/admin/addroom.jsp"> 添加教室</a>
		</h3>
		<c:if test="${empty rooms}">
			<h3 align="center">没有教室信息</h3>
		</c:if>
		<c:if test="${not empty rooms}">
			<table border="1" width="80%">
				<tr>
					<th>教室名</th>
					<th>地点</th>
					<th>状态</th>
					<th>禁用 / 恢复</th>
					<th>删除</th>
				</tr>
				<c:forEach items="${rooms}" var="room">
					<tr>
						<td>${room.num }</td>
						<td>${room.localtion }</td>
						<c:if test="${room.room_state =='1' }">
							<td>可以使用</td>
						</c:if>
						<c:if test="${room.room_state =='0'}">
							<td>禁止使用</td>
						</c:if>
						<c:if test="${room.room_state =='1' }">
							<td><a
								href="/Classroom/admin/forbiduse?f=0&num=${room.num }">禁止借用</a></td>
						</c:if>
						<c:if test="${room.room_state =='0'}">
							<td><a
								href="/Classroom/admin/forbiduse?f=1&num=${room.num }">恢复使用</a></td>
						</c:if>
						<td><a href="/Classroom/admin/delroom?num=${room.num }">删除</a></td>
					</tr>
				</c:forEach>
			</table>
		</c:if>
	</div>
</body>
</html>