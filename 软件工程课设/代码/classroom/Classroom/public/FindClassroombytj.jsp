<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/Classroom/js/jquery.min.js"></script>
<script type="text/javascript" src="/Classroom/js/jquery-ui.js"></script>
<script src="/Classroom/js/jquery.js"></script>
<script src="/Classroom/build/jquery.datetimepicker.full.js"></script>
<link rel="stylesheet" type="text/css"
	href="/Classroom/css/jquery.datetimepicker.css" />
<link rel="stylesheet"
	href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/Classroom/css/reset.css">
<link rel="stylesheet" href="/Classroom/css/supersized.css">
<link rel="stylesheet" href="/Classroom/css/style.css">
<style type="text/css">
body {
	background-image: url("/Classroom/img/background.jpg");
}
</style>
<script>
	$(function() {
		$("#datepicker").datepicker({
			showButtonPanel : true,
			dateFormat : "yy-mm-dd"
		});
	});
</script>
</head>
<body>
	<div class="page-container">
		<img src="/Classroom/img/search_room.png" />
		<h3>${msg }</h3>
		<form action="/Classroom/FindClassroombytj" method="post">
			<div>
				<input type="text" name="num" placeholder="教室名     [例如：逸101]"
					autocomplete="off" />
			</div>
			<div>
				<input type="text" name="starttime" placeholder="起始日期"
					class="some_class" value="" />
			</div>
			<div>
				<input type="text" name="endtime" placeholder="截止日期"
					class="some_class" value="" />
			</div>
			<button id="submit" type="submit">确定</button>
		</form>
		<img src="/Classroom/img/yun.png" style="width: 20%;" align="right" />
	</div>
</body>
<script>
	$('.some_class').datetimepicker({
		yearStart : 2017,
		yearEnd : 2017,
	});

	$.datetimepicker.setLocale('ch');
</script>
</html>