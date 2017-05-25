<? if(!defined('RAIN') || !defined('RAIN_USER')) header("Location:index.php?m=user");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?=API_VIEW?>css/main.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#3B5DA6">
<div class="nav">
    <?php if(RAIN_U_RIGHT >=50){?><a id="button" href="index.php?m=addpatient" target ="mainFrame">添加信息</a><?php } ?>
    <a id="button" href="index.php?m=referpatient" target ="mainFrame">查询信息</a>
    <?php if(RAIN_U_RIGHT >=20){?><a id="button" href="index.php?m=patient" target ="mainFrame">查看报表</a><?php } ?>
    <?php if(RAIN_U_RIGHT ==100){?><a id="button" href="index.php?m=setup" target ="mainFrame">系统设置</a><?php } ?>
</div>
</body>
</html>
