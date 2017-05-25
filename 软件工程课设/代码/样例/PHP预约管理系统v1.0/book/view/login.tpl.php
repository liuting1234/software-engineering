<? if(!defined('RAIN')) header("Location:index.php?m=user");?>
<? if(defined('RAIN_USER')) header("Location:index.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>预约管理系统</title>
<link href="<?=API_VIEW?>css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=API_VIEW?>js/jquery-1.6.1.min.js"></script>
<script>
$(document).ready(function(){
	$("#login").click(function(){
		$.ajax({
                type: "POST",
			    dataType: "html",
                url: "index.php?m=user&a=login",
                data: "user="+$("#loginuser").val()+"&passwd="+$("#loginpasswd").val(),
			    timeout:10000, 
			    cache: false,
                success: function(data){
					if(data == 100){
						window.location.href="index.php";
					}else{
						$(".login-msg").html('用户名或密码错误！');
					}
                }
        }); 
	})
});	
</script>
</head>

<body bgcolor="#EEEEEE">
<div class="login">
   <div class="login-title">预约管理系统登入</div>
   <div class="login-msg"></div>
   <div class="login-lan"><span>用户名：</span><input id="loginuser" type="text" name="user" /></div>
   <div class="login-lan"><span>密码：</span><input id="loginpasswd" type="password" name="passwd" /></div>
   <input id="login" type="submit" value="登入" />
</div>
</body>
</html>
