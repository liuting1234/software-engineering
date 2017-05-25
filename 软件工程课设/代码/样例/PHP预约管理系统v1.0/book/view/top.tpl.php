<? if(!defined('RAIN') || !defined('RAIN_USER')) header("Location:index.php?m=user");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>top</title>
<link href="<?=API_VIEW?>css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="top">
    <div class="logo">益阳第五人民医院预约管理系统</div>
    <div class="top-user">用户：<span><?=RAIN_NAME?></span></div>
    <div class="top-user">权限：<span><?=show_right(RAIN_U_RIGHT)?></span></div>
    <a id="button" class="loginout" href="index.php?m=user&a=sign_out" target="_parent">退出系统</a>
    <a id="button" class="index" href="index.php?m=main" target ="mainFrame">系统首页</a> 
</div>
</body>
</html>
