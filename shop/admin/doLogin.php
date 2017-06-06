<?php
require_once '../include.php';
error_reporting(E_ALL ^ E_NOTICE);
$username=$_POST['username'];
$username=addslashes($username);
$password=$_POST['password'];
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
$autoFlag=$_POST['autoFlag'];

if($verify==$verify1){
    $sql="select * from admin where admin_name='{$username}'and password='{$password}'";
    $rows = checkAdmin($sql);
    if($rows){
        
        //若选择一周内自动登录
        if($autoFlag){
            setcookie("admin_id",$rows['admin_id'],time()+7*24*3600);
            setcookie("admin_name",$rows['admin_name'],time()+7*24*3600);
        }
        $_SESSION['admin_name'] = $rows['admin_name'];
        $_SESSION['admin_id'] = $rows['admin_id'];
        alertMes("登录成功", "index.php");
    }else{
        alertMes("用户名或密码错误", "login.php");
    }
}else{
    alertMes("验证码错误","login.php");
}