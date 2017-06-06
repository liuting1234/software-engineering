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
<script type="text/javascript">
	function jump() {
		// 获得用户输入页码
		var pNum = document.getElementById("pNum").value;
		location.href = "/Classroom/public/FindYdRoom?pNum=" + pNum;
	}
</script>
</head>
<body>
	<div class="main">
		<img src="/Classroom/img/zzsy.png" />
		<h3>
			<input type="button" value="首页"
				onclick="javascript:window.location.href ='/Classroom/index.jsp';"
				style="border-radius:10px;"> <input type="button"
				value="返回上一页"
				onclick="javascript:window.location.href ='/Classroom/user/admin/admin.jsp';"
				style="border-radius:10px;">
		</h3>
		<br>
		<c:if test="${empty pageBean.userooms}">
			<h3>无预定教室信息！</h3>
		</c:if>
		<c:if test="${not empty pageBean.userooms}">
			<table border="1" width="100%">
				<tr>
					<th>教室编号</th>
					<th>开始时间</th>
					<th>结束时间</th>
					<th>使用者</th>
				</tr>
				<c:forEach items="${pageBean.userooms}" var="useroom">
					<tr>
						<td>${useroom.num }</td>
						<td>${useroom.starttime }</td>
						<td>${useroom.endtime }</td>
						<td>${useroom.username }</td>
					</tr>
				</c:forEach>
				<tr>
					<td colspan="9" align="center">
						<!-- 显示首页 --> <c:if test="${pageBean.pNum == 1}">
					首页  上一页
				</c:if> <c:if test="${pageBean.pNum != 1}">
							<a href="/Classroom/public/FindYdRoom?pNum=1">首页</a>
							<a href="/Classroom/public/FindYdRoom?pNum=${pageBean.pNum-1 }">上一页</a>
						</c:if> <!-- 当前页为中心前后各显示10页 --> <c:set var="begin" value="1" scope="page" />
						<c:set var="end" value="${pageBean.totalPageNum}" scope="page" />

						<!-- 判断前面有没有5页 --> <c:if test="${pageBean.pNum-5>0}">
							<c:set var="begin" value="${pageBean.pNum-5}" scope="page" />
						</c:if> <!-- 判断后面有没有5页 --> <c:if
							test="${pageBean.pNum+5 < pageBean.totalPageNum}">
							<c:set var="end" value="${pageBean.pNum + 5}" scope="page" />
						</c:if> <!-- 当前页不显示链接 --> <c:forEach begin="${begin}" end="${end}"
							var="i">
							<c:if test="${pageBean.pNum==i}">
						${i }
					</c:if>
							<c:if test="${pageBean.pNum!=i}">
								<a href="/Classroom/public/FindYdRoom?pNum=${i }">${i } </a>
							</c:if>
						</c:forEach> <!-- 显示尾页 --> <c:if
							test="${pageBean.pNum == pageBean.totalPageNum}">
					下一页 尾页
				</c:if> <c:if test="${pageBean.pNum != pageBean.totalPageNum}">
							<a href="/Classroom/public/FindYdRoom?pNum=${pageBean.pNum + 1 }">下一页</a>
							<a
								href="/Classroom/public/FindYdRoom?pNum=${pageBean.totalPageNum}">尾页</a>
						</c:if> <input type="text" id="pNum" size="2" /><input type="button"
						value="跳转" onclick="jump();" />
					</td>
				</tr>
			</table>
		</c:if>
	</div>
</body>
</html>