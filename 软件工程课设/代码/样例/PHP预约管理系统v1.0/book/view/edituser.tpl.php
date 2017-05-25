<? if(!defined('RAIN') || !defined('RAIN_USER')) header("Location:index.php?m=user");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>edituser</title>
<link href="<?=API_VIEW?>css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
        <form class="add-u" method="post" action="index.php?m=setup&a=updateuser&id=<?=$id?>">
            <div class="add-u-title">更改用户</div>
            <div class="add-u-lan"><span>姓名</span><input type="text" name="name" value="<?=$name?>" /></div>
            <div class="add-u-lan"><span>用户名</span><input type="text" name="user" value="<?=$user?>" /></div>
            <div class="add-u-lan"><span>新密码</span><input type="text" name="passwd"/><span>不输入则不更改！</span></div>
            <div class="add-u-lan">
                <span>权限</span>
                <input id="radio" type="radio" name="u_right" value="100" <?php if($u_right == 100)echo 'checked="checked"'; ?> /><font>管理员</font>
                <input id="radio" type="radio" name="u_right" value="50" <?php if($u_right == 50)echo 'checked="checked"'; ?> /><font>咨询员</font>
                <input id="radio" type="radio" name="u_right" value="20" <?php if($u_right == 20)echo 'checked="checked"'; ?> /><font>竞价员</font>
                <input id="radio" type="radio" name="u_right" value="10" <?php if($u_right == 10)echo 'checked="checked"'; ?> /><font>收费人员</font>
            </div>
            <input id="add-u-submit" type="submit"  value="保存"/>
        </form>
</body>
</html>