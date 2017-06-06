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
	<h1 align="center">教室借用信息</h1>
	<c:if test="${empty userooms}">
		<h3>
			该时间段可借用，<a href="/Classroom/user/common/useroom.jsp">前往预定</a>
		</h3>
	</c:if>
	<c:if test="${not empty userooms}">
		<table border="1" width="80%">
			<tr>
				<th>教室名</th>
				<th>起始时间</th>
				<th>结束时间</th>
			</tr>
			<c:forEach items="${userooms}" var="useroom">
				<tr>
					<td>${useroom.num }</td>
					<td>${useroom.starttime }</td>
					<td>${useroom.endtime }</td>
				</tr>
			</c:forEach>
		</table>
	</c:if>
</body>
</html>