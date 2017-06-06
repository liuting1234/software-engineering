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
		<img src="/Classroom/img/search/syzdjs.png" />
		<h3>
			<input type="button" value="首页"
				onclick="javascript:window.location.href ='/Classroom/index.jsp';"
				style="border-radius:10px;"> <input type="button"
				value="返回上一页"
				onclick="javascript:window.location.href ='/Classroom/user/admin/admin.jsp';"
				style="border-radius:10px;">
		</h3>
		<c:if test="${empty userooms}">
			<h2 align="center">没有借用教室信息</h2>
		</c:if>
		<c:if test="${not empty userooms}">
			<table border="1" width="80%">
				<tr>
					<th>教室名</th>
					<th>起始时间</th>
					<th>结束时间</th>
					<th>借用人姓名</th>
					<th>原因</th>
					<th>取消使用</th>
				</tr>
				<c:forEach items="${userooms}" var="useroom">
					<tr>
						<td>${useroom.num }</td>
						<td>${useroom.starttime }</td>
						<td>${useroom.endtime }</td>
						<td>${useroom.username }</td>
						<td>${useroom.reason }</td>
						<td align="center"><a
							href="/Classroom/admin/delresult?id=${useroom.id }">取消使用</a></td>
					</tr>
				</c:forEach>
			</table>
		</c:if>
	</div>
</body>
</html>