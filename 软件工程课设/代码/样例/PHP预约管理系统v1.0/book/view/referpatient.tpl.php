<? if(!defined('RAIN') || !defined('RAIN_USER')) header("Location:index.php?m=user");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>referpatient</title>
<link href="<?=API_VIEW?>css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=API_VIEW?>js/jquery-1.6.1.min.js"></script>
<script>
$(document).ready(function(){
	$("#rf-from-submit").click(function(){
		$.ajax({
                type: "POST",
			    dataType: "html",
                url: "index.php?m=referpatient&a=search",
                data: "words="+$("#words").val(),
			    timeout:10000, 
			    cache: false,
                success: function(data){
				  $(".patient").html(unescape(data));
                }
        }); 
	})
});	
</script> 
</head>

<body>
<div class="title"><span>查询预约信息</span><a href="javascript:history.go(-1);">返回</a></div>
<div class="referpatient">
    <div class="rf-from">
        <div class="rf-from-img"></div>
        <span>输入查询条件（预约号、姓名、联系电话）</span><input id="words" type="text" name="words" />
        <input id="rf-from-submit" type="submit" value="查询" />
    </div>
</div>

<div class="patient">
</div>
</body>
</html>
