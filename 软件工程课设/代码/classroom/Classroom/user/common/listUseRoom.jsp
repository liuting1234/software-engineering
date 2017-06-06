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
	background: #3CB371;
}
</style>
<style>
body {
	font-family: Arial;
	font-size: 14px;
	line-height: 180%;
	padding-top: 20px;
} /*总控制，可忽略此行*/
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
	<h3>
		<input type="button" value="首页"
			onclick="javascript:window.location.href ='/Classroom/index.jsp';"
			style="border-radius:10px;"> <input type="button"
			value="返回上一页"
			onclick="javascript:window.location.href ='/Classroom/user/common/common.jsp';"
			style="border-radius:10px;">
	</h3>
	<c:if test="${empty userooms}">
		<h3 align="center">${msg}</h3>
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