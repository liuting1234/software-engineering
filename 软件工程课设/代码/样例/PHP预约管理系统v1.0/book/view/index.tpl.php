<? if(!defined('RAIN') || !defined('RAIN_USER')) header("Location:index.php?m=user");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>预约系统</title>
<link href="<?=API_VIEW?>css/main.css" rel="stylesheet" type="text/css" />
</head>

<frameset rows="50,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="/?m=top" name="topFrame" scrolling="No" noresize="noresize" />
  <frameset rows="*" cols="120,*" framespacing="0" frameborder="no" border="0">
    <frame src="/?m=left" name="leftFrame" scrolling="auto" />
    <frame src="/?m=main" name="mainFrame" />
  </frameset>
</frameset>
<noframes>
<body>
</body>
</noframes>
</html>